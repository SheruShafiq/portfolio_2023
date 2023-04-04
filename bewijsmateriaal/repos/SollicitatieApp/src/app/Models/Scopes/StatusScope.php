<?php

namespace App\Models\Scopes;

use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class StatusScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        $builder
            ->where(function ($query) {
                $query->where('user_id', auth()->id())
                    ->orWhereNot('status', ProjectStatus::Pending);
            });
    }
}
