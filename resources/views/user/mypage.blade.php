@component('components.header')
@endcomponent

<body>
<ons-page>
  <ons-tabbar swipeable position="auto">
  @component('components.tabbar')
  @endcomponent
  </ons-tabbar>
  @component('components.menu')
  @endcomponent
  <div class="type_a">
    <div class="type_a_child">
      <div class="text-center">
        <p>会員番号：{{$user_id}}</p>
      </div>
      <div>
        <a class="btn" href="{{route('GetUserReserve')}}">今後のラウンド予定</a>
      </div>

      <div>
        <a class="btn" href="/payment">クレジットカード情報</a>
      </div>

      <div>
        <a class="btn" href="/mypage/receipt">ラウンド履歴</a>
      </div>

      <div>
        <a class="btn" href="/mypage/profile/{{$user_id}}">登録情報内容を確認する</a>
      </div>

      <div>
        <a href="/mypage/driver_license" class="btn">運転免許証の提出</a>
      </div>

      <div>
        <a href="/logout" class="btn">ログアウト</a>
      </div>
    </div>
  </div>

</ons-page>
  @component('components.footer')
  @endcomponent
</body>