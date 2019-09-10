<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobIndustriesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'job_industries';

    /**
     * Run the migrations.
     * @table job_industries
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('industry_name');
            $table->string('industry_code', 10);
            $table->string('industry_description', 45)->nullable()->default(null);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->tinyInteger('is_deleted')->default('0');
            $table->unique(["industry_code"], 'industry_code_UNIQUE');
            $table->unique(["id"], 'id_UNIQUE');
            $table->unique(["industry_name"], 'industry_name_UNIQUE');
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
