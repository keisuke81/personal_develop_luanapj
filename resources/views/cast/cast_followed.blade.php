@component('components.header')
@endcomponent

<body>
  @component('components.cast_menu')
  @endcomponent

  <div class="wrapper">
    @if($users === null)
    <p>まだフォロワーがいません。自分からLikeしてみよう！</p>
    @else
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($items as $item)
        <tr>
          <th>{{$loop->iteration}}</th>
          <td>{{$item->nickname}}</td>

        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</body>