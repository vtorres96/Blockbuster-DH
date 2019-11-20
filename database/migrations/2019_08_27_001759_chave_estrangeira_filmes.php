<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChaveEstrangeiraFilmes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('filmes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_protagonista');
            $table->unsignedBigInteger('id_genero');

            $table->foreign('id_protagonista')->references('id')->on('atores');
            $table->foreign('id_genero')->references('id')->on('generos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('filmes', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['id_protagonista']);
            $table->dropForeign(['id_genero']);
            $table->dropColumn('id_protagonista');
            $table->dropColumn('id_genero');
            Schema::enableForeignKeyConstraints();
        });
    }
}
