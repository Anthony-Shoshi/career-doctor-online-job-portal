<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateExperiencesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'candidate_experiences';

    /**
     * Run the migrations.
     * @table candidate_experiences
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'candidate_experiences_PK1_idx')
                ->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->date('start_date');
            $table->date('end_date')->nullable()->default(null);
            $table->integer('is_current')->default('0');
            $table->string('position', 100);
            $table->string('company_name', 100);
            $table->integer('city');
            $table->integer('country');
            $table->text('experience_summary')->nullable()->default(null);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->tinyInteger('is_deleted')->default('0');
            $table->index(["user_id"], 'candidate_experiences_PK1_idx');
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
