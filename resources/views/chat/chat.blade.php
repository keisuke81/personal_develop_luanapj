@component('components.header')
@endcomponent


<body onload="init()" onunload="init2()">

  @component('components.menu',['user_id' => $user_id])
  @endcomponent
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
      </div>
    </div>

    {{-- チャットルーム  --}}
    <div id="room">
      @foreach($messages as $key => $message)
      {{-- 送信したメッセージ  --}}
      @if($message->send == \Illuminate\Support\Facades\Auth::id())
      <div class="balloon01">
        <div class="icon01"></div>
        <div class="send">
          <p>{{$message->message}}</p>
        </div>
      </div>
      @endif

      {{-- 受信したメッセージ  --}}
      @if($message->recieve == \Illuminate\Support\Facades\Auth::id())
      <div class="icon02"></div>
      <div class="recieve" style="text-align: left">
        <p>{{$message->message}}</p>
      </div>
      @endif
      @endforeach
    </div>

    <form action="/chat/send" method="post">
      @csrf
      <textarea name="message" id="text" style="width:100%"></textarea>

      <input type="hidden" name="send" value="{{$param['send']}}">
      <input type="hidden" name="recieve" value="{{$param['recieve']}}">
      <input type="hidden" name="login" value="{{\Illuminate\Support\Facades\Auth::id()}}">
      <button>送信</button>
    </form>


  </div>

  <script type="text/javascript">
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('7ca37ebeaab4961cafc1', {
      cluster: 'ap3',
      encrypted: true
    });

    //購読するチャンネルを指定//
    var pusherChannel = pusher.subscribe('chat');

    //イベントを受信したら、下記処理//
    pusherChannel.bind('chat_event', function(data) {
      let appendText;
      let login = $('input[name="login"]').val();

      if (data.send === login) {
        appendText = '<div class="send" style="text-align:right"><p>' + data.message + '</p></div>';
      } else if (data.recieve === login) {
        appendText = '<div class="recieve" style="text-align:left"><p>' + data.message + '</p></div>';
      } else {
        return false;
      }

      // メッセージを表示
      $("#room").append(appendText);

      if (data.recieve === login) {
        // ブラウザへプッシュ通知
        Push.create("新着メッセージ", {
          body: data.message,
          timeout: 8000,
          onClick: function() {
            window.focus();
            this.close();
          }
        })

      }
    });

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('[name="csrf-token"]').attr('content'),
      }
    });

    // メッセージ送信
    $("#btn_send").on('click', function() {
      $.ajax({
        type: 'POST',
        url: '/chat/send',
        data: {
          message: $('textarea[name="message"]').val(),
          send: $('input[name="send"]').val(),
          recieve: $('input[name="recieve"]').val(),
        }

      }).done(function(result) {
        $('textarea[name="message"]').val('');
      }).fail(function(result) {

      });
    });

    //テキストエリアを空白にする//
    function init() {
      // 実行したい処理
      $('textarea[name="message"]').val("");
    };

    function init2() {
      // 実行したい処理
      $('textarea[name="message"]').val("");
    };
  </script>
</body>