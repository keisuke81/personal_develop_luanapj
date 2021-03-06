@component('components.header')
@endcomponent

<body>
  @component('components.cast_menu')
  @endcomponent

  <div class="wrapper">

    @foreach($invites as $invite)
    <div class="card">

      <img class="content-img" src={{$invite->image}} />
      <p>{{$invite->nickname}}</p>
      <p>{{$invite->date}}</p>
      <p>スタート時間：{{$invite->start_at}}</p>
      <p>プレイ人数{{$invite->num_of_players}}</p>
      <p>ゴルフ場：{{$invite->golf_course}}</p>

      <a href="/invited/{{$invite->id}}/accept" class="btn">お誘いを受ける</a>
      <a href="/invited/{{$invite->id}}/reject" class="btn">ごめんなさい・・</a>
    </div>
    @endforeach
  </div>
</body>