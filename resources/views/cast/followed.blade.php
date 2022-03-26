@component('components.header')
@endcomponent

<body>
  @component('components.cast_menu')
  @endcomponent
  <div class="wrapper">
    <table class="table">
      @if($follows = null)
      <p>まだフォロワーがいません。自分からふぉろーしてみよう！</p>
      @endif
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($follows as $follow)
        <tr>
          <th>{{$loop->iteration}}</th>
          <td>{{$follow->nickname}}</td>
          <td><a href="/cast_chat/{{$follow->user_id}}"><button type="button" class="btn btn-primary">Chat</button></a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>