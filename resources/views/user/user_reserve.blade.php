@component('components.header')
@endcomponent

<body>
  @component('components.menu')
  @endcomponent

  <div class="wrapper">

    @empty($reserves)
    <p>現在予約成立のラウンドはありません。</p>
    @else

    @foreach($reserves as $reserve)
    <div class="card">

      <img class="content-img" src={{$reserve->image}} />
      <p>{{$reserve->companion_name}}</p>
      <p>{{$reserve->date}}</p>
      <p>スタート時間：{{$reserve->start_at}}</p>
      <p>プレイ人数{{$reserve->num_of_players_men}}</p>
      <p>ゴルフ場：{{$reserve->golf_course}}</p>
      <div>
        <form action="/reserve_delete/{{$reserve->id}}" method="post">
          <button class="btn_small">予約を削除する</button>
          @csrf
        </form>
      </div>
    </div>
    @endforeach
  </div>
  @endempty
</body>