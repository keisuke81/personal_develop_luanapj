@component('components.header')
@endcomponent

<body>
  @component('components.tabbar')
  @endcomponent
  @component('components.menu')
  @endcomponent
  <div id="app">
    <mypage-component>
    </mypage-component>
  </div>
  @component('components.footer')
  @endcomponent
</body>