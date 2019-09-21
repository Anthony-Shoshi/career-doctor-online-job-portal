<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_followers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('candidate');
            $table->foreign('candidate', 'fk_company_followers_1_idx')
                ->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->unsignedBigInteger('company');
            $table->foreign('company', 'fk_company_followers_2_idx')
                ->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->tinyInteger('is_deleted')->default('0');
            $table->timestamps();
            $table->index(["candidate"], 'fk_company_followers_1_idx');
            $table->index(["company"], 'fk_company_followers_2_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_followers');
    }
}
