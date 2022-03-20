@component('components.header')
@endcomponent

<body>
  @component('components.menu',['user_id' => $user_id])
  @endcomponent
  <div>
    <a class="btn_small" href="/search_cast">戻る</a>
  </div>
  <div class="hidden">会員番号：{{$user_id}}</div>
  <div class="type_a">
    <div class="type_a_child">
      <div class="card_detail">
        <img class="content-img" src="{{$item->img_url}}">

        <div>
          <p class="name_font">{{$item->nickname}}</p>
        </div>
        <div>
          <p class="age_font">{{$item->age}}歳</p>
        </div>
        <div>
          <p class="score_font">ベストスコア：{{$item->score}}</p>
        </div>
      </div>

      <div class="follows">
        @if($item->is_followed_by_auth_user())
        <a href="{{ route('noFollow', ['id' => $item->id]) }}" class="btn black">フォロー解除</a>
        @else
        <a href="{{ route('getFollow', ['id' => $item->id]) }}" class="btn white">フォローする</a>
        @endif
      </div>

      <div class="chat">
        <a class="btn" href="/invite_page/{{$item->id}}">お誘いする</a>
      </div>
    </div>
  </div>

</body>