@component('components.header')
@endcomponent

<body>
  @component('components.menu')
  @endcomponent
  <div class="wrapper_block">
    <form action="/invite_confirm/{{$companion_id}}" method="post">
      @csrf
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
            <input type="date" name="date" class="reserve_date" value="{{old('date') ?? '2022-01-01'}}">
          </td>
        </tr>

        <!--時間-->
        <tr>
          <th>スタート時間</th>
          <td>
            <input type="time" name="start_at" id="start_at" min="6:30" max="15:00" value="{{old('start_at') ?? "08:00"}}">
          </td>
        </tr>
        
        <!--ゴルフ場名-->
        <tr>
          <th>ゴルフ場名</th>
          <td>
            <input type="text" id="golf_course" name="golf_course" placeholder="例）ABCカントリークラブ" value="{{old('golf_course')}}">
          </td>
        </tr>

          <!--男性人数-->
        <tr>
          <th>男性の人数</th>
          <td>
            <input type="number" id="num_of_players_men" name="num_of_players_men" value="{{old('num_of_players_men') ?? '2'}}">名
          </td>
        </tr>

        <!--女性の人数-->
        <tr>
          <th>女性の人数</th>
          <td>
            <input type="number" id="num_of_players_women" name="num_of_players_women" value="{{old('num_of_players_women') ?? '2'}}">名
          </td>
        </tr>
      </table>

      <!--申し込みフォーム-->
      <button class="bigger">確認画面に進む</button>
    </form>
  </div>

</body>