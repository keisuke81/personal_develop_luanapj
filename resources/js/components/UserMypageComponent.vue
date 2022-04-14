<template>
  <ons-page>
    <div class="type_a">
      <div class="type_a_child">
        <div class="text-center">
          <p>会員番号：{{user_id}}</p>
        </div>
        <div>
          <a class="btn" href="/mypage/user_reserve_round">今後のラウンド予定</a>
        </div>

        <div>
          <a class="btn" href="/payment">クレジットカード情報</a>
        </div>

        <div>
          <a class="btn" href="/mypage/receipt">ラウンド履歴</a>
        </div>

        <div>
          <router-link to="/profile">プロフィール</router-link>
        </div>

        <div>
          <a href="/mypage/driver_license" class="btn">運転免許証の提出</a>
        </div>

        <div>
          <a href="/logout" class="btn">ログアウト</a>
        </div>
      </div>
    </div>
  </ons-page>
</template>

<script>
    export default {
        props:["user_id"]
  }
</script>