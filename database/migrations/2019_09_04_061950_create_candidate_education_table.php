<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_education', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->unsignedInteger('degree');
            $table->foreign('degree')
                ->references('id')->on('education_degrees')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->string('degree_title');
            $table->string('institute_name');
            $table->string('location');
            $table->string('grade');
            $table->string('passing_year')->nullable();
            $table->boolean('is_running');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->tinyInteger('is_deleted')->default('0');
            $table->timestamps();
            $table->index(["user_id"], 'fk_candidate_education_1_idx');
            $table->index(["degree"], 'fk_candidate_education_2_idx');

            $table->unique(["id"], 'id_UNIQUE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_education');
    }
}
