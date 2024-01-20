<?php

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
        Schema::create('commons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cover');
            $table->text('images');
            $table->string('name');
            $table->string('slug');
            $table->string('column1');
            $table->string('column2');
            $table->text('text');
            $table->string('image_meta');
            $table->string('title_meta');
            $table->string('description_meta');
            $table->timestamps();
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commons');
    }
};
