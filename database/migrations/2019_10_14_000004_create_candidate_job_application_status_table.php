<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateJobApplicationStatusTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'candidate_job_application_statuses';

    /**
     * Run the migrations.
     * @table candidate_job_application_status
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
            $table->unsignedInteger('job');
            $table->foreign('job')
                ->references('id')->on('jobs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedInteger('message_thread');
            $table->foreign('message_thread')
                ->references('id')->on('message_threads')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->enum('status', ['APPLIED', 'PROCESSING', 'APPROVED', 'DECLINED', 'WITHDRAWN'])->default('APPLIED');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->tinyInteger('is_deleted')->default(0);
            $table->index(["message_thread"], 'candidate_job_application_status_fk3_idx');
            $table->index(["job"], 'candidate_job_application_status_fk2_idx');
            $table->index(["user"], 'candidate_job_application_status_fk1_idx');
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
