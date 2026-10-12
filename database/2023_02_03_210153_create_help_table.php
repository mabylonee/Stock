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
        Schema::create('help', function (Blueprint $table) {
            $table->comment('');
            $table->integer('agence')->nullable()->index('agence_idx');
            $table->string('User_create', 11)->index('create_user_idx');
            $table->string('NumCarte', 50);
            $table->string('GAB', 45)->nullable();
            $table->string('Client', 80);
            $table->string('Description', 1000)->nullable();
            $table->string('Statut', 15)->nullable()->default('');
            $table->dateTime('Date_cloture')->nullable();
            $table->dateTime('Date_recu')->nullable();
            $table->string('User_recu', 11)->nullable()->index('recu_user_idx');
            $table->dateTime('Date_traiter')->nullable();
            $table->string('User_Traite', 11)->nullable()->index('traite_user_idx');
            $table->dateTime('Date_Audit')->nullable();
            $table->string('User_Audit', 11)->nullable()->index('audit_user_idx');
            $table->dateTime('Date_creation')->nullable();
            $table->dateTime('updateRec')->nullable();
            $table->string('User_cloture', 11)->nullable()->index('cloture_user_idx');
            $table->string('User_op', 11)->nullable()->index('user_op_idx');
            $table->dateTime('Date_op')->nullable();
            $table->string('User_sup', 11)->nullable()->index('user_sup_idx');
            $table->dateTime('Date_sup')->nullable();
            $table->string('banque')->default('BIM');
            $table->string('type', 20);
            $table->string('tel', 15);
            $table->string('emailcl', 30);
            $table->binary('file');
            $table->string('typee', 25);
            $table->integer('idRec', true);
            $table->string('autrobj');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('help');
    }
};
