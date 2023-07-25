<!-- Display the chat room name and list of messages -->
<h1>Chat Room: {{ $chatRoom->name }}</h1>
<ul>
    @foreach ($messages as $message)
        <li>{{ $message->user->name }}: {{ $message->message_content }}</li>
    @endforeach
</ul>

<!-- Create a form to send a new message -->
<form method="POST" action="{{ route('chat.rooms.send', $chatRoom->id) }}">
    @csrf
    <input type="text" name="message_content" placeholder="Type your message here">
    <button type="submit">Send</button>
</form>
