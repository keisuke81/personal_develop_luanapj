@component('components.header')
@endcomponent

<body>
  @component('components.cast_menu')
  @endcomponent

  <div class="wrapper">
    @if($each_follows === null)
    <p>まだ茶と可能な相手がいません。自分からLikeしてみよう！</p>
    @else
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($each_follows as $each_follow)
        <tr>
          <th>{{$loop->iteration}}</th>
          <td>{{$each_follow->nickname ?? "未設定"}}</td>
          <td>
            <a href="/chat/{{$each_follow->user_id}}">チャットする</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</body>