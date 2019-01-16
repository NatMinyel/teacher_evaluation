<template>
    <div class="limiter">

    <div class="container-register">
			<div class="wrap-register">
				<form class="register-form validate-form"  @submit.prevent="register" style="padding-left: 55px; padding-right: 55px; padding-top: 178px" >
					<span class="register-form-title">
						Sign Up
					</span>
					<div class="form-group row" v-if="regError">
              <p class="error">
                  {{regError}}
              </p>
          </div>
          					
          <div class="wrap-input validate-input" style="margin-bottom: 16px;" data-validate = "Please enter your name">
            <span v-if="errors.has('name')" class="invalid-feedback" role="alert">{{ errors.first('name') }}</span>
						<input class="input" type="text" name="name" v-model="formRegister.name" placeholder="Name">
						<span class="focus-input"></span>
					</div>

          <div class="wrap-input validate-input" style="margin-bottom: 16px;"  data-validate="Please enter username">
            <span v-if="errors.has('username')" class="invalid-feedback" role="alert">{{ errors.first('username') }}</span>
						<input class="input" type="text" name="username" v-model="formRegister.username" placeholder="Username">
						<span class="focus-input"></span>
					</div>

					<div class="wrap-input validate-input" style="margin-bottom: 16px;"  data-validate="Please enter your email address">
            <span v-if="errors.has('email')" class="invalid-feedback" role="alert">{{ errors.first('email') }}</span>
						<input class="input" type="email" name="email" v-model="formRegister.email" placeholder="Email">
						<span class="focus-input"></span>
					</div>

					<div class="wrap-input validate-input" style="margin-bottom: 16px;" data-validate = "Please enter password">
						<input class="input" type="password" name="pass"  v-model="formRegister.password" placeholder="Password">
						<span class="focus-input"></span>
					</div>


          <div class="container-register-form-btn">
						<button class="register-form-btn">
							Sign Up
						</button>
					</div>

					<div class="flex-col-c" style="padding-top: 30px; padding-bottom: 40px;">
						<span class="txt1" style="padding-bottom: 9px;">
							Already have an account?
						</span>

						<a class="txt3" href="login" @click.prevent="login">
							Sign In
						</a>
					</div>
				</form>
			</div>
		</div>
  </div>
</template>

<script>
import {registerUser} from '../../partials/auth';
export default {
    data(){
        return {
            formRegister: {
                name: '',
                email: '',
                password: '',
                username: ''
            },
            error: null
        }
    },
    methods:{
        register(){
            registerUser(this.$data.formRegister)
            .then(res => {
                console.log(res);
                this.$store.commit("registerSuccess", res);
                this.$router.push({path: '/login'});
            })
            .catch(error => {
                this.$store.commit("registerFailed", {error});
            })
        }, 
        login () {
            this.$router.push({path: '/login'});
        }
    },
    computed:{
        regError(){
            return this.$store.getters.regError
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
}

a:hover {
	text-decoration: none;
  color: #2d1435;
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


input::-webkit-input-placeholder { color: #2d1435;}
input:-moz-placeholder { color: #2d1435;}
input::-moz-placeholder { color: #2d1435;}
input:-ms-input-placeholder { color: #2d1435;}

textarea::-webkit-input-placeholder { color: #2d1435;}
textarea:-moz-placeholder { color: #2d1435;}
textarea::-moz-placeholder { color: #2d1435;}
textarea:-ms-input-placeholder { color: #2d1435;}

button {
	outline: none !important;
	border: none;
	background: transparent;
}

button:hover {
	cursor: pointer;
}

iframe {
	border: none !important;
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
  color: #9c46b8;
  line-height: 1.4;
}

.txt3 {
  font-family: 'Quicksand', sans-serif ; font-weight: 700;
  font-size: 15px;
  color: #9c46b8;
  line-height: 1.4;
  text-transform: uppercase;
}



.limiter {
  width: 100%;
  margin: 0 auto;
}

.container-register {
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

.wrap-register {
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



.register-form {
  width: 100%;
  position: relative;
}

.register-form-title {
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
  background-color: #9c46b8;
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
  color: #2d1435;
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
  -webkit-transform: translateX(-50%);
  -moz-transform: translateX(-50%);
  -ms-transform: translateX(-50%);
  -o-transform: translateX(-50%);
  transform: translateX(-50%);
  border-radius: 31px;
  background-color: #ebebeb;
  pointer-events: none;
  
  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.input100:focus + .focus-input {
  width: calc(100% + 20px);
}

.container-register-form-btn {
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.register-form-btn {
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
  background-color: #9c46b8;
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

.register-form-btn:hover {
  background-color: #2d1435;
}


.validate-input {
  position: relative;
}

.alert-validate::before {
  content: attr(data-validate);
  position: absolute;
  z-index: 1000;
  max-width: 70%;
  background-color: #fff;
  border: 1px solid #c80000;
  border-radius: 14px;
  padding: 4px 25px 4px 10px;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  right: 10px;
  pointer-events: none;

  font-family: 'Quicksand', sans-serif ; font-weight: 700;;
  color: #c80000;
  font-size: 13px;
  line-height: 1.4;
  text-align: left;

  visibility: hidden;
  opacity: 0;

  -webkit-transition: opacity 0.4s;
  -o-transition: opacity 0.4s;
  -moz-transition: opacity 0.4s;
  transition: opacity 0.4s;
}

.alert-validate::after {
  content: "\f06a";
  font-family: FontAwesome;
  display: block;
  position: absolute;
  z-index: 1100;
  color: #c80000;
  font-size: 16px;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  right: 16px;
}

.alert-validate:hover:before {
  visibility: visible;
  opacity: 1;
}

@media (max-width: 992px) {
  .alert-validate::before {
    visibility: visible;
    opacity: 1;
  }
}

@media (max-width: 576px) {
  .register-form {
    padding-left: 15px;
    padding-right: 15px;
  }
}

</style>