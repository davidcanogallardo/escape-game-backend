<<<<<<< HEAD
Vue.component('login-warning', {
    template: //html
    `             
    <div class="login_warning">
        <h1>{{ $t("login") }}</h1>
        
        <div class="botones_warning">
            <p>{{ $t("loginwarning") }}</p>
            <div class="btn blue link" page="login-page" v-on:click="$emit('change-page','login')">{{ $t("login") }}</div>
        </div>
        
        <div class="btn red block volver link" page="main" v-on:click="$emit('change-page','home')">{{ $t("return") }}</div>
    </div>
    `, 
})

=======
Vue.component('login-warning', {
    template: //html
    `             
    <div class="login_warning">
        <h1>{{ $t("login") }}</h1>
        
        <div class="botones_warning">
            <p>{{ $t("loginwarning") }}</p>
            <div class="btn blue link" page="login-page" v-on:click="$emit('change-page','login')">{{ $t("login") }}</div>
        </div>
        
        <div class="btn red block volver link" page="main" v-on:click="$emit('change-page','home')">{{ $t("return") }}</div>
    </div>
    `, 
})

>>>>>>> b31f7998c5c4ea4e923bef4b8a72a33380f19ce1
