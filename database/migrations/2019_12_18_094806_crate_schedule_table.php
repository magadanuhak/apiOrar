<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->bigIncrements('id');
            /**
             * Week start with monday
             * 0 - Luni
             * 1 - Marti
             * 2 - Miercuri
             * 3 - Joi
             * 5 - Vineri
             * 6 - Simbata
             * 7 - Duminica
             */
            $table->enum('week_day', ['0', '1', '2', '3', '4', '5', '6']);
            $table->tinyInteger('week');
            $table->tinyInteger('semester');
            $table->enum('lesson_number', ['1', '2', '3', '4', '5', '6', '7', '8', '9']);
            /**
             * P - Prelegere
             * L - Laborator
             * C - Consultatie
             * E - Examen
             */
            $table->enum('lesson_type', ['P', 'C', 'E', 'L']);
            $table->enum('group_part', ['all', 'sb1', 'sb2', 'sb3']);
            $table->bigInteger('auditory_id')->unsigned();
            $table->foreign('auditory_id')
                ->references('id')->on('owners')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->bigInteger('lesson_id')->unsigned();
            $table->foreign('lesson_id')
                ->references('id')->on('lessons')
                ->onDelete('restrict')->onUpdate('restrict');
            $table->bigInteger('group_id')->unsigned();
            $table->foreign('group_id')
                ->references('id')->on('owners')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->bigInteger('teacher_id')->unsigned();
            $table->foreign('teacher_id')
                ->references('id')->on('owners')
                ->onDelete('restrict')
                ->onUpdate('restrict');
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
        Schema::dropIfExists('schedule');
    }
}
