@component('components.header')
@endcomponent

<body>
  <div :id="app">
    <mypage-component v-bind:user_id="$user_id">
    </mypage-component>
  </div>
  @component('components.footer')
  @endcomponent
</body>