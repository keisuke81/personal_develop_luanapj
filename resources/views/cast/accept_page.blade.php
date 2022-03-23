@component('components.header')
@endcomponent

<body>
  @component('components.cast_menu')
  @endcomponent

  <div class="wrapper">

    <div class="card">

      <img class="content-img" src={{$invite->image}} />
      <p>{{$invite->nickname}}</p>
      <p>{{$invite->date}}</p>
      <p>スタート時間：{{$invite->start_at}}</p>
      <p>プレイ人数{{$invite->num_of_players}}</p>
      <p>男性レベル{{$invite->mens_level_name}}</p>
      <p>ゴルフ場：{{$invite->golf_course}}</p>

      <a href="/invited/{{$invite->id}}/accept/done" class="btn">予約を確定する</a>
    </div>
  </div>
</body>