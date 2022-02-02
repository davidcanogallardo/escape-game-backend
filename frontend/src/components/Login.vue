<template>
    <div class="page login-page">  
        <div id="forms-container" >
            <div  class="sign-up-container">
                <h2 >{{ $t("createaccount") }}</h2>
                <form id="signup" method="put" >  
                    <label for="email" required="">Email</label>
                    <input type="email" id="register_email" name="mail" required>
                    <label for="uname">{{ $t("username") }}</label>
                    <input type="text" id="lname" name="username" required>
                    <label for="password">{{ $t("password") }}</label>
                    <input type="password" id="register_password" name="password"  required>
                    <label for="confirm">{{ $t("repeatpassword") }}</label>
                    <input type="password" id="confirm" name="password_confirm"  required>

                    <!-- <p v-if="!errorMessageIsEmpty() && this.errorType == 'register'" class="form_error">{{ signupErrorMessage }}</p> -->

                    <div class=" form-button blue signup-link" >{{ $t("createaccount") }}</div>
                </form>
            </div>

            <hr id="form-space" >

            <div  class="sign-up-container">
                <h2 >{{ $t("login") }}</h2>
                <form id="login" method="post" >  
                    <label for="uname">{{ $t("username") }}</label>
                    <input type="text" id="login-name" name="username" required>
                    <label for="password">{{ $t("password") }}</label>
                    <input type="password" id="login_password" name="password"  required>
                    <div class="recover-link link" page="recover-page">
                        <a class="recover-link link" page="recover-page">
                            <b>{{ $t("forgotpassword") }}</b>
                        </a>
                    </div>
                    <!-- <p v-if="!errorMessageIsEmpty() && this.errorType == 'login'" class="form_error">{{ loginErrorMessage }}</p> -->
                    <div class=" form-button blue login-link">{{ $t("login") }}</div>
                </form>
                <div class="error"></div>
            </div>
            
        </div>
        <div class="btn red volver settings-link link" page="settings-page">
            {{ $t("return") }}
        </div>
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