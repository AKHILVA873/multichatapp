<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MessageExport;
use SplTempFileObject;



class DashboardController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }



    public function likeMessage($messageId)
    {
        $message = ChatMessage::find($messageId);
        if ($message) {
            $message->likes++;
            $message->save();
        }

        return redirect()->back();
    }

    public function dislikeMessage($messageId)
    {
        $message = ChatMessage::find($messageId);
        if ($message) {
            $message->dislikes++;
            $message->save();
        }

        return redirect()->back();
    }


    public function deleteMessage($messageId)
    {
        // Fetch the message to be deleted
        $message = ChatMessage::find($messageId);

        // Check if the message exists and belongs to the current user
        if (!$message || $message->user_id !== Auth::id()) {
            abort(404);
        }

        // Delete the message
        $message->delete();

        // Redirect back to the dashboard or reload the conversation
        return redirect()->route('dashboard');
    }


    public function selectContact(Request $request)
    {
        $currentUserId = $request->query('currentUserId');
        $selectedUserId = $request->query('selectedUserId');
        $chatMessages = ChatMessage::where(function ($query) use ($selectedUserId) {
                    $query->where('user_id', Auth::id())->where('receiver_id', $selectedUserId);
                })->orWhere(function ($query) use ($selectedUserId) {
                    $query->where('user_id', $selectedUserId)->where('receiver_id', Auth::id());
                })->orderBy('created_at', 'asc')->get();

        // For example, you can fetch the messages between the current user and selected user:
        $messages = ChatMessage::where(function ($query) use ($currentUserId, $selectedUserId) {
            $query->where('user_id', $currentUserId)->where('receiver_id', $selectedUserId);
        })->orWhere(function ($query) use ($currentUserId, $selectedUserId) {
            $query->where('user_id', $selectedUserId)->where('receiver_id', $currentUserId);
        })->orderBy('created_at', 'asc')->get();

        // Return the view with the messages and other data
        return view('dashboard', [
            'users' => $this->getUsers(),
            'selectedUserId' => $selectedUserId,
            'messages' => $messages,
            'chatMessages' => $chatMessages,
        ]);
    }

public function getUsers()
{
    // Fetch all users except the authenticated user
    $users = User::where('id', '!=', Auth::id())->get();

    return $users;
}

    public function index()
    {
        $users = User::all();
        $selectedUserId = $users->first()->id;

        $chatMessages = ChatMessage::where(function ($query) use ($selectedUserId) {
            $query->where('user_id', auth()->id())
                ->where('receiver_id', $selectedUserId);
        })->orWhere(function ($query) use ($selectedUserId) {
            $query->where('user_id', $selectedUserId)
                ->where('receiver_id', auth()->id());
        })->orderBy('created_at', 'asc')->get();

        return view('dashboard', compact('users', 'chatMessages', 'selectedUserId'));
    }



    public function sendMessage(Request $request)
    {
        $message = new ChatMessage();
    $message->user_id = Auth::id();
    $message->receiver_id = $request->input('receiver_id');
    $message->message_content = $request->input('message_content');
    $message->save();

        // Fetch messages for the selected contact
        $selectedUserId = $request->input('receiver_id');
        $messages = ChatMessage::where(function ($query) use ($selectedUserId) {
            $query->where('user_id', Auth::id())->where('receiver_id', $selectedUserId);
        })->orWhere(function ($query) use ($selectedUserId) {
            $query->where('user_id', $selectedUserId)->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();

        // Fetch the list of users
        $users = $this->getUsers();
        $chatMessages = ChatMessage::where(function ($query) use ($selectedUserId) {
            $query->where('user_id', Auth::id())->where('receiver_id', $selectedUserId);
        })->orWhere(function ($query) use ($selectedUserId) {
            $query->where('user_id', $selectedUserId)->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();

        // Return the messages and users along with the view
        return view('dashboard', [
            'users' => $users,
            'selectedUserId' => $selectedUserId,
            'messages' => $messages,
            'chatMessages' => $chatMessages,
        ]);
    }
    public function exportMessage(Request $request, $receiverId)
    {
        $messages = ChatMessage::where('receiver_id', $receiverId)
            ->where('user_id', auth()->id())
            ->get();

        // Create a CSV file
        $file = fopen('php://temp', 'w');
        fputcsv($file, ['Message Content', 'Created At']);

        foreach ($messages as $message) {
            fputcsv($file, [$message->message_content, $message->created_at->format('Y-m-d H:i:s')]);
        }

        // Rewind the file pointer
        rewind($file);

        // Set the appropriate headers for the CSV file
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="chat_messages.csv"',
        ];

        // Return the CSV file as a downloadable response
        return Response::make(stream_get_contents($file), 200, $headers);
    }

    // public function exportMessage($receiverId)
    // {
    //     $messages = ChatMessage::where(function ($query) use ($receiverId) {
    //         $query->where('user_id', Auth::id())->where('receiver_id', $receiverId);
    //     })->orWhere(function ($query) use ($receiverId) {
    //         $query->where('user_id', $receiverId)->where('receiver_id', Auth::id());
    //     })->orderBy('created_at', 'asc')->get();

    //     return Excel::download(new MessageExport($messages), 'chat_messages.xlsx');
    // }

public function deleteEntireMessage($receiverId)
{
    // Delete all messages for the selected contact
    ChatMessage::where(function ($query) use ($receiverId) {
        $query->where('user_id', Auth::id())->where('receiver_id', $receiverId);
    })->orWhere(function ($query) use ($receiverId) {
        $query->where('user_id', $receiverId)->where('receiver_id', Auth::id());
    })->delete();

    // Redirect back to the chat with the selected contact
    return redirect()->route('dashboard', ['selectedUserId' => $receiverId]);
}

    // public function sendMessage(Request $request)
    // {
    //     // Validate the form data
    //     $request->validate([
    //         'receiver_id' => 'required|integer',
    //         'message_content' => 'required|string',
    //     ]);

    //     // Save the message to the database
    //     $message = new ChatMessage();
    //     $message->user_id = Auth::id(); // Assuming you have user authentication and 'user_id' field in the messages table.
    //     $message->receiver_id = $request->input('receiver_id');
    //     $message->message_content = $request->input('message_content');
    //     $message->save();

    //     // You can also add additional logic here, like sending notifications or broadcasting the message to other users.

    //     // Redirect back to the previous page (dashboard, in this case)
    //     return redirect()->back()->with('success', 'Message sent successfully!');
    // }

// app/Http/Controllers/MessageController.php


// ...




}
