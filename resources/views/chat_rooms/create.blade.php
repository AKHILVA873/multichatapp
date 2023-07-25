<!-- Create a form to create a new chat room -->
<form method="POST" action="{{ route('chat.rooms.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Chat Room Name">
    <button type="submit">Create Chat Room</button>
</form>
