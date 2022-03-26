
  @component('components.header')
  @endcomponent

<body>
  @component('components.menu')
  @endcomponent
  <div class="wrapper">
    <div class="hidden">
      {{$user_id}}
    </div>
    <div>
      <a class="btn" href="/search_cast">相手を探す</a>
    </div>
    <div>
      <a class="btn" href="/search_date">日程から探す</a>
    </div>
  </div>
</body>