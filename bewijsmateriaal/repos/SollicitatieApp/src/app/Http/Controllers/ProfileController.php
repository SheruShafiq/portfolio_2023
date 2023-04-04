<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ChangeProfileInformationRequest;
use App\Http\Resources\User\UserProfileResource;
use App\Http\Resources\User\UserProjectResource;
use App\Repositories\UserRepository;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    public function __construct(
        private readonly UserRepository $userRepository
    ) {
    }

    public function index(): Response
    {
        return Inertia::render('Profile/Information', [
            'user' => new UserProfileResource(auth()->user()),
        ]);
    }

    public function update(ChangeProfileInformationRequest $request)
    {
        $this->userRepository->update(auth()->user(), $request->validated());

        return redirect()
            ->route('profile')
            ->with('message', 'Je profiel was succesvol opgeslagen!');
    }

    public function projects(): Response
    {
        return Inertia::render('Profile/Projects/Index', [
            'user' => new UserProjectResource(auth()->user()),
        ]);
    }
}
