@component('components.header')
@endcomponent

<body>
  @component('components.menu',['user_id' => $user_id])
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
        <!--エリア-->
        <tr>
          <th>ゴルフ場エリア</th>
          <td>
            <select name="area_id" id="area_id">
              <option value="0" @if(old('area_id')=='0' ) selected @endif>未定</option>
              <option value="1" selected @if(old('area_id')=='1' ) selected @endif>東京</option>
              <option value="2" @if(old('area_id')=='2' ) selected @endif>神奈川</option>
              <option value="3" @if(old('area_id')=='3' ) selected @endif>埼玉</option>
              <option value="4" @if(old('area_id')=='4' ) selected @endif>千葉</option>
              <option value="5" @if(old('area_id')=='5' ) selected @endif>群馬</option>
              <option value="6" @if(old('area_id')=='6' ) selected @endif>栃木</option>
              <option value="7" @if(old('area_id')=='7' ) selected @endif>茨城</option>
              <option value="8" @if(old('area_id')=='8' ) selected @endif>静岡</option>
            </select>
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