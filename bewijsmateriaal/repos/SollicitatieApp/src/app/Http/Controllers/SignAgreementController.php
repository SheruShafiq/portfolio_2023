<?php

namespace App\Http\Controllers;

use App\Enums\InvestmentStatus;
use App\Models\Investment;
use App\Repositories\InvestmentRepository;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class SignAgreementController extends Controller
{
    public function __construct(
        private readonly InvestmentRepository $investmentRepository,
    ) {
    }

    public function show(Investment $investment): Response
    {
        if (! $investment->belongs_to_current_user || $investment->status !== InvestmentStatus::Pending) {
            abort(404);
        }

        return Inertia::render('Profile/Investments/Agreement', [
            'investment' => $investment,
        ]);
    }

    public function store(Investment $investment): RedirectResponse
    {
        if (! $investment->belongs_to_current_user || $investment->status !== InvestmentStatus::Pending) {
            abort(404);
        }

        $this->investmentRepository->setInvestmentStatus($investment, InvestmentStatus::Accepted);

        return to_route('projects.show', $investment->project->slug)->with('success', 'Investering succesvol uitgevoerd.');
    }
}
