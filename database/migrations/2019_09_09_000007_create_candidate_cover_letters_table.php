<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateCoverLettersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'candidate_cover_letters';

    /**
     * Run the migrations.
     * @table candidate_cover_letters
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
            $table->string('title', 100);
            $table->text('description');
            $table->tinyInteger('is_default')->default('0');
            $table->enum('status', ['DRAFT', 'PUBLISHED'])->default('DRAFT');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->tinyInteger('is_deleted')->default('0');
            $table->index(["user"], 'fk_candidate_cover_letters_1_idx');
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
