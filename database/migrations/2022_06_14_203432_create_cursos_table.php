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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id(); //id (bigint)
            $table->string("nombre", 200);
            $table->text("detalle")->nullable();
            $table->integer("nro_bimestre")->default(0);
            $table->timestamps(); //created_at, created_at
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
        Schema::dropIfExists('cursos');
    }
};
