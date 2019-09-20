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
            $table->foreign('company', 'fk_jobs_1_idx')
                ->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->unsignedInteger('job_category');
            $table->foreign('job_category', 'fk_jobs_2_idx')
                ->references('id')->on('job_categories')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->unsignedInteger('job_industry');
            $table->foreign('job_industry', 'fk_jobs_3_idx')
                ->references('id')->on('job_industries')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->string('title');
            $table->string('unique_id', 10);
            $table->tinyInteger('position_count')->default('1');
            $table->unsignedInteger('job_type');
            $table->foreign('job_type', 'fk_jobs_5_idx')
                ->references('id')->on('job_types')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->text('description');
            $table->tinyInteger('min_exp_year');
            $table->tinyInteger('max_exp_year');
            $table->enum('salary_terms', ['PER_MONTH', 'PER_YEAR'])->default('PER_YEAR');
            $table->decimal('min_salary', 10, 2);
            $table->decimal('max_salary', 10, 2);
            $table->unsignedInteger('currency');
            $table->foreign('currency', 'fk_jobs_4_idx')
                ->references('id')->on('currencies')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->unsignedInteger('job_qualification');
            $table->foreign('job_qualification', 'fk_jobs_8_idx')
                ->references('id')->on('job_qualifications')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->enum('gender', ['MALE', 'FEMALE', 'OTHER']);
            $table->tinyInteger('min_age')->default('0');
            $table->tinyInteger('max_age')->default('0');
            $table->tinyInteger('is_negotiable');
            $table->tinyInteger('is_visa_sponsor')->default('0');
            $table->tinyInteger('is_relocation')->default('0');
            $table->tinyInteger('is_published');
            $table->enum('submission_type', ['EMAIL', 'LINK', 'INTERNAL'])->default('INTERNAL');
            $table->string('submission_type_value')->nullable()->default(null);
            $table->text('submission_instruction')->nullable()->default(null);
            $table->date('deadline');
            $table->unsignedMediumInteger('country_id');
            $table->foreign('country_id')
                ->references('id')->on('countries')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->unsignedMediumInteger('city_id');
            $table->foreign('city_id')
                ->references('id')->on('cities')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->tinyInteger('is_deleted')->default('0');
            $table->index(["currency"], 'fk_jobs_4_idx');
            $table->index(["job_type"], 'fk_jobs_5_idx');
            $table->index(["job_category"], 'fk_jobs_2_idx');
            $table->index(["job_industry"], 'fk_jobs_3_idx');
            $table->index(["company"], 'fk_jobs_1_idx');
            $table->index(["country_id"], 'fk_jobs_6_idx');
            $table->index(["city_id"], 'fk_jobs_7_idx');
            $table->index(["job_qualification"], 'fk_jobs_8_idx');
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
