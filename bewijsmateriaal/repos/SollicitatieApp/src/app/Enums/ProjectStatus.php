<?php

namespace App\Enums;

enum ProjectStatus: string
{
    case Pending = 'pending';
    case Funding = 'funding';
    case Repayment = 'repayment';
    case Completed = 'completed';
    case Cancelled = 'cancelled';
}
