<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageThreadsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'message_threads';

    /**
     * Run the migrations.
     * @table message_threads
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedBigInteger('user_from');
            $table->foreign('user_from')
                ->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->unsignedBigInteger('user_to');
            $table->foreign('user_to')
                ->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->string('subject');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->tinyInteger('is_deleted')->default('0');
            $table->index(["user_from"], 'fk_message_threads_1_idx');

            $table->index(["user_to"], 'fk_message_threads_2_idx');

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
