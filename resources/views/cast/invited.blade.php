@component('components.header')
@endcomponent

<body>
  @component('components.cast_menu')
  @endcomponent

  <div class="wrapper">

    @foreach($invites as $invite)
    <div class="card">

      <img class="content-img" src={{$invite->image}} />
      <p class="name_font">{{$invite->nickname}}</p>
      <p>{{$invite->date}}</p>
      <p>スタート時間：{{$invite->start_at}}</p>
      <p>プレイ人数{{$invite->num_of_players}}</p>
      <p>男性レベル{{$invite->mens_level_name}}</p>
      <p>ゴルフ場：{{$invite->golf_course}}</p>
      <div>
        <p class="age_font">{{$item->age}}歳</p>
      </div>
    </div>
    @endforeach
  </div>
</body>