<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->string('cargo_no');
            $table->string('cargo_type');
            $table->integer('cargo_size')->default(0.00);
            $table->integer('weight')->default(0);
            $table->string('remark')->nullable();
            $table->integer('wharfage')->default(0);
            $table->integer('penalty')->default(0);
            $table->integer('storage')->default(0);
            $table->integer('electricity')->default(0);
            $table->integer('destuffing')->default(0);
            $table->integer('lifting')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargos');
    }
}
