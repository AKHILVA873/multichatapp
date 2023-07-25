<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatMessagesTable extends Migration
{
   // In the existing migration file
// In the migration file
public function up()
{
    Schema::create('chat_messages', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('receiver_id');
        $table->text('message_content'); // Add this line to create the 'content' column

        $table->timestamps();
    });
}



    public function down()
    {
        Schema::dropIfExists('chat_messages');
    }
}

