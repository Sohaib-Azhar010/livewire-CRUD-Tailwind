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
        Schema::create('sub_contractors', function (Blueprint $table) {
            $table->id('subcon_id');
            $table->string('subcon_joindate');
            $table->string('con_id');
            $table->string('subcon_name');
            $table->string('subcon_username');
            $table->string('subcon_pass');
            $table->string('subcon_nic');
            $table->string('subcon_phone');
            $table->string('subcon_mobile');
            $table->string('subcon_email');
            $table->string('subcon_profile_type');
            $table->string('subcon_wallet');
            $table->string('subcon_photo');
            $table->string('subcon_nic_front');
            $table->string('subcon_nic_back');
            $table->string('subcon_agreement');
            $table->string('subcon_comment');
            $table->string('subcon_note');
            $table->string('subcon_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_contractors');
    }
};
