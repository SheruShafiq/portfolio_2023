<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProjectStatusRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\Projects\ProjectEditResource;
use App\Http\Resources\Projects\ProjectIndexResource;
use App\Http\Resources\Projects\ProjectShowResource;
use App\Models\Project;
use App\Repositories\ProjectRepository;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ProjectsController extends Controller
{
    public function __construct(
        private readonly ProjectRepository $projectRepository,
    ) {
    }

    public function index(): Response
    {
        $projects = Project::where('name', 'like', '%'.request()->search.'%')
            ->when(request()->sort, function ($query) {
                $fundingProgress = $this->projectRepository->getFundingProgress();

                switch (request()->sort) {
                    case 'newest':
                        $query->orderByDesc('created_at');
                        break;
                    case 'oldest':
                        $query->orderBy('created_at');
                        break;
                    case 'highest':
                        $query->orderByDesc($fundingProgress);
                        break;
                    case 'lowest':
                        $query->orderBy($fundingProgress);
                        break;
                }
            })->paginate(8)->withQueryString();

        return Inertia::render('Projects/Index', [
            'projects' => ProjectIndexResource::collection($projects),
            'sorting' => request()->sort,
            'search' => request()->search,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Profile/Projects/New',
            [
                'user' => auth()->user(),
            ]);
    }

    public function store(StoreProjectRequest $request): RedirectResponse
    {
        $this->projectRepository->create($request->validated(), auth()->user());

        return redirect()->route('projects.show', ['project' => auth()->user()->projects()->latest()->first()]);
    }

    public function show(Project $project): Response
    {
        return Inertia::render('Projects/Show', [
            'project' => new ProjectShowResource($project),
            'belongsToUser' => $project->belongs_to_current_user,
        ]);
    }

    public function edit(Project $project): RedirectResponse|Response
    {
        if (! $project->belongs_to_current_user) {
            return redirect()->route('projects.show', ['project' => $project]);
        }

        return Inertia::render('Profile/Projects/Edit', [
            'project' => new ProjectEditResource($project),
        ]);
    }

    public function update(UpdateProjectRequest $request, Project $project): RedirectResponse
    {
        $this->projectRepository->update($project, $request->validated());

        return redirect()->route('profile.projects.edit', $project);
    }

    public function updateStatus(EditProjectStatusRequest $request, Project $project): RedirectResponse
    {
        $this->projectRepository->updateStatus($project, $request->validated());

        return redirect()->route('profile.projects.edit', $project);
    }
}
