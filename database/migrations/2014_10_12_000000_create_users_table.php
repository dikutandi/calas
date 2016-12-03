<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id');
            $table->string('name', 30);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('roles')->default('calas');
            $table->string('confirmation_token');
            $table->timestamp('confirmed_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('users_calas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userid')->unsigned();
            $table->string('npm', 18)->unique();
            $table->string('kelas', 6);
            $table->mediumText('alamat');
            $table->string('contact', 20);
            $table->decimal('ipk_utama', 10, 2)->nullable();
            $table->decimal('ipk_lokal', 10, 2)->nullable();
            $table->string('cv');

            $table->timestamps();

            $table->foreign('userid')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_calas');
        Schema::drop('users');
    }
}
