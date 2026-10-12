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
        Schema::create('cong', function (Blueprint $table) {
            $table->comment('');
            $table->integer('idcong', true);
            $table->integer('agence')->index('agence_idx');
            $table->string('dep', 10)->index('depdep_idx');
            $table->string('nom', 11)->index('matricule_idx');
            $table->integer('type')->nullable();
            $table->integer('nbr_jr')->nullable();
            $table->integer('sous_type')->nullable()->index('sous_type_idx');
            $table->string('debut_date', 11)->nullable();
            $table->string('fin_date', 11)->nullable();
            $table->string('file_type', 45)->nullable();
            $table->binary('file_scan')->nullable();
            $table->date('date_creation')->nullable();

            $table->primary(['idcong', 'agence', 'dep', 'nom']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cong');
    }
};
