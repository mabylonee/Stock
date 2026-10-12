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
        Schema::create('user', function (Blueprint $table) {
            $table->comment('');
            $table->string('Matricule', 11);
            $table->integer('Agence')->index('agence_idx');
            $table->string('Password', 45);
            $table->string('Nom', 70);
            $table->string('Role', 45)->nullable();
            $table->string('emailUser', 55)->nullable()->unique();
            $table->date('rec_date')->nullable();
            $table->string('dep', 10)->nullable()->index('dep_idx');
            $table->string('email2', 55)->nullable();

            $table->primary(['Matricule', 'Agence']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};
