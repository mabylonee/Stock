<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_aff', function (Blueprint $table) {
            $table->comment('');
            $table->integer('idapp');
            $table->string('profil', 45)->index('profil_idx');
            $table->string('user_mat', 11)->index('user_res_idx');

            $table->primary(['idapp', 'profil', 'user_mat']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_aff');
    }
};
