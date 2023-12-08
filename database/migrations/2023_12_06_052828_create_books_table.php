<?php

use App\Enums\GenreEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string("cover_pic", 255)->nullable();
            $table->string('title', 255);
            $table->string('page_no', 10)->nullable();
            $table->string("copies")->nullable();
            $table->boolean("is_featured")->default(0);
            $table->enum("genre", GenreEnum::getAllValues());
            $table->json("blurb")->nullable();
            $table->date("published_date")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
