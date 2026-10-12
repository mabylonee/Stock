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
        Schema::create('stock_archive', function (Blueprint $table) {
            $table->comment('');
            $table->integer('idArchive', true);
            $table->string('designation', 100)->index('des_arch_idx');
            $table->integer('qt')->nullable();
            $table->integer('qteMin');
            $table->date('date_in')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_archive');
    }
};
