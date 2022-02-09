<<<<<<< HEAD
Vue.component('test-controller', {
    template: //html
    `             
    <div class="probar_mando">
        <h1>{{ $t("testcontroller") }}</h1>
        <div class="controller_action">
            <p>{{ $t("testmsg") }}</p>
            <i class="fas fa-redo-alt gesto"></i>
        </div>
        <div class="btn red block volver settings-link link" page="settings-page" v-on:click="$emit('change-page','settings')">{{ $t("return") }}</div>
    </div>
    `, 
=======
Vue.component('test-controller', {
    template: //html
    `             
    <div class="probar_mando">
        <h1>{{ $t("testcontroller") }}</h1>
        <div class="controller_action">
            <p>{{ $t("testmsg") }}</p>
            <i class="fas fa-redo-alt gesto"></i>
        </div>
        <div class="btn red block volver settings-link link" page="settings-page" v-on:click="$emit('change-page','settings')">{{ $t("return") }}</div>
    </div>
    `, 
>>>>>>> b31f7998c5c4ea4e923bef4b8a72a33380f19ce1
})