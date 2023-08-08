<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('actors', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug");
            $table->string("gender")->nullable();
            $table->longText("about")->nullable();
            $table->string("image")->nullable();
            $table->string("birthplace")->nullable();
            $table->date("date")->nullable();
            $table->float("rating")->default(0);
            $table->float("score")->default(0);
            $table->integer("likes")->default(0);
            $table->string("addPerson");
            $table->boolean("status")->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('actors');
    }
};
