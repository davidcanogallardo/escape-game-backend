<template>
  <div>
    <router-link :to="'/settings'">
      <div
        class="
          icon-container
          settings-btn-container
          main-icon
          settings-link
          link
        "
        page="settings-page"
      >
        <i class="fas fa-cog"></i>
      </div>
    </router-link>
    <router-link :to="'/settings'"> aaaaaaaaaaaa </router-link>

    <div id="title">
      <span class="red-title">Escape</span>
      <span class="blue-title">Game</span>
    </div>
    <router-link :to="'/hello'">raiz</router-link>

    <div id="game"></div>

    <div class="btn play" >{{ $t("play") }}</div>

    <!-- <div
      class="
        icon-container
        profile-right-btn-container
        main-icon
        own-profile-link
        link
      "
    >
      <i class="fas fa-user"></i> 
    </div>-->
    
    <div class="right-menu">
      <div class="icon-container main-icon own-profile-link link">
        <i class="fas fa-user"></i>
      </div>

      <div class="icon-container main-icon friends-list slide-link">
        <i class="fas fa-user-friends"></i>
      </div>

      <div class="icon-container main-icon notificacion-list slide-link">
        <i class="fas fa-bell"></i>
      </div>
      <div class="icon-container main-icon ranking-link link">
        <i class="fas fa-list-ol"></i>
      </div>
    </div>

    <div class="slide-menu"></div>
  </div>
</template>

<script>
export default {
  name: 'Home'
  //   data () {
  //     return {
  //       msg: 'Welcome to Your Vue.js App'
  //     }
  //   }
}
</script>