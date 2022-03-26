@component('components.header')
@endcomponent

<body>
  @component('components.menu')
  @endcomponent
  <a class="btn_small" href="/mypage/{{$user_id}}">マイページに戻る</a>
  <div class="hidden">{{$user_id}}</div>

  <form action="/image_upload" class="profile_image" enctype="multipart/form-data" method="post">
  @csrf
    <div class="img">
      <input type="file" name="img_url" id="" value="{{$profile->img_url}}">
    </div>
    <button class="btn">画像更新する</button>
  </form>

  <form action="/profile_update" method="post">
    @csrf
    <table class="table">
      <tr class="hidden">
        <th>id</th>
        <td>
          <input type="hidden" name="id" value="{{$profile->id}}">
        </td>
      </tr>
      <tr>
        <th>お名前</th>
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
          <input type="date" name="" id="" vasue="{{$profile->birthday}}">
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