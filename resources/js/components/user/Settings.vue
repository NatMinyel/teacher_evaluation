<template>
    <div class='limiter'>
    <Header v-bind:toggled="toggled" />
    <div id="wrapper" v-bind:class="{ 'toggled': toggled} ">
        <Sidebar v-bind:toggled="toggled" v-bind:active="active" />
        <div id="page-content-wrapper">
            <div class="main">
                <div class="wall">
                    <div class="wall-name">{{ currentUser.name }}</div>
                    <div class="wall-department">Computer Science</div>
                    <div class="wall-photo"><img src="images/img-01.png" /></div>
                </div>
                <div class="container-profile">
                    <div class="wrap-profile">
                        <form class="profile-form validate-form " style="padding-left: 55px; padding-right: 55px; padding-top: 178px">
                            <span class="profile-form-title">
                                Update Profile
                            </span>
        
                            <div class="wrap-input validate-input" style="margin-bottom: 16px;" data-validate="Please enter username">
                                <input class="input" type="text" name="username" placeholder="Username">
                                <span class="focus-input"></span>
                            </div>
        
                            <div class="wrap-input bio-box validate-input" data-validate = "Please enter Bio">
                                <textarea name="bio" placeholder="Bio"></textarea>
                                <span class="focus-input"></span>
                            </div>

                            <div class="wrap-input validate-input" style="margin-top: 20px;" data-validate = "Please enter file">
                                <input class="input" style="padding-top: 15px" type="file" name="photo">
                                <span class="focus-input"></span>
                            </div>
                            <div class="container-profile-form-btn" style="padding-bottom: 23px; padding-top: 13px;">
                                <button class="profile-form-btn">
                                    Save Profile
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>
<script>
    import Header from '../parts/Header.vue';
    import Sidebar from '../parts/Sidebar.vue';
    export default {
      data() {
        return {
          toggled: false,
          active: "eval"
        }
      },
      computed:{
          currentUser(){
            return this.$store.getters.currentUser;
          },
          retoggled() {
            return this.$store.state.toggled;
          }
        }, 
        watch: {
          retoggled(newT, oldT) {
            return this.toggled = newT; 
          }
        },
      components: {
          Header, Sidebar
      }, 
      created() {
        this.toggled = this.$store.state.toggled;
      }
    }
</script>
<style>
#page-content-wrapper {
    padding: 0;
}
.wall {
    width: 100%;
    height: 300px;
    padding-top: 150px;
    text-align: center;
    /* margin: -20px; */
  
    position: relative;
    /* display: flex; */
    background: #383838;
}

.wall-name { 
  color: white;
  font-size: 35px;
}

.wall-department {
  color: white;
  font-size: 22px;
}
.wall-photo {
  background: white;
  height: 160px;
  width: 160px;
  border-radius: 50%;
  padding: 5px;
  margin-top: 160px;
  box-shadow: 2px 10px 20px 0px rgba(0, 0, 0, 0.1);
  position: absolute;
  top: 50%;
  left: 50%;
  margin-right: -50%;
  transform: translate(-50%, -50%);
  z-index: 2;
}

.wall-photo img {
  height: 150px;
  width: 150px;
}
li.active {
  background: #c3f5a6;
}
.active a:hover {
  background: #dffdcd !important;
}

.hidden {
  visibility: hidden;
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
  width: 100%;
  height: 100%;
  outline: none;
  border: none;
  border-radius: 20px;
  background: #ebebeb;
  font-weight: 700;
  padding: 20px 35px 0 35px;
  font-size: 15px;
}

textarea:focus, input:focus {
  border-color: transparent !important;
}


input::-webkit-input-placeholder { color: #141514;}
input:-moz-placeholder { color: #141514;}
input::-moz-placeholder { color: #141514;}
input:-ms-input-placeholder { color: #141514;}

textarea::-webkit-input-placeholder { font-family: 'Quicksand', sans-serif ;color: #141514;}
textarea:-moz-placeholder { font-family: 'Quicksand', sans-serif ;color: #141514;}
textarea::-moz-placeholder { font-family: 'Quicksand', sans-serif ;color: #141514;}
textarea:-ms-input-placeholder { font-family: 'Quicksand', sans-serif ;color: #141514;}

.bio-box {
  height: 200px;
}


.container-profile {
  width: 100%;      
  min-height: 65vh;
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

.wrap-profile {
  width: 625px;
  background: #fff;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  -webkit-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  -o-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  -ms-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
}



.profile-form {
  width: 100%;
  position: relative;
}

.profile-form-title {
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
  background-color: #383838;
  padding-top: 75px;
  padding-bottom: 39px;
}


.wrap-input {
  width: 100%;
  background-color: #fff;
  border-radius: 25px;
  position: relative;
  z-index: 1;
}

.input {
  font-family: 'Quicksand', sans-serif ; 
  font-weight: 700;
  font-size: 15px;
  color: #141514;
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

.container-profile-form-btn {
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.profile-form-btn {
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
  background-color: #383838;
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

.profile-form-btn:hover {
  background-color: #141514;
}


.validate-input {
  position: relative;
}



@media (max-width: 576px) {
  .profile-form {
    padding-left: 15px;
    padding-right: 15px;
  }
}

</style>