@component('components.header')
@endcomponent

<body>
  @component('components.cast_menu')
  @endcomponent

  <div class="wrapper">

  <form action="/invited/{{$invite->id}}/accept/done" method="post">
    @csrf
    <div class="card">

      <img class="content-img" src={{$invite->image}} />

      <input type="hidden" name="user_id" value="{{$invite->user_id}}">
      <input type="hidden" name="companion_id" value="{{$invite->companion_id}}">
      <input type="hidden" name="date" value="{{$invite->date}}">
      <input type="hidden" name="start_at" value="{{$invite->start_at}}">
      <input type="hidden" name="num_of_players" value="{{$invite->num_of_players}}">
      <input type="hidden" name="mens_level_id" value="{{$invite->menslevel_id}}">
      <input type="hidden" name="golf_course" value="{{$invite->golf_course}}">
      <p>{{$invite->nickname}}</p>
      <p>{{$invite->date}}</p>
      <p>スタート時間：{{$invite->start_at}}</p>
      <p>プレイ人数{{$invite->num_of_players}}</p>
      <p>男性レベル{{$invite->mens_level_name}}</p>
      <p>ゴルフ場：{{$invite->golf_course}}</p>

      <button>予約を確定する</button>
    </div>
  </div>
</body>