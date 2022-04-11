<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
  <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
  <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>
  @if(app('env')=='local')
  <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
  <link href="{{asset('css/general.css')}}" rel="stylesheet">
  @endif
  @if(app('env')=='production')
  <link href="{{secure_asset('css/reset.css')}}" rel="stylesheet">
  <link href="{{secure_asset('css/general.css')}}" rel="stylesheet">
  @endif
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/vegas.min.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="{{ mix('js/app.js') }}" defer></script>
  <script>
    (function(d) {
      var config = {
          kitId: 'kpy1lor',
          scriptTimeout: 3000,
          async: true
        },
        h = d.documentElement,
        t = setTimeout(function() {
          h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
        }, config.scriptTimeout),
        tk = d.createElement("script"),
        f = false,
        s = d.getElementsByTagName("script")[0],
        a;
      h.className += " wf-loading";
      tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
      tk.async = true;
      tk.onload = tk.onreadystatechange = function() {
        a = this.readyState;
        if (f || a && a != "complete" && a != "loaded") return;
        f = true;
        clearTimeout(t);
        try {
          Typekit.load(config)
        } catch (e) {}
      };
      s.parentNode.insertBefore(tk, s)
    })(document);
  </script>
  <script src="/path/to/vue.js"></script>
  <script src="/path/to/vue-router.js"></script>
</head>