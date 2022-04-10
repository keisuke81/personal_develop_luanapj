@component('components.header')
@endcomponent

<body>
  <div id="app">
    <mypage-component v-bind:user_id='{{$user_id}}'>
    </mypage-component>
  @component('components.footer')
  @endcomponent
  </div>
</body>