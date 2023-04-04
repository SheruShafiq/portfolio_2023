<?php

namespace App\Http\Controllers;

use App\Http\Resources\Projects\ProjectIndexResource;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function __construct(
        private readonly ProjectRepository $projectRepository
    ) {
    }

    public function __invoke(Request $request): Response
    {
        return Inertia::render('Home', [
            'highestFundedProjects' => ProjectIndexResource::collection($this->projectRepository->getHighestFundedProjects()),
            'newestProjects' => ProjectIndexResource::collection($this->projectRepository->getNewestProjects()),
        ]);
    }
}
