<template>
  <div class="settings_menu">
    <h1>{{ $t("settings") }}</h1>

        <div class="botones">
            <div class="btn blue block sound-link link" >{{ $t("sound") }}</div>
            <div class="btn blue block connect-controller-link link">{{ $t("connectcontroller") }}</div>
            <div class="btn blue block controller-settings-link link">{{ $t("testcontroller") }}</div>
            <div class="btn blue block controller-settings-link link">{{ $t("changelanguage") }}</div>
        </div>

    <router-link :to="'/'">
      <div class="btn red block volver link" page="main">{{ $t("return") }}</div>
    </router-link>
  </div>
</template>

<script>
export default {
  name: 'Settings'
  // data () {
  //   // return {
  //   //   msg: 'Welcome to Your Vue.js App'
  //   // }
  // }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>