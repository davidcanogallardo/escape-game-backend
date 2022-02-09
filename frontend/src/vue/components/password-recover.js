<<<<<<< HEAD
Vue.component('password-recover', {
    template: //html
    `             
    <div style="/*! width: 80%; */">
        <h1>{{ $t("recoverpassword") }}</h1>
        <p>{{ $t("recovermsg") }}</p>
            <div id="recover-form">
                <form class="recover-form" id="form-recover" method="post">
                    <label for="email">Email</label>
                    <input type="email" id="recover_email" name="mail" v-model="mail">
                    <div  class="btn blue signup-link" v-on:click="recover()">{{ $t("send") }}</div>
                </form>
            </div>
            <div class="btn red volver link " page="login-page" v-on:click="$emit('change-page','login')">Volver</div>
    </div>
    `, 
    data() {
        return {
            mail: ""
        }
    },
    methods:{
        recover(){
            this.$root.recoverPassword(this.mail);
        }
    }
})
=======
Vue.component('password-recover', {
    template: //html
    `             
    <div style="/*! width: 80%; */">
        <h1>{{ $t("recoverpassword") }}</h1>
        <p>{{ $t("recovermsg") }}</p>
            <div id="recover-form">
                <form class="recover-form" id="form-recover" method="post">
                    <label for="email">Email</label>
                    <input type="email" id="recover_email" name="mail" v-model="mail">
                    <div  class="btn blue signup-link" v-on:click="recover()">{{ $t("send") }}</div>
                </form>
            </div>
            <div class="btn red volver link " page="login-page" v-on:click="$emit('change-page','login')">Volver</div>
    </div>
    `, 
    data() {
        return {
            mail: ""
        }
    },
    methods:{
        recover(){
            this.$root.recoverPassword(this.mail);
        }
    }
})
>>>>>>> b31f7998c5c4ea4e923bef4b8a72a33380f19ce1
