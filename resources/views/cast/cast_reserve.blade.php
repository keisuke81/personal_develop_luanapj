@component('components.header')
@endcomponent

<body>
  @component('components.cast_menu')
  @endcomponent

  <div class="wrapper">
    @if($reserves->isEmpty())
    <p>現在予約成立しているラウンドはありません。</p>
    @else

    @foreach($reserves as $reserve)
    <div class="card">

      <img class="content-img" src={{$reserve->image}} />
      <p>{{$reserve->user_name}}</p>
      <p>{{$reserve->date}}</p>
      <p>スタート時間：{{$reserve->start_at}}</p>
      <p>プレイ人数{{$reserve->num_of_players_men}}</p>
      <p>ゴルフ場：{{$reserve->golf_course}}</p>

      <form action="" method="post"></form>
    </div>
    @endforeach
  </div>
  @endif
</body>