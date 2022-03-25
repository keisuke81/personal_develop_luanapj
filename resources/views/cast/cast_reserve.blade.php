@component('components.header')
@endcomponent

<body>
  @component('components.cast_menu')
  @endcomponent

  <div class="wrapper">

    @foreach($reserves as $reserve)
    <div class="card">

      <img class="content-img" src={{$reserve->image}} />
      <p>{{$reserve->nickname}}</p>
      <p>{{$reserve->date}}</p>
      <p>スタート時間：{{$reserve->start_at}}</p>
      <p>プレイ人数{{$reserve->num_of_players}}</p>
      <p>ゴルフ場：{{$reserve->golf_course}}</p>
    </div>
    @endforeach
  </div>
</body>