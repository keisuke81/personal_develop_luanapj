<body>
    <div>

        @auth
        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
        @endauth

        <a href="{{route('linelogin.man')}}">男性の方用（LINEログイン）</a>

        <a href="{{route('linelogin.woman')}}"></a>

    </div>

</body>