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
            $table->id("id");                               // Primary key
            $table->foreignIdFor(Car::class) -> nullable(); // Needs to be nullable because not all spaces will have a car
            $table->integer("space_no");                    // Space number. Keep this and PK seperate so we can potentially remap without having to switch all the cars in the DB as well.
            $table->boolean("status");                      // "on"(true) or "off" (false)
            $table->char("lot_id");                          // ex. "A"
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
