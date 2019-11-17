<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('dgsvo')->default(false);
            $table->rememberToken();

            $table->boolean('is_activ_profil')->default(false);
            $table->boolean('is_activ_member')->default(false);

            $table->boolean('show_profil')->default(false);
            $table->boolean('show_profil_www')->default(false);
            $table->boolean('show_profil_for_company')->default(false);

            $table->boolean('is_company')->default(false);
            $table->boolean('is_company_member_access')->default(false);
            $table->boolean('is_company_www_advert')->default(false);

            $table->string('www')->nullable();
            $table->string('xing')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('cbc')->nullable();

            $table->string('slogan')->nullable();
            $table->string('image')->nullable();

            $table->longText('talent_anecdote_1')->nullable();
            $table->longText('talent_anecdote_2')->nullable();
            $table->longText('talent_anecdote_3')->nullable();

            $table->text('talent_special')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
