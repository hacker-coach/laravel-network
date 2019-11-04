<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerifiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('user_id_from')->nullable();

            $table->boolean('show_verify')->default(false);
            $table->boolean('show_know')->default(false);
            $table->boolean('show_has')->default(false);
            $table->boolean('show_message')->default(false);
            $table->boolean('show_answer')->default(false);

            $table->boolean('check_of_super_ps')->default(false);
            $table->longText('message_check_of_super_ps')->nullable();

            $table->longText('text')->nullable();
            $table->longText('answer_of_user')->nullable();

            $table->boolean('contact_real_friend_or_online')->default(false);

            $table->boolean('know_from_mensa')->default(false);
            $table->boolean('know_from_tns')->default(false);
            $table->boolean('know_from_mhn')->default(false);
            $table->boolean('know_from_cbc')->default(false);
            $table->boolean('know_from_iq_club')->default(false);

            $table->boolean('has_super_special_talent')->default(false);

            $table->boolean('has_extrem_iq')->default(false);
            $table->boolean('has_super_extrem_iq')->default(false);

            $table->boolean('has_extrem_creative')->default(false);
            $table->boolean('has_super_extrem_creative')->default(false);

            $table->boolean('has_extrem_thinker')->default(false);
            $table->boolean('has_super_extrem_thinker')->default(false);

            $table->boolean('has_extrem_language')->default(false);
            $table->boolean('has_super_extrem_language')->default(false);

            $table->boolean('has_extrem_eq')->default(false);
            $table->boolean('has_super_extrem_eq')->default(false);

            $table->boolean('has_extrem_speaker')->default(false);
            $table->boolean('has_super_extrem_speaker')->default(false);

            $table->boolean('has_extrem_writer')->default(false);
            $table->boolean('has_super_extrem_writer')->default(false);

            $table->boolean('has_extrem_logic')->default(false);
            $table->boolean('has_super_extrem_logic')->default(false);

            $table->boolean('has_extrem_imagine')->default(false);
            $table->boolean('has_super_extrem_imagine')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verifies');
    }
}
