@component('components.header')
@endcomponent

<body>
  @component('components.cast_menu')
  @endcomponent

  <div class="wrapper">

    @foreach($reserves as $reserve)
    @empty($reserves)
    <p>現在予約成立しているラウンドはありません。</p>
    @else
    <div class="card">

      <img class="content-img" src={{$item->image}} />
      <p>{{$reserve->user_name}}</p>
      <p>{{$reserve->date}}</p>
      <p>スタート時間：{{$reserve->start_at}}</p>
      <p>プレイ人数{{$reserve->num_of_players_men}}</p>
      <p>ゴルフ場：{{$reserve->golf_course}}</p>

      <form action="" method="post"></form>
    </div>
    @endempty
    @endforeach
  </div>
</body>