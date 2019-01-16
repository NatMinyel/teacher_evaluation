<template>
  <div class="limiter">
    <Header v-bind:toggled="toggled" />
    <div id="wrapper" v-bind:class="{ 'toggled': toggled} ">
      <Sidebar v-bind:toggled="toggled" v-bind:active="active" />
      <div id="page-content-wrapper">
        <div class="main">
          <div class="container-evalform">
              <div class="wrap-evalform">
                  <form class="evalform-form validate-form" @submit.prevent="create" style="padding-left: 55px; padding-right: 55px; padding-top: 178px">
                      <span class="evalform-form-title">
                          Create Course
                      </span>
                      <div class="form-group row" v-if="createError">
                          <p class="error">
                              {{createError}}
                          </p>
                      </div>
                      <div class="question-wrapper">
                          Title
                      </div>
                      <div class="wrap-input validate-input" style="margin-bottom: 16px" data-validate="Please enter Course Title">
                          <input v-model="formCreate.name" class="input" type="text" name="title" placeholder="Title" >
                          <span v-if="errors.has('name')" class="invalid-feedback" role="alert">{{ errors.first('name') }}</span>
                      </div>

                      <div class="question-wrapper">
                          Department
                      </div>
                      <div class="wrap-input validate-input" style="margin-bottom: 16px" data-validate="Please enter program">
                          <select class="input" v-model="formCreate.program">
                              <option value="1">Computer Science</option>
                              <option value="2">Economics</option>
                              <option value="3">Statistics</option>
                          </select>
                          <span v-if="errors.has('program')" class="invalid-feedback" role="alert">{{ errors.first('program') }}</span>
                      </div>
                      
                      <div class="question-wrapper">
                          Description
                      </div>
                      <div class="wrap-input validate-input" style="margin-bottom: 16px" data-validate="Please enter description">
                          <input   class="input" type="text" name="description" v-model="formCreate.description" placeholder="Description">
                          <span v-if="errors.has('description')" class="invalid-feedback" role="alert">{{ errors.first('description') }}</span>
                      </div>

                      <div class="question-wrapper">
                          Semester Offered
                      </div>
                      <div class="wrap-input validate-input" style="margin-bottom: 16px" data-validate="Please enter semester">
                          <input class="input" type="number" name="semester_offered" v-model="formCreate.semester_offered" placeholder="Semester Offered">
                          <span v-if="errors.has('semester_offered')" class="invalid-feedback" role="alert">{{ errors.first('semester_offered') }}</span>
                      </div>
                      
                      <div class="question-wrapper">
                          Year Offered
                      </div>
                      <div class="wrap-input validate-input" style="margin-bottom: 16px" data-validate="Please enter year">
                          <input class="input" type="number" name="year_offered" v-model="formCreate.semester_offered" placeholder="Year Offered">
                          <span v-if="errors.has('year_offered')" class="invalid-feedback" role="alert">{{ errors.first('year_offered') }}</span>
                      </div>

                      <div class="container-evalform-form-btn" style="margin-bottom: 16px">
                          <button class="evalform-form-btn">
                              Create Course
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
import {createCourse} from '../../partials/course';
import Header from '../parts/Header';
import Sidebar from '../parts/Sidebar';
export default {
    data(){
        return {
            formCreate: {
                name: '',
                description: '',
                semester_offered: 1,
                is_all_year: false,
                year_offered: 1,
                program: 2
            },
            active: "course",
            error: null,
            currentUser: null,
            toggled: false
        }
    },
    methods:{
        create(){
            createCourse(this.$data.formCreate, this.currentUser.token)
            .then(res => {
                console.log(res);
                // this.$store.commit("CreateSuccess", res);
                this.$router.push({path: '/courses'});
            })
            .catch(error => {
                // this.$store.commit("CreateFailed", {error});
            })
        }
    },
    computed:{
      createError(){
          // return this.$store.getters.createError;
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
    created() {
        this.currentUser = this.$store.getters.currentUser;
        this.toggled = this.$store.state.toggled;
    }, 
    components: {
      Header, Sidebar
    }
}
</script>

<style scoped>
.container-evalform {
    width: 100%;  
    min-height: 40vh;
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
  
  .wrap-evalform {
    width: 750px;
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
    -webkit-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
    -o-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
    -ms-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  }
  
  
  
  .evalform-form {
    width: 100%;
    position: relative;
  }
  
  .evalform-form-title {
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
    background-color: #ffb300;
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
    color: #755303;
    line-height: 1.2;
  
    position: relative;
    display: block;
    width: 100%;
    height: 55px;
    background: #ebebeb;
    border-radius: 27px;
    padding: 0 35px 0 35px;
    border: #ebebeb 1px solid;
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
  
  .container-evalform-form-btn {
    width: 100%;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }
  
  .evalform-form-btn {
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
    background-color: #ffb300;
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
  
  .evalform-form-btn:hover {
    background-color: #755303;
  }
  
  
  .validate-input {
    position: relative;
  }
  
  
  
  @media (max-width: 576px) {
    .evalform-form {
      padding-left: 15px;
      padding-right: 15px;
    }
  }
  .question-wrapper {
    margin: 10px;
  }
</style>