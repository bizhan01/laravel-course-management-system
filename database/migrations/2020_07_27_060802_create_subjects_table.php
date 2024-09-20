<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            // $table->float('fee')->nullable();
            // $table->float('discount')->nullable();
            // $table->time('start_time')->nullable();
            // $table->time('end_time')->nullable();
            // $table->string('status')->nullable();
            $table->string('photo')->nullable();
            $table->unsignedInteger('cat_id');
            // $table->unsignedInteger('teacher_id');
            $table->timestamps();
            $table->foreign('cat_id')
                ->references('id')
                ->on('subject_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            // $table->foreign('teacher_id')
            //     ->references('id')
            //     ->on('teachers')
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
