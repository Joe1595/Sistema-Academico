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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string("nombres", 50);
            $table->string("paterno", 50);
            $table->string("materno", 50)->nullable();
            $table->string("ci", 15);
            $table->string("direccion")->nullable();
            $table->string("telefono",15)->nullable();
            //1:1
            $table->bigInteger("user_id")->unsigned()->nullable();
            $table->foreign("user_id")->references("id")->on("users");
            
            $table->timestamps();
            $table->softDeletes();//agregar delet_at
            //ayuda a poder recurar datos
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
};
