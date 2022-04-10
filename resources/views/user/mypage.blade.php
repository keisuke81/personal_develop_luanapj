@component('components.header')
@endcomponent
@component('components.tabbar')
@endcomponent

<body>
  @component('components.menu')
  @endcomponent
  <div id="app">
    <mypage-component>
    </mypage-component>
  </div>
  @component('components.footer')
  @endcomponent
</body>