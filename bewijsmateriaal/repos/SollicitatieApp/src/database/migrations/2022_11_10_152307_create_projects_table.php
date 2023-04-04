<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('name');
            $table->string('location');
            $table->text('description');
            $table->bigInteger('amount');
            $table->integer('interest_rate');
            $table->string('iban')->nullable();
            $table->string('iban_name')->nullable();
            $table->integer('duration');
            $table->enum('status', ['private', 'public']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
