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


            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('dgsvo')->default(false);
            $table->rememberToken();


            $table->boolean('is_user_activ')->default(false);
            $table->boolean('is_user_www')->default(false);
            $table->boolean('is_user_show')->default(false);

            $table->boolean('role_ps')->default(false);
            $table->boolean('role_company')->default(false);
            $table->boolean('role_hunter')->default(false);
            $table->boolean('role_fan')->default(false);

            #$table->boolean('is_user_activ')->default(false);
            #$table->boolean('is_user_activ')->default(false);

            #$table->boolean('is_user_show')->default(false);
            #$table->boolean('is_user_www')->default(false);
            #$table->boolean('is_user_show_for_company')->default(false);

            #$table->boolean('role_company')->default(false);
            #$table->boolean('role_company_member_access')->default(false);
            #$table->boolean('role_company_www_advert')->default(false);

            $table->string('name');
            $table->string('slogan')->nullable();

            $table->string('teaser')->nullable();
            $table->string('text')->nullable();
            $table->string('city')->nullable();

            $table->string('www')->nullable();
            $table->string('xing')->nullable();
            $table->string('linkedin')->nullable();

            $table->string('image')->nullable();

            $table->string('talent_anecdote_1_header')->nullable();
            $table->string('talent_anecdote_2_header')->nullable();
            $table->string('talent_anecdote_3_header')->nullable();

            $table->longText('talent_anecdote_1')->nullable();
            $table->longText('talent_anecdote_2')->nullable();
            $table->longText('talent_anecdote_3')->nullable();

            $table->string('talent_special_header')->nullable();
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
