<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewJobTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'view_jobs';

    /**
     * Run the migrations.
     * @table view_job
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user')->nullable()->default(null);
            $table->string('from_ip', 45);
            $table->unsignedInteger('job');
            $table->foreign('job')
                ->references('id')->on('jobs')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->timestamps();
            $table->index(["job"], 'fk_view_job_1_idx');
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
       Schema::dropIfExists($this->tableName);
     }
}
