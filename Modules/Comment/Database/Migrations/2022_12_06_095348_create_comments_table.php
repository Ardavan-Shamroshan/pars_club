<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('comments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('author_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->text('body');
            $table->unsignedBigInteger('commentable_id');
            $table->string('commentable_type');
            $table->tinyInteger('seen')->default(0)->comment('0 => unseen, 1 => seen');
            $table->tinyInteger('approved')->default(0)->comment('0 => not approved, 1 => approved');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
