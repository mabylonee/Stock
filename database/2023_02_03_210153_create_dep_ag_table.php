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
        Schema::create('dep_ag', function (Blueprint $table) {
            $table->comment('');
            $table->integer('idAg');
            $table->string('idDep', 10);
            $table->string('ag_desc', 80)->nullable();
            $table->string('dep_desc', 80)->nullable();

            $table->primary(['idAg', 'idDep']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dep_ag');
    }
};
