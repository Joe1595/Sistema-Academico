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
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("sigla", 10);
            $table->integer("bimestre")->nullable();
            $table->bigInteger("materia_id")->unsigned()->nullable();
            $table->text("descripcion")->nullable();
            //N:1 muchas materias a un curso, es la cardinalidad
            $table->bigInteger("curso_id")->unsigned();
            $table->foreign("curso_id")->references("id")
                                        ->on("cursos")
                                        ->onDelete('cascade');
            $table->foreign("materia_id")->references("id")->on("materias");
            $table->timestamps();
            $table->softDeletes();//agregar delet_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materias');
    }
};
