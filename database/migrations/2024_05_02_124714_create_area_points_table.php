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
        Schema::create('area_points', function (Blueprint $table) {
            $table->id('point_id');
            $table->integer('area_id');
            $table->string('point_name');
            $table->string('point_description');
            $table->string('point_status');
            $table->string('point_lat');
            $table->string('point_long');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_points');
    }
};
