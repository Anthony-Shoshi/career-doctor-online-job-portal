<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienceSkillRecordTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'experience_skill_record';

    /**
     * Run the migrations.
     * @table experience_skill_record
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedBigInteger('user');
            $table->foreign('user')
                ->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->unsignedInteger('candidate_experience');
            $table->foreign('candidate_experience')
                ->references('id')->on('candidate_experiences')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->unsignedInteger('job_skill');
            $table->foreign('job_skill')
                ->references('id')->on('job_skills')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->integer('duration_in_month')->default('1');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->tinyInteger('is_deleted')->default('0');
            $table->index(["job_skill"], 'fk_experience_skill_record_1_idx');
            $table->index(["candidate_experience"], 'fk_experience_skill_record_3_idx');
            $table->index(["user"], 'fk_experience_skill_record_2_idx');
            $table->unique(["id"], 'id_UNIQUE');
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
       Schema::dropIfExists($this->tableName);
     }
}
