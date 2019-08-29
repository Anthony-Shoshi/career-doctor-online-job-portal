<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'jobs';

    /**
     * Run the migrations.
     * @table jobs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedBigInteger('company');
            $table->foreign('company')
                ->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->unsignedInteger('job_category');
            $table->foreign('job_category')
                ->references('id')->on('job_categories')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->unsignedInteger('job_industry');
            $table->foreign('job_industry')
                ->references('id')->on('job_industries')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->string('title');
            $table->integer('type');
            $table->text('description')->nullable()->default(null);
            $table->tinyInteger('min_exp_year');
            $table->tinyInteger('max_exp_year');
            $table->decimal('min_salary', 10, 2);
            $table->decimal('max_salary', 10, 2);
            $table->tinyInteger('is_negotiable');
            $table->tinyInteger('is_published');

            $table->index(["job_category"], 'fk_jobs_2_idx');

            $table->index(["job_industry"], 'fk_jobs_3_idx');

            $table->index(["company"], 'fk_jobs_1_idx');

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
