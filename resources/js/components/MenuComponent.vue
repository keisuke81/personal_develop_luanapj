<template>
  <header>
    <h1>
      <img src="https://luanagolfpj.herokuapp.com/images/logo-main.png" alt="LUANA MATCHING">
    </h1>
    <nav class="gnav">
      <ul class="menu">
        <li><a href="/search_cast">ラウンドに誘う</a></li>
        <li><a href="/followed">Likeされている</a></li>
        <li><a href="/each_follow">チャット</a></li>
        <li><a href="/mypage">マイページ</a></li>
      </ul>
    </nav>
  </header>
</template>

<script>
export default {
  props:["user_id"]
}
</script>
