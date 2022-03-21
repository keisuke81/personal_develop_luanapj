<body>
    <div>

        @auth
        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
        @endauth

        <a href="{{route('linelogin')}}">男性の方は用（LINEログイン）</a>

    </div>

</body>