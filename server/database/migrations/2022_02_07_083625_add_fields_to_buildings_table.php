<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buildings', function (Blueprint $table) {
            $table->string('nome')->nullable();        
            $table->string('foto')->nullable();
            $table->string('comune')->nullable();
            $table->string('provincia')->nullable();
            $table->string('indirizzo')->nullable();
            $table->integer('cap')->nullable();
            $table->integer('numappartamenti')->nullable();
            $table->integer('consumo')->nullable();
            $table->boolean('gestrem')->nullable();
            $table->string('contabilizzazione')->nullable();
            $table->string('sonda')->nullable();
            $table->string('dispositivi')->nullable();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buildings', function (Blueprint $table) {
            $table->dropColumn ([
            'nome',
            'foto',
            'comune',
            'provincia',
            'indirizzo',
            'cap',
            'numappartamenti',
            'consumo',
            'gestrem',
            'contabilizzazione',
            'sonda',
            'dispositivi',
        ]);
        });
    }
}
