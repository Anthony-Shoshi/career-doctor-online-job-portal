<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'messages';

    /**
     * Run the migrations.
     * @table messages
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('thread');
            $table->foreign('thread')
                ->references('id')->on('message_threads')
                ->onDelete('restrict')
                ->onUpdate('restrict');
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
            $table->text('message');
            $table->tinyInteger('is_seen')->default('0');
            $table->dateTime('seen_at')->nullable()->default(null);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->tinyInteger('is_deleted')->default('0');
            $table->index(["user_to"], 'fk_messages_2_idx');
            $table->index(["user_from"], 'fk_messages_3_idx');
            $table->index(["thread"], 'fk_messages_1_idx');
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
