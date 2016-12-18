<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusCalas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_calas', function (Blueprint $table) {
            $table->string('last_status', 20)->nullable()->default(1); // 1 => Waiting, 2 => Lolos Seleksi 1, 3 => Lolos Seleksi 2, Gagal
            $table->boolean('is_gagal')->default(0); //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_calas', function (Blueprint $table) {
            $table->dropColumn(['last_status', 'is_gagal']);
        });
    }
}
