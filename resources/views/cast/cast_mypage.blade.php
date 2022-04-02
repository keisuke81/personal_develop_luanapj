@component('components.header')
@endcomponent

<body>
  @component('components.cast_menu')
  @endcomponent
  <div class="type_a">
    <div class="type_a_child">
      <div>
        会員番号：{{$companion_id}}
      </div>
      <div>
        <a class="btn" href="/cast_mypage/reserve_round">今後のラウンド予定</a>
      </div>

      <div>
        <a class="btn" href="/cast_mypage/creditcard">クレジットカード情報</a>
      </div>

      <div>
        <a class="btn" href="/cast_mypage/receipt">ラウンド履歴・領収書発行</a>
      </div>

      <div>
        <a class="btn" href="/cast_mypage/profile/{{$companion_id}}">登録情報内容を確認する</a>
      </div>

      <div>
        <a href="/cast_mypage/driver_license" class="btn">運転免許証の提出</a>
      </div>

      <div>
        <a href="/logout" class="btn">ログアウト</a>
      </div>
    </div>
  </div>
</body>