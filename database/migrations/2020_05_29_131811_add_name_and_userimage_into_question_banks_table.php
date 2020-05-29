<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameAndUserimageIntoQuestionBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question_banks', function ($table) {

            $table->string('name');
            $table->string('ProfileImage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question_banks', function ($table) {

            $table->dropColumn('name');
            $table->dropColumn('ProfileImage');
        });
    }
}