@component('components.header')
@endcomponent

<body>
  @component('components.cast_menu')
  @endcomponent

  <div class="wrapper">

    <form action="/invited/{{$invite->id}}/reject/done" method="post">
      @csrf
      <div class="card">

        <img class="content-img" src={{$invite->image}} />

        <input type="hidden" name="offer_id" value="{{$offer_id}}">

        <p>{{$invite->nickname}}</p>
        <p>{{$invite->date}}</p>
        <p>スタート時間：{{$invite->start_at}}</p>
        <p>プレイ人数{{$invite->num_of_players_men}}</p>
        <p>ゴルフ場：{{$invite->golf_course}}</p>

        <button>お誘いを断る</button>
      </div>
  </div>
</body>