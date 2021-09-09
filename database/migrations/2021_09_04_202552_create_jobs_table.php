<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedInteger('number_of_posts');
            $table->text('description')->nullable();
            $table->text('qualification');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('employer_id')->default(1);
            $table->timestamp('posted_on')->nullable();
            $table->date('deadline')->nullable();
            $table->string('salary_scale');
            $table->string('file_path')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('employer_id')->references('id')->on('employers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}