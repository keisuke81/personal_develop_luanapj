@component('components.header')
@endcomponent

<body>
  @component('components.cast_menu')
  @endcomponent

  <div class="wrapper">
    @if($items === null)
    <p>まだフォロワーがいません。自分からLikeしてみよう！</p>
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
        @foreach($users as $user)
        <tr>
          <th>{{$loop->iteration}}</th>
          <td>{{$user>nickname}}</td>
          <div class="follows">
            @if($user->is_appealed_by_auth_user())
            <a href="{{ route('CastnoFollow', ['id' => $user->id]) }}" class="btn black">Like解除</a>
            @else
            <a href="{{ route('CastgetFollow', ['id' => $user->id]) }}" class="btn white">Likeする</a>
            @endif
          </div>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</body>