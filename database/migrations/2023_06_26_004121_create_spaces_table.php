<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Car;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('spaces', function (Blueprint $table) {
            $table->id("id");                                             // Primary key
            $table->foreignIdFor(Car::class) ->default(NULL)->nullable(); // Needs to be nullable because not all spaces will have a car
            $table->boolean("status")->default(0);                        // "on"(true) or "off" (false) 
            $table->double("latitude", 16, 13);    
            $table->double("longitude", 16, 13);                          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spaces');
    }
};
