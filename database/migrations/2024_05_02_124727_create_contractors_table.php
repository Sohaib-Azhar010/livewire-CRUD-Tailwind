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
        Schema::create('contractors', function (Blueprint $table) {
            $table->id('con_id');
            $table->string('con_joindate');
            $table->string('con_name');
            $table->string('con_username');
            $table->string('con_pass');
            $table->string('con_nas');
            $table->string('con_nic');
            $table->string('con_city');
            $table->string('con_area');
            $table->string('con_phone');
            $table->string('con_mobile');
            $table->string('con_email');
            $table->string('con_profile_type');
            $table->string('con_vlan_start');
            $table->string('con_vlan_end');
            $table->string('con_wallet');
            $table->string('con_credit_limit');
            $table->string('con_photo');
            $table->string('con_nic_front');
            $table->string('con_nic_back');
            $table->string('con_agreement');
            $table->string('con_comment');
            $table->string('con_note');
            $table->string('con_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contractors');
    }
};
