<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Http\Request;
// Include the necessary classes at the top of the file

class ChatRoomController extends Controller
{
    // Method to list chat rooms
    public function index()
    {
        $chatRooms = ChatRoom::all();
        return view('chat_rooms.index', compact('chatRooms'));
    }

    // Method to show the create chat room form
    public function create()
    {
        return view('chat_rooms.create');
    }

    // Method to handle chat room creation
    public function store(Request $request)
    {
        // Validation logic for chat room data
        $request->validate([
            'name' => 'required|string|max:255|unique:chat_rooms',
        ]);

        // Create and save the new chat room
        $chatRoom = new ChatRoom(['name' => $request->name]);
        $chatRoom->save();

        // Redirect back to chat rooms listing
        return redirect()->route('chat.rooms.index');
    }

    // Method to show the chat room and its messages
    public function show($id)
    {
        $chatRoom = ChatRoom::findOrFail($id);
        $messages = ChatMessage::where('chat_room_id', $id)->with('user')->get();
        return view('chat_rooms.show', compact('chatRoom', 'messages'));
    }

    // Method to handle sending a new message in a chat room
    public function sendMessage(Request $request, $id)
    {
        // Validation logic for message content
        $request->validate([
            'message_content' => 'required|string',
        ]);

        // Create and save the new message in the chat room
        $message = new ChatMessage([
            'user_id' => auth()->user()->id,
            'chat_room_id' => $id,
            'message_content' => $request->message_content,
        ]);
        $message->save();

        // Redirect back to the chat room with the updated messages
        return redirect()->route('chat.rooms.show', $id);
    }
}
