@component('components.header')
@endcomponent

<body>
  @component('components.menu')
  @endcomponent

  <div class="wrapper">
    <h1 class="h1">応募内容内容確認</h1>
    <!--フォーム開始-->
    <form action="/invite_done/{{$companion_id}}" method="post">
      @csrf
      <table class="table offer_table">
        <table class="table">
          <!--ユーザーID-->
          <tr class="hidden">
            <th>ユーザーID</th>
            <td>
              {{$user_id}}
            </td>
          </tr>
          <!--コンパニオンID-->
          <tr class="hidden">
            <th>コンパニオンID</th>
            <td>
              {{$companion_id}}
            </td>
          </tr>
          <!--日にち-->
          <tr>
            <th>日にち</th>
            <td>
              <input type="hidden" name="date" value="{{$inputs['date']}}">
              {{$inputs['date']}}
            </td>
          </tr>

          <!--時間-->
          <tr>
            <th>スタート時間</th>
            <td>
              <input type="hidden" name="start_at" value="{{$inputs['start_at']}}">
              {{$inputs['start_at']}}
            </td>
          </tr>

          <!--ゴルフ場名-->
          <tr>
            <th>ゴルフ場名</th>
            <td>
              <input type="hidden" id="golf_course" name="golf_course" value="{{$inputs['golf_course']}}">
              {{$inputs['golf_course']}}
            </td>
          </tr>

          <!--男性人数-->
          <tr>
            <th>男性の人数</th>
            <td>
              <input type="hidden" name="num_of_players_men" value="{{$inputs['num_of_players_men']}}">
              {{$inputs['num_of_players_men']}}名
            </td>
          </tr>

          <!--女性の人数-->
          <tr>
            <th>女性の人数</th>
            <td>
              <input type="hidden" name="num_of_players_women" value="{{$inputs['num_of_players_women']}}">
              {{$inputs['num_of_players_women']}}名
            </td>
          </tr>

        <!--申し込みフォーム-->
        <button name="back" value="true" class="bigger">内容を修正する</button>
        <button name="offer" value="ture" class="bigger">送信する</button>
    </form>
  </div>

</body>