@component('components.header')
@endcomponent

<body>
  <div id="app">
    <menu-component>
    </menu-component>

    <tabbar-component>
    </tabbar-component>
    
    <mypage-component :user_id = "{{$user_id}}">
    </mypage-component>

    <profile-component :user_id = "{{$user_id}}" :profile = "{{$profile}}"></profile-component>
  </div>
  @component('components.footer')
  @endcomponent
</body>