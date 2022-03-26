@component('components.header')
@endcomponent

<body>
  @component('components.menu')
  @endcomponent

  <div class="wrapper">

    @foreach($reserves as $reserve)
    <div class="card">

      <img class="content-img" src={{$item->image}} />
      <p>{{$item->companion_name}}</p>
      <p>{{$item->date}}</p>
      <p>スタート時間：{{$item->start_at}}</p>
      <p>プレイ人数{{$item->num_of_players_men}}</p>
      <p>ゴルフ場：{{$item->golf_course}}</p>
    </div>
    @endforeach
  </div>
</body>