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
        Schema::create('app', function (Blueprint $table) {
            $table->comment('');
            $table->integer('idapp');
            $table->string('profil', 45);
            $table->string('name_app', 45)->nullable();
            $table->string('name_profil', 45)->nullable();

            $table->primary(['idapp', 'profil']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app');
    }
};
