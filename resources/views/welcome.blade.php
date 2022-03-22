<body>
    <div>

        @auth
        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
        @endauth

        <a href="{{route('linelogin')}}">男性の方用（LINEログイン）</a>

        <a href="{{route('companion.linelogin')}}">女性の方（LINEログイン）</a>

    </div>

</body>