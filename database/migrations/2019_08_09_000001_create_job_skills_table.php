<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobSkillsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'job_skills';

    /**
     * Run the migrations.
     * @table job_skills
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('skill_name', 100);
            $table->string('skill_code', 10);
            $table->text('skill_description')->nullable()->default(null);
            $table->string('row_delete', 45)->default('0');

            $table->unique(["skill_code"], 'skill_code_UNIQUE');

            $table->unique(["id"], 'id_UNIQUE');

            $table->unique(["skill_name"], 'skill_name_UNIQUE');
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
