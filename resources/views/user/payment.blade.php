@component('components.header')
@endcomponent

<body>
  @component('components.menu')
  @endcomponent
  <div class="card-body">
    <form action="{{route('storePayment')}}" class="card-form" id="form_payment" method="POST">
      @csrf
      <div class="form-group">
        <label for="cardNumber">カード番号</label>
        <input id="cardNumber">
      </div>

      <div class="form-group">
        <label for="name">セキュリティコード</label>
        <input id="securityCode">
      </div>

      <div class="form-group">
        <label for="name">有効期限</label>
        <input id="expiration">
      </div>

      <div class="form-group">
        <label for="name">カード名義</label>
        <input type="text" name="cardName" id="cardName" class="form-control" value="" placeholder="カード名義を入力">
      </div>
      <div class="form-group">
        <button type="submit" id="create_token" class="btn btn-primary">カードを登録する</button>
      </div>
    </form>
    <a href="{{route('getCurrentPayment')}}">クレジットカード情報ページに戻る</a>
  </div>

</body>