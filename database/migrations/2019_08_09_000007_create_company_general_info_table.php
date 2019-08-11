<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyGeneralInfoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'company_general_info';

    /**
     * Run the migrations.
     * @table company_general_info
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
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->unsignedInteger('industry_id');
            $table->foreign('industry_id')
                ->references('id')->on('job_industries')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->string('company_name');
            $table->string('company_default_address');
            $table->unsignedMediumInteger('company_default_city_id');
            $table->foreign('company_default_city_id')
                ->references('id')->on('cities')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->string('company_default_postcode', 45);
            $table->unsignedMediumInteger('company_default_country_id');
            $table->foreign('company_default_country_id')
                ->references('id')->on('countries')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->text('company_banner')->nullable()->default(null);
            $table->text('company_description')->nullable()->default(null);
            $table->string('contact_person_name');
            $table->string('contact_person_email', 100);
            $table->string('contact_person_position', 100);
            $table->string('contact_person_phone', 100)->nullable()->default(null);
            $table->integer('row_delete')->default('0');

            $table->index(["user_id"], 'fk_company_general_info_1_idx');

            $table->index(["company_default_country_id"], 'fk_company_general_info_3_idx');

            $table->index(["industry_id"], 'fk_company_general_info_2_idx');

            $table->index(["company_default_city_id"], 'fk_company_general_info_4_idx');

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
