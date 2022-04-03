@component('components.header')
@endcomponent

<body>
  @component('components.menu')
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
        @foreach($items as $item)
        <tr>
          <th>{{$loop->iteration}}</th>
          <td>{{$item->nickname ?? "未設定"}}</td>

          <td>
            <a href="/cast_profile/{{$item->id}}" class="btn_small">
              プロフィールを見る
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</body>