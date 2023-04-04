<?php

use App\Models\Investment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('investment_returns', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Investment::class);
            $table->bigInteger('amount');
            $table->date('due_date');
            $table->enum('status', ['pending', 'paid']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('investment_returns');
    }
};
