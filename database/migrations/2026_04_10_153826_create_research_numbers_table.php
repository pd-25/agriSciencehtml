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
        Schema::create('research_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('published_papers');
            $table->string('research_partners');
            $table->string('field_studies');
            $table->string('open_access_downloads');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_numbers');
    }
};
