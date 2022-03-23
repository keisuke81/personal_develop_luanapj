@component('components.header')
@endcomponent

<body>
  @component('components.cast_menu')
  @endcomponent
  <div class="type_a">
    <div class="type_a_child">
      <h1 class="h1">プロフィール</h1>
      <table class="table">
        <tr>
          <th>お名前</th>
          <td>
            {{$profile->name}}
          </td>
        </tr>

        <tr>
          <th>ニックネーム</th>
          <td>
            {{$profile->nickname}}
          </td>
        </tr>

        <tr>
          <th>メールアドレス</th>
          <td>
            {{$profile->email}}
          </td>
        </tr>


        <tr>
          <th>誕生日</th>
          <td>
            {{$profile->birthday}}
          </td>
        </tr>

        <tr>
          <th>本人画像</th>
          <td>
            {{$profile->img_url}}
          </td>
        </tr>

        <tr>
          <th>ベストスコア</th>
          <td>
            {{$profile->score}}
          </td>
        </tr>

        <tr>
          <th>自己紹介</th>
          <td>
            {{$profile->self_produce}}
          </td>
        </tr>

        <tr>
          <th>ひとこと</th>
          <td>
            {{$profile->message}}
          </td>
        </tr>
      </table>

      <div>
        <a class="btn" href="/mypage/profile/edit/{{$companion_id}}">プロフィールを更新</a>
      </div>
    </div>
  </div>
</body>