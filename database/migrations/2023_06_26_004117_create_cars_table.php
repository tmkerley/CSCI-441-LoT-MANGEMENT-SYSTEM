<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Space;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id("vinNo");
            $table->foreignIdFor(Space::class) -> nullable();                  //not nullable, every car should have a space
            $table->text("make");
            $table->text("model");
            $table->integer("year");
            $table->boolean("isAvailable") -> default(true);
            $table->boolean("isBeingMoved")-> default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
