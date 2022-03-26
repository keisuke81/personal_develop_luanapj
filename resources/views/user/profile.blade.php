@component('components.header')
@endcomponent

<body>
  @component('components.menu',['user_id' => $user_id])
  @endcomponent
  <div class="type_a">
    <div class="type_a_child">
      <h1 class="h1">プロフィール</h1>
      <div class="img">
        <img src="{{ asset('storage/public/' . $profile->img_url) }}" />
      </div>
      <table class="table">
        <div class="hidden">{{$user_id}}</div>
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
        <a class="btn" href="/mypage/profile/edit/{{$user_id}}">プロフィールを更新</a>
      </div>
    </div>
  </div>
</body>