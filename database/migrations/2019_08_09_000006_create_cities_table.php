<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'cities';

    /**
     * Run the migrations.
     * @table cities
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->mediumIncrements('id');
            $table->unsignedMediumInteger('country_id');
            $table->foreign('country_id')
                ->references('id')->on('countries')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->string('name');
            $table->tinyInteger('is_deleted')->default('0');
            $table->dateTime('created_at')->default('2013-12-31 18:31:01');
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->index(["country_id"], 'fk_cities_1_idx');
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
