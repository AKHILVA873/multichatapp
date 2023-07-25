<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('message_dislikes', function (Blueprint $table) {
            $table->foreignId('message_id')->constrained('chat_messages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('message_dislikes', function (Blueprint $table) {
            $table->dropForeign(['message_id']);
            $table->dropColumn('message_id');
        });
    }
};
