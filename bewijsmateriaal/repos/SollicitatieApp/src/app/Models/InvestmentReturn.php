<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvestmentReturn extends Model
{
    use HasFactory;

    protected $fillable = [
        'investment_id',
        'amount',
        'due_date',
        'status',
    ];

    public function investment(): belongsTo
    {
        return $this->belongsTo(Investment::class);
    }
}
