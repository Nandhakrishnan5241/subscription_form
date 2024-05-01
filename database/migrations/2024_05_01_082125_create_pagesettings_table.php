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
        Schema::create('pagesettings', function (Blueprint $table) {
            $table->id();
            $table->string('titles',50); 
            $table->string('targetrules',50); 
            $table->string('overlaytypes',50); 
            $table->string('displayrules',50); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagesettings');
    }
};
