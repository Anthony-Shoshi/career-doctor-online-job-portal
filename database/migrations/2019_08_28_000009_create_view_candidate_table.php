<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewCandidateTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'view_candidates';

    /**
     * Run the migrations.
     * @table view_candidate
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
            $table->unsignedBigInteger('candidate');
            $table->foreign('candidate')
                ->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->timestamps();
            $table->index(["candidate"], 'fk_view_candidate_1_idx');
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
