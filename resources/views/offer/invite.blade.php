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

        @if($errors->has('date'))
        <tr>
          <th></th>
          <td>
            <p class="error">※入力必須です。</p>
          </td>
        </tr>
        @endif

        <!--時間-->
        <tr>
          <th>スタート時間</th>
          <td>
            <input type="time" name="start_at" id="start_at" min="6:30" max="15:00" value="{{old('start_at') ?? "08:00"}}">
          </td>
        </tr>

        @if($errors->has('start_at'))
        <tr>
          <th></th>
          <td>
            <p class="error">※入力必須です。</p>
          </td>
        </tr>
        @endif
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
        @if($errors->has('area_id'))
        <tr>
          <th></th>
          <td>
            <p class="error">※入力必須です。</p>
          </td>
        </tr>
        @endif

        <!--ゴルフ場名-->
        <tr>
          <th>ゴルフ場名</th>
          <td>
            <input type="text" id="golf_course" name="golf_course" placeholder="例）ABCカントリークラブ" value="{{old('golf_course')}}">
          </td>
        </tr>
        @if($errors->has('golf_course'))
        <tr>
          <th></th>
          <td>
            <p class="error">※入力必須です。未定の場合は「未定」と記載ください。</p>
          </td>
          @endif


          <!--男性人数-->
        <tr>
          <th>男性の人数</th>
          <td>
            <input type="number" id="num_of_players_men" name="num_of_players_men" value="{{old('num_of_players_men') ?? '2'}}">名
          </td>
        </tr>

        @if($errors->has('num_of_players_men'))
        <tr>
          <th></th>
          <td>
            <p class="error">※入力必須です。</p>
          </td>
        </tr>
        @endif

        <!--女性の人数-->
        <tr>
          <th>女性の人数</th>
          <td>
            <input type="number" id="num_of_players_women" name="num_of_players_women" value="{{old('num_of_players_women') ?? '2'}}">名
          </td>
        </tr>

        @if($errors->has('num_of_players_women'))
        <tr>
          <th></th>
          <td>
            <p class="error">※入力必須です。</p>
          </td>
        </tr>
        @endif

        <!--求めるレベル-->
        <tr>
          <th>求めるレベル</th>
          <td>
            <select name="required_level_id" id="required_level_id">
              <option value="1" @if(old('required_level_id')=='1' ) selected @endif>初級（120以上）</option>
              <option value="2" @if(old('required_level_id')=='2' ) selected @endif>中級（100~119）</option>
              <option value="3" @if(old('required_level_id')=='3' ) selected @endif>上級（99以下）</option>
              <option value="4" @if(old('required_level_id')=='4' ) selected @endif>超上級（80以下）</option>
              <option value="5" @if(old('required_level_id')=='5' ) selected @endif>特に指定なし</option>
            </select>
          </td>
        </tr>
        @if($errors->has('required_level_id'))
        <tr>
          <th></th>
          <td>
            <p class="error">※入力必須です。</p>
          </td>
        </tr>
        @endif

        <!--オファーするユーザー名-->
        <input type="hidden" name="user_id" id="user_id" value={{$user_id}}>
        <!--オファーするユーザーの年齢-->
        <input type="hidden" name="age" id="age" value=>
      </table>

      <!--申し込みフォーム-->
      <button class="bigger">確認画面に進む</button>
    </form>
  </div>

</body>

<script>
  let date = document.getElementById('today');
  let output_date = document.getElementById('output_date');
  let time = document.getElementById('time');
  let output_time = document.getElementById('output_time');
  let number = document.getElementById('num_of_users');
  let output_number = document.getElementById('output_number');
  timestamp = 0;

  function update() {
    timestamp++;
    window.requestAnimationFrame(update);
    if (timestamp % 10 == 0) {
      output_date.innerHTML = date.value;
      output_time.innerHTML = time.value;
      output_number.innerHTML = number.value;
    }
  }
  update();
  window.onload = function() {
    //今日の日時を表示
    var date = new Date()
    var year = date.getFullYear()
    var month = date.getMonth() + 1
    var day = date.getDate()
    var toTwoDigits = function(num, digit) {
      num += ''
      if (num.length < digit) {
        num = '0' + num
      }
      return num
    }
    var yyyy = toTwoDigits(year, 4)
    var mm = toTwoDigits(month, 2)
    var dd = toTwoDigits(day, 2)
    var ymd = yyyy + "-" + mm + "-" + dd;
    document.getElementById("today").value = ymd;
  }
</script>