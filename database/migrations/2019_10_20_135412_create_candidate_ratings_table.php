<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('candidate_id');
            $table->foreign('candidate_id', 'fk_candidate_ratings_1_idx')
                ->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id', 'fk_candidate_ratings_2_idx')
                ->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->tinyInteger('rating');
            $table->string('review_title');
            $table->string('review_content');
            $table->tinyInteger('is_deleted')->default('0');
            $table->timestamps();
            $table->index(["candidate_id"], 'fk_candidate_ratings_1_idx');
            $table->index(["company_id"], 'fk_candidate_ratings_2_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_ratings');
    }
}
