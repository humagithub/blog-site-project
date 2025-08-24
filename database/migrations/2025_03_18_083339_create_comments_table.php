<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // User who made the comment
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade'); // Post ID
            $table->string('post_type'); // Type of post (e.g., 'blog', 'news')
            $table->text('comment'); // The comment text
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
};

