<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("description");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("assigned_to");
            $table->unsignedBigInteger("status_id");

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("assigned_to")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("status_id")->references("id")->on("statuses")->onDelete("cascade");
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
        Schema::dropIfExists('tasks');
    }
}
