@component('components.header')
@endcomponent

<body>
  @component('components.cast_menu')
  @endcomponent
  <div>
    <a class="btn_small" href="/search_user">戻る</a>
  </div>
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
        @if($item->is_appealed_by_auth_user())
        <a href="{{ route('CastnoFollow', ['id' => $item->id]) }}" class="btn black">Like解除</a>
        @else
        <a href="{{ route('CastgetFollow', ['id' => $item->id]) }}" class="btn white">Likeする</a>
        @endif
      </div>

      <div class="hidden chat">
        <a class="btn" href="/invite_page/{{$item->id}}">お誘いする</a>
      </div>
    </div>
  </div>

</body>