<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_qualifications', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('qualification_name');
            $table->string('qualification_code', 10);
            $table->string('qualification_description', 45)->nullable()->default(null);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->tinyInteger('is_deleted')->default('0');
            $table->unique(["qualification_code"], 'qualification_code_UNIQUE');
            $table->unique(["id"], 'id_UNIQUE');
            $table->unique(["qualification_name"], 'iqualification_name_UNIQUE');
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
        Schema::dropIfExists('job_qualifications');
    }
}
