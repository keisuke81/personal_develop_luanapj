@component('components.header')
@endcomponent

<body>
  @component('components.cast_menu')
  @endcomponent
  <a class="btn_small" href="/cast_mypage/{{$companion_id}}">マイページに戻る</a>

  <form action="/cast_profile_update" method="post" enctype="multipart/form-data">
    @csrf
    <table class="table">
      <tr class="hidden">
        <th>id</th>
        <td>
          <input type="hidden" name="id" value="{{$profile->id}}">
        </td>
      </tr>
      <tr>
        <th>お名前（※相手に表示されません）</th>
        <td>
          {{$profile->name}}
        </td>
      </tr>

      <tr>
        <th>ニックネーム</th>
        <td>
          <input type="text" name="nickname" value="{{$profile->nickname}}">
        </td>
      </tr>

      <tr>
        <th>メールアドレス</th>
        <td>
          <input type="text" name="email" value="{{$profile->email}}">
        </td>
      </tr>


      <tr>
        <th>誕生日</th>
        <td>
          <input type="date" name="birthday" id="" value="{{$profile->birthday}}">
        </td>
      </tr>

      <tr>
        <th>本人画像</th>
        <td>
          <input type="file" name="img_url" value="{{$profile->img_url}}">
        </td>
      </tr>

      <tr>
        <th>ベストスコア</th>
        <td>
          <input type="text" name="score" value="{{$profile->score}}">
        </td>
      </tr>

      <tr>
        <th>自己紹介</th>
        <td>
          <textarea name="self_produce" cols="30" rows="10">{{$profile->self_produce}}</textarea>
        </td>
      </tr>

      <tr>
        <th>ひとこと</th>
        <td>
          <textarea name="message" cols="30" rows="2">{{$profile->message}}</textarea>
        </td>
      </tr>
    </table>

    <button>更新する</button>
  </form>


</body>