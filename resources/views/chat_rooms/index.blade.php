<!-- Display a list of existing chat rooms -->
<h1>Chat Rooms</h1>
<ul>
    @foreach ($chatRooms as $chatRoom)
        <li><a href="{{ route('chat.rooms.show', $chatRoom->id) }}">{{ $chatRoom->name }}</a></li>
    @endforeach
</ul>
