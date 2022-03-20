@component('components.header')
@endcomponent

<body>
  @component('components.menu',['user_id' => $user_id])
  @endcomponent
  <div class="type_a">
    <div class="type_a_child">
      <div>
        会員番号：{{$user_id}}
      </div>
      <div>
        <a class="btn" href="/mypage/offer_content/{{$user_id}}">募集している内容を確認する</a>
      </div>

      <div>
        <a class="btn" href="/mypage/reserve_content/{{$user_id}}">予約内容を確認する</a>
      </div>

      <div>
        <a class="btn" href="/chat_select">チャット</a>
      </div>

      <div>
        <a class="btn" href="/mypage/profile/{{$user_id}}">登録情報内容を確認する</a>
      </div>

      <div>
        <a href="/logout_page" class="btn">ログアウト</a>
      </div>
    </div>
  </div>
</body>