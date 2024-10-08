<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subsurveys', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->boolean('isActive')->default(true);
            $table->timestamps();
            $table->foreignId('survey_id')->constrained('surveys')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
