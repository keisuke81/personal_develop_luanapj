<template>
        <section id="main" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000" data-wrap="false" data-pause="false">
        <div class="container-fluid">
          <div class="row carousel-inner">
            <div class="pr col-12 carousel-item active">
              <div class="spbox d-block d-sm-none text-center">
                <div class="h1">
                  <img loading="lazy" src="{{ asset('images/logo-app.png') }}" alt="ルアナ アテンドゴルフ | 三重県を中心としたゴルフコンパニオンサービス" class="lazyload">
                </div>
                <h2><strong>あなたの求める魅力的な女性と<br>楽しくゴルフをしませんか？</strong><br>大切な方との接待や、仲間とのエンジョイゴルフを<br>彩り豊かにするためにルアナはお手伝い致します</h2>
          @auth
          <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
          @endauth
          <div class="btnset">
          <a class="btn btn-border-shadow btn-border-shadow--radius" href="{{ url('/cast') }}">女性ログイン</a>
          <a class="btn btn-border-shadow btn-border-shadow--radius" href="{{ url('/user') }}">男性ログイン</a>
          </div>

              </div>
            </div>
          </div>
        </div>
      </section>
</template>