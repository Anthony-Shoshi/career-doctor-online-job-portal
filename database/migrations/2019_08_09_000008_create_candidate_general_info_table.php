<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateGeneralInfoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'candidate_general_infos';

    /**
     * Run the migrations.
     * @table candidate_general_info
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedInteger('industry_id');
            $table->foreign('industry_id')
                ->references('id')->on('job_industries')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->string('current_position', 100)->nullable()->default(null);
            $table->string('current_employer', 100)->nullable()->default(null);
            $table->text('short_description')->nullable()->default(null);
            $table->string('contact_email', 100);
            $table->string('contact_phone', 45);
            $table->enum('gender', ['MALE', 'FEMALE', 'OTHER']);
            $table->date('date_of_birth');
            $table->string('current_address', 100);
            $table->unsignedMediumInteger('current_city_id');
            $table->foreign('current_city_id')
                ->references('id')->on('cities')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->string('current_postcode', 20);
            $table->unsignedMediumInteger('current_country_id');
            $table->foreign('current_country_id')
                ->references('id')->on('countries')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->integer('current_status');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->tinyInteger('is_deleted')->default('0');

            $table->index(["industry_id"], 'candidate_general_info_pk2_idx');

            $table->index(["current_country_id"], 'fk_candidate_general_info_1_idx');

            $table->index(["current_city_id"], 'fk_candidate_general_info_2_idx');

            $table->index(["user_id"], 'candidate_general_info_pk1_idx');

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
