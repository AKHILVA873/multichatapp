<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('message_likes', function (Blueprint $table) {
            $table->unsignedBigInteger('chat_message_id'); // Add the chat_message_id column
            $table->foreign('chat_message_id')->references('id')->on('chat_messages')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('message_likes', function (Blueprint $table) {
            $table->dropForeign(['chat_message_id']);
            $table->dropColumn('chat_message_id');
        });
    }
};
