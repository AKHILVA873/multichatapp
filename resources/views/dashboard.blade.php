{{--
<h1>Welcome, {{ auth()->user()->name }}!</h1>
<a href="{{ route('chat.rooms.index') }}">View Chat Rooms</a>  --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Whatsapp web chat template - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        html,
        body,
        div,
        span {
            height: 100%;
            width: 100%;
            overflow: hidden;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background: url("https://www.bootdey.com/img/bgy.png") no-repeat fixed center;
            background-size: cover;
        }

        .fa-2x {
            font-size: 1.5em;
        }

        .app {
            position: relative;
            overflow: hidden;
            top: 19px;
            height: calc(100% - 38px);
            margin: auto;
            padding: 0;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .06), 0 2px 5px 0 rgba(0, 0, 0, .2);
        }

        .app-one {
            background-color: #f7f7f7;
            height: 100%;
            overflow: hidden;
            margin: 0;
            padding: 0;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .06), 0 2px 5px 0 rgba(0, 0, 0, .2);
        }

        .side {
            padding: 0;
            margin: 0;
            height: 100%;
        }

        .side-one {
            padding: 0;
            margin: 0;
            height: 100%;
            width: 100%;
            z-index: 1;
            position: relative;
            display: block;
            top: 0;
        }

        .side-two {
            padding: 0;
            margin: 0;
            height: 100%;
            width: 100%;
            z-index: 2;
            position: relative;
            top: -100%;
            left: -100%;
            -webkit-transition: left 0.3s ease;
            transition: left 0.3s ease;

        }


        .heading {
            padding: 10px 16px 10px 15px;
            margin: 0;
            height: 60px;
            width: 100%;
            background-color: #eee;
            z-index: 1000;
        }

        .heading-avatar {
            padding: 0;
            cursor: pointer;

        }

        .heading-avatar-icon img {
            border-radius: 50%;
            height: 40px;
            width: 40px;
        }

        .heading-name {
            padding: 0 !important;
            cursor: pointer;
        }

        .heading-name-meta {
            font-weight: 700;
            font-size: 100%;
            padding: 5px;
            padding-bottom: 0;
            text-align: left;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: #000;
            display: block;
        }

        .heading-online {
            display: none;
            padding: 0 5px;
            font-size: 12px;
            color: #93918f;
        }

        .heading-compose {
            padding: 0;
        }

        .heading-compose i {
            text-align: center;
            padding: 5px;
            color: #93918f;
            cursor: pointer;
        }

        .heading-dot {
            padding: 0;
            margin-left: 10px;
        }

        .heading-dot i {
            text-align: right;
            padding: 5px;
            color: #93918f;
            cursor: pointer;
        }

        .searchBox {
            padding: 0 !important;
            margin: 0 !important;
            height: 60px;
            width: 100%;
        }

        .searchBox-inner {
            height: 100%;
            width: 100%;
            padding: 10px !important;
            background-color: #fbfbfb;
        }


        /*#searchBox-inner input {
  box-shadow: none;
}*/

        .searchBox-inner input:focus {
            outline: none;
            border: none;
            box-shadow: none;
        }

        .sideBar {
            padding: 0 !important;
            margin: 0 !important;
            background-color: #fff;
            overflow-y: auto;
            border: 1px solid #f7f7f7;
            height: calc(100% - 120px);
        }

        .sideBar-body {
            position: relative;
            padding: 10px !important;
            border-bottom: 1px solid #f7f7f7;
            height: 72px;
            margin: 0 !important;
            cursor: pointer;
        }

        .sideBar-body:hover {
            background-color: #f2f2f2;
        }

        .sideBar-avatar {
            text-align: center;
            padding: 0 !important;
        }

        .avatar-icon img {
            border-radius: 50%;
            height: 49px;
            width: 49px;
        }

        .sideBar-main {
            padding: 0 !important;
        }

        .sideBar-main .row {
            padding: 0 !important;
            margin: 0 !important;
        }

        .sideBar-name {
            padding: 10px !important;
        }

        .name-meta {
            font-size: 100%;
            padding: 1% !important;
            text-align: left;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: #000;
        }

        .sideBar-time {
            padding: 10px !important;
        }

        .time-meta {
            text-align: right;
            font-size: 12px;
            padding: 1% !important;
            color: rgba(0, 0, 0, .4);
            vertical-align: baseline;
        }

        /*New Message*/

        .newMessage {
            padding: 0 !important;
            margin: 0 !important;
            height: 100%;
            position: relative;
            left: -100%;
        }

        .newMessage-heading {
            padding: 10px 16px 10px 15px !important;
            margin: 0 !important;
            height: 100px;
            width: 100%;
            background-color: #00bfa5;
            z-index: 1001;
        }

        .newMessage-main {
            padding: 10px 16px 0 15px !important;
            margin: 0 !important;
            height: 60px;
            margin-top: 30px !important;
            width: 100%;
            z-index: 1001;
            color: #fff;
        }

        .newMessage-title {
            font-size: 18px;
            font-weight: 700;
            padding: 10px 5px !important;
        }

        .newMessage-back {
            text-align: center;
            vertical-align: baseline;
            padding: 12px 5px !important;
            display: block;
            cursor: pointer;
        }

        .newMessage-back i {
            margin: auto !important;
        }

        .composeBox {
            padding: 0 !important;
            margin: 0 !important;
            height: 60px;
            width: 100%;
        }

        .composeBox-inner {
            height: 100%;
            width: 100%;
            padding: 10px !important;
            background-color: #fbfbfb;
        }

        .composeBox-inner input:focus {
            outline: none;
            border: none;
            box-shadow: none;
        }

        .compose-sideBar {
            padding: 0 !important;
            margin: 0 !important;
            background-color: #fff;
            overflow-y: auto;
            border: 1px solid #f7f7f7;
            height: calc(100% - 160px);
        }

        /*Conversation*/

        .conversation {
            padding: 0 !important;
            margin: 0 !important;
            height: 100%;
            /*width: 100%;*/
            border-left: 1px solid rgba(0, 0, 0, .08);
            /*overflow-y: auto;*/
        }

        .message {
            padding: 0 !important;
            margin: 0 !important;

            background-size: cover;
            overflow-y: auto;
            border: 1px solid #f7f7f7;
            height: calc(100% - 120px);
        }

        .message-previous {
            margin: 0 !important;
            padding: 0 !important;
            height: auto;
            width: 100%;
        }

        .previous {
            font-size: 15px;
            text-align: center;
            padding: 10px !important;
            cursor: pointer;
        }

        .previous a {
            text-decoration: none;
            font-weight: 700;
        }

        .message-body {
            margin: 0 !important;
            padding: 0 !important;
            width: auto;
            height: auto;
        }

        .message-main-receiver {
            /*padding: 10px 20px;*/
            max-width: 60%;
        }

        .message-main-sender {
            padding: 3px 20px !important;
            margin-left: 40% !important;
            max-width: 60%;
        }

        .message-text {
            margin: 0 !important;
            padding: 5px !important;
            word-wrap: break-word;
            font-weight: 200;
            font-size: 14px;
            padding-bottom: 0 !important;
        }

        .message-time {
            margin: 0 !important;
            margin-left: 50px !important;
            font-size: 12px;
            text-align: right;
            color: #9a9a9a;

        }

        .receiver {
            width: auto !important;
            padding: 4px 10px 7px !important;
            border-radius: 10px 10px 10px 0;
            background: #ffffff;
            font-size: 12px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
            word-wrap: break-word;
            display: inline-block;
        }

        .sender {
            float: right;
            width: auto !important;
            background: #dcf8c6;
            border-radius: 10px 10px 0 10px;
            padding: 4px 10px 7px !important;
            font-size: 12px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
            display: inline-block;
            word-wrap: break-word;
        }


        /*Reply*/

        .reply {
            height: 60px;
            width: 100%;
            background-color: #f5f1ee;
            padding: 10px 5px 10px 5px !important;
            margin: 0 !important;
            z-index: 1000;
        }

        .reply-emojis {
            padding: 5px !important;
        }

        .reply-emojis i {
            text-align: center;
            padding: 5px 5px 5px 5px !important;
            color: #93918f;
            cursor: pointer;
        }

        .reply-recording {
            padding: 5px !important;
        }

        .reply-recording i {
            text-align: center;
            padding: 5px !important;
            color: #93918f;
            cursor: pointer;
        }

        .reply-send {
            padding: 5px !important;
        }

        .reply-send i {
            text-align: center;
            padding: 5px !important;
            color: #93918f;
            cursor: pointer;
        }

        .reply-main {
            padding: 2px 5px !important;
        }

        .reply-main textarea {
            width: 100%;
            resize: none;
            overflow: hidden;
            padding: 5px !important;
            outline: none;
            border: none;
            text-indent: 5px;
            box-shadow: none;
            height: 100%;
            font-size: 16px;
        }

        .reply-main textarea:focus {
            outline: none;
            border: none;
            text-indent: 5px;
            box-shadow: none;
        }
        /* Hide the delete button by default */
.delete-message-form {
    display: none;
  }

  /* Show the delete button when the user hovers over the message element */
  .message-body:hover .delete-message-form {
    display: inline-block;
  }
/* CSS for hiding the buttons initially */
.message-actions {
    display: none;
}

/* CSS to show the buttons on hover */
.message-body:hover .message-actions {
    display: block;
}
button.liked {
    background-color: #4CAF50; /* Green background for liked messages */
    color: white;
}

button.disliked {
    background-color: #F44336; /* Red background for disliked messages */
    color: white;
}


        @media screen and (max-width: 700px) {
            .app {
                top: 0;
                height: 100%;
            }

            .heading {
                height: 70px;
                background-color: #009688;
            }

            .fa-2x {
                font-size: 2.3em !important;
            }

            .heading-avatar {
                padding: 0 !important;
            }

            .heading-avatar-icon img {
                height: 50px;
                width: 50px;
            }

            .heading-compose {
                padding: 5px !important;
            }

            .heading-compose i {
                color: #fff;
                cursor: pointer;
            }

            .heading-dot {
                padding: 5px !important;
                margin-left: 10px !important;
            }

            .heading-dot i {
                color: #fff;
                cursor: pointer;
            }

            .sideBar {
                height: calc(100% - 130px);
            }

            .sideBar-body {
                height: 80px;
            }

            .sideBar-avatar {
                text-align: left;
                padding: 0 8px !important;
            }

            .avatar-icon img {
                height: 55px;
                width: 55px;
            }

            .sideBar-main {
                padding: 0 !important;
            }

            .sideBar-main .row {
                padding: 0 !important;
                margin: 0 !important;
            }

            .sideBar-name {
                padding: 10px 5px !important;
            }

            .name-meta {
                font-size: 16px;
                padding: 5% !important;
            }

            .sideBar-time {
                padding: 10px !important;
            }

            .time-meta {
                text-align: right;
                font-size: 14px;
                padding: 4% !important;
                color: rgba(0, 0, 0, .4);
                vertical-align: baseline;
            }

            /*Conversation*/
            .conversation {
                padding: 0 !important;
                margin: 0 !important;
                height: 100%;
                /*width: 100%;*/
                border-left: 1px solid rgba(0, 0, 0, .08);
                /*overflow-y: auto;*/
            }

            .message {
                height: calc(100% - 140px);
            }

            .reply {
                height: 70px;
            }

            .reply-emojis {
                padding: 5px 0 !important;
            }

            .reply-emojis i {
                padding: 5px 2px !important;
                font-size: 1.8em !important;
            }

            .reply-main {
                padding: 2px 8px !important;
            }

            .reply-main textarea {
                padding: 8px !important;
                font-size: 18px;
            }

            .reply-recording {
                padding: 5px 0 !important;
            }

            .reply-recording i {
                padding: 5px 0 !important;
                font-size: 1.8em !important;
            }

            .reply-send {
                padding: 5px 0 !important;
            }

            .reply-send i {
                padding: 5px 2px 5px 0 !important;
                font-size: 1.8em !important;
            }

        }
    </style>
</head>

<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="container app">
        <div class="row app-one">
            <div class="col-sm-4 side">
                <div class="side-one">
                    <div class="row heading">
                        <div class="col-sm-3 col-xs-8 heading-avatar">
                            <div class="heading-avatar-icon">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png">

                                <b> {{ Auth::user()->name }} </b>
                                {{ Auth::user()->id }}
                            </div>

                        </div>
                        <div class="col-sm-1 col-xs-1  heading-dot  pull-right">
                            <i class="fa fa-ellipsis-v fa-2x  pull-right" aria-hidden="true"></i>
                        </div>
                        <div class="col-sm-2 col-xs-2 heading-compose  pull-right">
                            <i class="fa fa-comments fa-2x  pull-right" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="row searchBox">
                        <div class="col-sm-12 searchBox-inner">
                            <div class="form-group has-feedback">
                                <input id="searchText" type="text" class="form-control" name="searchText"
                                    placeholder="Search">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row sideBar">

                        {{--
<div class="row sideBar">
    @foreach ($users as $user)
        <div class="row sideBar-body" data-user-id="{{ $user->id }}">
            <div class="col-sm-3 col-xs-3 sideBar-avatar">
            <div class="avatar-icon">
                <img src="https://bootdey.com/img/Content/avatar/avatar1.png">
            </div>
        </div>
        <div class="col-sm-9 col-xs-9 sideBar-main">
            <div class="row">
                <div class="col-sm-8 col-xs-8 sideBar-name">
                    <span class="name-meta">{{ $user->name }}</span>
                </div>
                <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                    <span class="time-meta pull-right">18:18</span>
                </div>
            </div>
        </div>
        </div>
    @endforeach
</div>

<!-- Your contact list in the Blade view -->
<div class="row sideBar">
    @foreach ($users as $user)

        <a href="{{ route('select-contact', ['currentUserId' => Auth::id(), 'selectedUserId' => $user->id]) }}" class="name-meta">
            {{ $user->name }}
        <div class="col-sm-3 col-xs-3 sideBar-avatar">
                <div class="avatar-icon">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png">
                </div>
            </div>
            <div class="col-sm-9 col-xs-9 sideBar-main">
                <div class="row">
                    <div class="col-sm-8 col-xs-8 sideBar-name">
                        <span class="name-meta">{{ $user->name }}</span>
                    </div>
                    <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                        <span class="time-meta pull-right">18:18</span>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
</div>  --}}
                        <div class="row sideBar">
                            @foreach ($users as $user)
                                <div class="row sideBar-body" data-user-id="{{ $user->id }}">
                                    <div class="col-sm-3 col-xs-3 sideBar-avatar">
                                        <div class="avatar-icon">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png">
                                        </div>
                                    </div>
                                    <div class="col-sm-9 col-xs-9 sideBar-main">
                                        <div class="row">
                                            <div class="col-sm-8 col-xs-8 sideBar-name">
                                                <span class="name-meta">{{ $user->name }}</span>
                                                <form action="{{ route('select-contact') }}" method="GET"
                                                    class="select-contact-form" style="display: none;">
                                                    @csrf
                                                    <input type="hidden" name="currentUserId"
                                                        value="{{ Auth::id() }}">
                                                    <input type="hidden" name="selectedUserId"
                                                        value="{{ $user->id }}">
                                                </form>
                                            </div>
                                            <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                                                <span class="time-meta pull-right">18:18</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>







                    </div>
                </div>

            </div>
            <!-- Chat Conversation -->
            <!-- Chat Conversation -->
            <div class="col-sm-8 conversation">
                {{--  <div class="row message" id="conversation">
                    @foreach ($chatMessages as $message)
                        <div class="row message-body">
                            @if ($message->user_id == Auth::id())
                                <div class="col-sm-12 message-main-sender">
                                    <div class="sender">
                                        <div class="message-text">
                                            {{ $message->message_content }}
                                        </div>
                                        <span class="message-time pull-right">
                                            {{ $message->created_at->format('D') }}
                                        </span>
                                    </div>
                                </div>
                            @else
                                <div class="col-sm-12 message-main-receiver">
                                    <div class="receiver">
                                        <div class="message-text">
                                            {{ $message->message_content }}
                                        </div>
                                        <span class="message-time pull-right">
                                            {{ $message->created_at->format('D') }}
                                        </span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>  --}}

                <div class="row message" id="conversation">
                    @foreach ($chatMessages as $message)
                        <div class="row message-body">
                            @if ($message->user_id == Auth::id())
                                <div class="col-sm-12 message-main-sender">
                                    <div class="sender">
                                        <div class="message-text">
                                            {{ $message->message_content }}
                                        </div>
                                        <span class="message-time pull-right">
                                            {{ $message->created_at->format('D') }}
                                        </span>
                                        <form action="{{ route('delete-message', ['message_id' => $message->id]) }}" method="POST" class="delete-message-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <div class="col-sm-12 message-main-receiver">
                                    <div class="receiver">
                                        <div class="message-text">
                                            {{ $message->message_content }}
                                        </div>
                                        <span class="message-time pull-right">
                                            {{ $message->created_at->format('D') }}
                                        </span>
                                        <!-- Add the like and dislike buttons -->
                                        <div class="message-actions">
                                            @if (!$message->isLikedByUser(Auth::id()))
                                                <form action="{{ route('like-message', ['message_id' => $message->id]) }}" method="POST" class="like-message-form">
                                                    @csrf
                                                    <button type="submit" class="btn btn-secondary btn-xs">Like</button>
                                                </form>
                                            @endif

                                            @if (!$message->isDislikedByUser(Auth::id()))
                                                <form action="{{ route('dislike-message', ['message_id' => $message->id]) }}" method="POST" class="dislike-message-form">
                                                    @csrf
                                                    <button type="submit" class="btn btn-secondary btn-xs">Dislike</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>







                <!-- Chat reply section -->
                <div class="row reply">
                    <form action="{{ route('send-message') }}" method="POST">
                        @csrf
                        <div class="col-sm-1 col-xs-1 reply-emojis">
                            <i class="fa fa-smile-o fa-2x"></i>
                        </div>
                        <div class="col-sm-8 col-xs-8 reply-main">
                            <input type="hidden" name="receiver_id" id="receiver_id" value="{{ $selectedUserId }}">
                            <textarea class="form-control" name="message_content" id="message_content" rows="1"
                                placeholder="Type your message here"></textarea>
                        </div>
                        <div class="col-sm-1 col-xs-1 reply-recording">
                            <i class="fa fa-microphone fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="col-sm-1 col-xs-1 reply-send">
                            <button type="submit" class="reply-send-btn">
                                <i class="fa fa-send fa-2x" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="row reply">
                    <div class="col-sm-1 col-xs-1 reply-export">
                        <form action="{{ route('export-message', ['receiver_id' => $selectedUserId]) }}" method="POST">
                            @csrf
                            <button type="submit" class="reply-export-btn">
                                <i class="fa fa-download fa-2x" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                    <div class="col-sm-1 col-xs-1 reply-delete">
                        <form action="{{ route('delete-entire-message', ['receiver_id' => $selectedUserId]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="reply-delete-btn">
                                <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>



            </div>
        </div>
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(function() {
                $(".heading-compose").click(function() {
                    $(".side-two").css({
                        "left": "0"
                    });
                });

                $(".newMessage-back").click(function() {
                    $(".side-two").css({
                        "left": "-100%"
                    });
                });
            })
        </script>


        <script>
            // Function to display a new message in the conversation
            function displayMessage(message, sender, time) {
                const messageContainer = document.getElementById('conversation');

                const messageBody = `
            <div class="row message-body">
                <div class="col-sm-12 message-main-${sender}">
                    <div class="${sender}">
                        <div class="message-text">
                            ${message}
                        </div>
                        <span class="message-time pull-right">
                            ${time}
                        </span>
                    </div>
                </div>
            </div>
        `;

                messageContainer.insertAdjacentHTML('beforeend', messageBody);
            }

            // Function to handle sending a message
        </script>
        <script>
            // Event delegation to handle click event on the contact list
            document.querySelector('.row.sideBar').addEventListener('click', function(event) {
                const clickedRow = event.target.closest('.row.sideBar-body');
                if (clickedRow) {
                    // Get the user ID of the clicked contact
                    const selectedUserId = clickedRow.dataset.userId;

                    // Get the hidden form for the selected contact
                    const form = clickedRow.querySelector('.select-contact-form');

                    // Submit the form to redirect to the API link
                    form.submit();
                }
            });
        </script>


        <!-- Add the following script block to your dashboard.blade.php or a separate JS file -->
        <script>
            // ...

            // Function to load the conversation for the selected user
            function loadConversation(userId) {
                // For demonstration purposes, let's assume the conversation is already loaded in a JavaScript object
                const conversations = {
                    1: [{
                            sender: 'receiver',
                            message: 'Hi, what are you doing?!',
                            time: '18:18'
                        },
                        {
                            sender: 'sender',
                            message: 'I am doing nothing man!',
                            time: '18:19'
                        },
                    ],
                    2: [
                        // Conversation for user with ID 2 (if available)
                    ],
                    // Add other conversations as needed
                };

                // Get the conversation array for the selected user
                const conversation = conversations[userId] || [];

                // Display the conversation in the chat window
                const chatConversation = document.getElementById('conversation');
                chatConversation.innerHTML = ''; // Clear the existing conversation

                conversation.forEach((message) => {
                    const messageRow = `
                <div class="row message-body">
                    <div class="col-sm-12 message-main-${message.sender}">
                        <div class="${message.sender}">
                            <div class="message-text">${message.message}</div>
                            <span class="message-time pull-right">${message.time}</span>
                        </div>
                    </div>
                </div>
            `;
                    chatConversation.innerHTML += messageRow;
                });
            }
        </script>



</body>

</html>
