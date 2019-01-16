<template>
    <div class="limiter">
    	<div class="container-login">
			<div class="wrap-login">
        <form class="login-form validate-form " style="padding-left: 55px; padding-right: 55px; padding-top: 178px"  @submit.prevent="authenticate">
					<span class="login-form-title">
						Sign In
					</span>
          <div v-if="registeredUser" class="text-success">Thank you {{registeredUser.name}}. You can now login.</div>
				
					<div class="wrap-input validate-input" style="margin-bottom: 16px;" data-validate="Please enter email">
						<input class="input" type="email" name="username"  v-model="formLogin.email" placeholder="Email">
						<span class="focus-input"></span>
					</div>

					<div class="wrap-input validate-input" data-validate = "Please enter password">
						<input class="input" type="password" v-model="formLogin.password" name="pass" placeholder="Password">
						<span class="focus-input"></span>
					</div>

					<div class="text-right" style="padding-top: 13px; padding-bottom: 23px;">
						<span class="txt1">
							Forgot
						</span>

						<a href="./ForgotPassword.html" @click.prevent="forgot" class="txt2">
							Username / Password?
						</a>
					</div>

					<div class="container-login-form-btn">
						<input value="Sign in" type="submit" class="login-form-btn">
					</div>

					<div class="flex-col-c" style="padding-top: 70px; padding-bottom: 40px;">
						<span class="txt1 p-b-9">
							Don’t have an account?
						</span>

						<a href="register" @click.prevent="signup" class="txt3">
							Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</template>

<script>
import {login} from '../../partials/auth';
export default {
    data(){
        return {
            formLogin: {
                email: '',
                password: ''
            },
            error: null
            }
    },
    methods:{
        authenticate(){
            this.$store.dispatch('login');
            login(this.$data.formLogin)
                .then(res => {
                    this.$store.commit("loginSuccess", res);
                    this.$router.push({path: '/dashboard'});
                })
                .catch(error => {
                    this.$store.commit("loginFailed", {error});
                });
        },
        signup() {
          this.$router.push({path: '/register'});
        }
    },
    computed:{
        authError(){
            return this.$store.getters.authError;
        },
        registeredUser(){
            return this.$store.getters.registeredUser;
        }
    },
    created() {
        if(this.$store.getters.isLoggedin) {
          this.$router.push({path: '/dashboard'});
        }
    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css?family=Quicksand:400,700');
@import url('https://fonts.googleapis.com/css?family=Text+Me+One'); 

* {
	margin: 0px; 
	padding: 0px; 
	box-sizing: border-box;
}

body, html {
	height: 100%;
	font-family: 'Quicksand', sans-serif;
}

a {
	font-family: 'Quicksand', sans-serif;
	font-size: 14px;
	line-height: 1.7;
	color: #666666;
	margin: 0px;
	transition: all 0.4s;
	-webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
}

a:focus {
	outline: none !important;
  text-decoration: none;
}

a:hover {
	text-decoration: none;
  color: #1b3815;
}

h1,h2,h3,h4,h5,h6 {
	margin: 0px;
}

p {
	font-family: 'Quicksand', sans-serif ;
	font-size: 14px;
	line-height: 1.7;
	color: #666666;
	margin: 0px;
}

ul, li {
	margin: 0px;
	list-style-type: none;
}


input {
	outline: none;
	border: none;
}

input[type="number"] {
    -moz-appearance: textfield;
    appearance: none;
    -webkit-appearance: none;
}

input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
}

textarea {
  outline: none;
  border: none;
}

textarea:focus, input:focus {
  border-color: transparent !important;
}


input::-webkit-input-placeholder { color: #1b3815;}
input:-moz-placeholder { color: #1b3815;}
input::-moz-placeholder { color: #1b3815;}
input:-ms-input-placeholder { color: #1b3815;}

textarea::-webkit-input-placeholder { color: #1b3815;}
textarea:-moz-placeholder { color: #1b3815;}
textarea::-moz-placeholder { color: #1b3815;}
textarea:-ms-input-placeholder { color: #1b3815;}

button {
	outline: none !important;
	border: none;
	background: transparent;
}

button:hover {
	cursor: pointer;
}

.txt1 {
  font-family: 'Quicksand', sans-serif ;
  font-size: 15px;
  color: #999999;
  line-height: 1.4;
}

.txt2 {
  font-family: 'Quicksand', sans-serif ;
  font-size: 15px;
  color: #57b846;
  line-height: 1.4;
}

.txt3 {
  font-family: 'Quicksand', sans-serif ; font-weight: 700;
  font-size: 15px;
  color: #57b846;
  line-height: 1.4;
  text-transform: uppercase;
}



.limiter {
  width: 100%;
  margin: 0 auto;
}

.container-login {
  width: 100%;  
  min-height: 100vh;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding: 15px;
  position: relative;
  background-color: #fff;
}

.wrap-login {
  width: 500px;
  background: #fff;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  -webkit-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  -o-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  -ms-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
}



.login-form {
  width: 100%;
  position: relative;
}

.login-form-title {
  font-family: 'Text Me One', sans-serif;
  font-size: 40px;
  color: #fff;
  line-height: 1.2;
  text-align: center;

  display: block;
  position: absolute;
  width: 100%;
  top: 0;
  left: 0;
  background-color: #57b846;
  padding-top: 50px;
  padding-bottom: 39px;
}


.wrap-input {
  width: 100%;
  background-color: #fff;
  border-radius: 27px;
  position: relative;
  z-index: 1;
}

.input {
  font-family: 'Quicksand', sans-serif ; font-weight: 700;
  font-size: 15px;
  color: #1b3815;
  line-height: 1.2;

  position: relative;
  display: block;
  width: 100%;
  height: 55px;
  background: #ebebeb;
  border-radius: 27px;
  padding: 0 35px 0 35px;
}


.focus-input {
  display: block;
  position: absolute;
  z-index: -1;
  width: 100%;
  height: 100%;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  border-radius: 31px;
  background-color: #ebebeb;
  pointer-events: none;
  transition: all 0.4s;
}

.input100:focus + .focus-input {
  width: calc(100% + 20px);
}

.container-login-form-btn {
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.login-form-btn {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
  width: 100%;
  height: 50px;
  background-color: #57b846;
  border-radius: 25px;

  font-family: 'Quicksand', sans-serif ; 
  font-weight: 700;
  font-size: 15px;
  color: #fff;
  line-height: 1.2;
  text-transform: uppercase;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.login-form-btn:hover {
  background-color: #1b3815;
}


.validate-input {
  position: relative;
}



@media (max-width: 576px) {
  .login-form {
    padding-left: 15px;
    padding-right: 15px;
  }
}

</style>