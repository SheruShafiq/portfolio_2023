<?php

namespace App\Models;

use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Project extends Model
{
    use HasFactory, hasSlug;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'location',
        'description',
        'own_contribution',
        'external_contribution',
        'crowdfunding_contribution',
        'status',
        'iban',
        'iban_name',
        'updated_at',
    ];

    protected $casts = [
        'status' => ProjectStatus::class,
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function booted(): void
    {
        static::addGlobalScope(new Scopes\StatusScope);
    }

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function investments(): hasMany
    {
        return $this->hasMany(Investment::class)->orderBy('created_at', 'desc');
    }

    public function FundingProgress(): Attribute
    {
        return Attribute::make(
            get: fn () => round($this->investments()->sum('amount') / $this->crowdfunding_contribution * 100),
        );
    }

    public function maximumInvestment(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->crowdfunding_contribution - $this->investments()->sum('amount'),
        );
    }

    public function totalAmount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->own_contribution + $this->external_contribution + $this->crowdfunding_contribution,
        );
    }

    public function belongsToCurrentUser(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->user_id === auth()->id(),
        );
    }

    public function isPending(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->status == ProjectStatus::Pending,
        );
    }
}
