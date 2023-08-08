<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->string("slug")->unique();
            $table->longText("about");
            $table->string("category");
            $table->string("image");
            $table->integer("page");
            $table->string("writer");
            $table->date("releaseYear");
            $table->float("score");
            $table->float("rating");
            $table->integer("likes");
            $table->string("addPerson");
            $table->boolean("status")->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
