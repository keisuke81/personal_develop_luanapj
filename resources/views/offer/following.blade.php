@component('components.header')
@endcomponent

<body>
  @component('components.menu')
  @endcomponent
  <div class="wrapper">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <th>{{$loop->iteration}}</th>
          <td>{{$user->nickname}}</td>
          <td><a href="/chat/{{$user->companion_id}}"><button type="button" class="btn btn-primary">Chat</button></a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>