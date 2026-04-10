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
        Schema::create('impact_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('farmers_empowered');
            $table->string('research_projects');
            $table->string('countries_active');
            $table->string('partner_organizations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('impact_numbers');
    }
};
