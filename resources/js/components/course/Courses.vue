<template>
  <div class="limiter">
    <Header v-bind:toggled="toggled" />
    <div id="wrapper" v-bind:class="{ 'toggled': toggled} ">
      <Sidebar v-bind:toggled="toggled" v-bind:active="active" />
      <div id="page-content-wrapper">
        <div class="main">
          <course-card
            v-for="course in courses"
            v-bind="course"
            :key="course.id"
          >
          </course-card>
          <div class="container-course">
            <div class="wrap-course">
                <div class="course-card-create">
                    <span class="course-card-title-create">
                        Create A New Course
                    </span>
                    <div class="course-create-form">
                        <router-link :to="{ path: '/courses/create', query: {}}"><div class="course-create-body"><i class="fa fa-plus course-create-icon"></i></div></router-link>
                    </div>
                </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</template>
<script>
  function Course({ id, name, description, is_all_year, year_offered, semester_offered, program, created_by, created_at, updated_at}) {
    this.id = id;
    this.description = description;
    this.name = name;
    this.created_at = created_at;
    this.updated_at = updated_at;
    this.semester_offered = semester_offered;
    this.program = program;
    this.year_offered = year_offered;
    this.created_by = created_by;
  }
  import CourseCard from '../parts/CourseCard.vue';
  import Header from '../parts/Header.vue';
  import Sidebar from '../parts/Sidebar.vue';
  import { getCourses } from '../../partials/course';
  export default {
    data() {
      return {
        active: "course",
        courses: [],
        working: false,
        currentUser: null,
        toggled: false
      }
    },
    methods: {
      read() {
        if (this.currentUser)
          getCourses(this.currentUser.token).then(( data ) => {
            console.log(data);
            data.forEach(course => {
              this.courses.push(new Course(course));
            });
          });
      }
    },
    computed: {
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
       CourseCard, Header, Sidebar
    },
    created() {
        // this.toggled = this.$router.history.current.query.toggled === "true";
        this.currentUser = this.$store.getters.currentUser;
        this.toggled = this.$store.state.toggled;
        this.read();
    }
  }
</script>
<style>

.container-course {
  display: flex;
  flex-wrap: wrap;
  margin: 1.5%;
  position: relative;
  background-color: #fff;
  width: 30%;
  min-width: 275px;
  float: left;
  transition: all 0.5s ease;
}

.wrap-course {
  height: 300px;
  width: 100%;
  background: #fff;
  border-radius: 20px;
  overflow: hidden;
  z-index: auto;
  box-shadow: 4px 12px 20px 0px rgba(0, 0, 0, 0.1);
}



.course-card {
  width: 100%;
  position: relative;
  padding-top: 100px;
  padding-left: 20px;
  padding-right: 20px;
}

.course-card-title {
  font-family: 'Text Me One', sans-serif;
  font-size: 29px;
  color: #fff;
  line-height: 1.0;
  text-align: center;
  overflow: hidden;
  display: block;
  position: absolute;
  width: 100%;
  height: 260px;
  top: 0;
  left: 0;
  background-color: #383838;
  padding-top: 100px;
  padding-bottom: 20px;
  padding-left: 5px;
  padding-right: 5px;
  transition: all 0.3s ease;
}


.container-course-card-footer {
  margin-top: 10px;
  margin-bottom: 15px;
  width: 100%;
  position: absolute;
  bottom: -5px;
  padding: 0px 15px 0;

}

@media (max-width: 576px) {
  .course-card {
    padding-left: 15px;
    padding-right: 15px;
  }
}


.course-description {
  height: 175px;
  visibility: hidden;
  margin-top: -30px;
}

.course-description-text {
  height: 150px;
  overflow: hidden;
}
.course-description-enter {
  margin-top: 7px;
  text-align: center;
}
.course-description-enter-btn {
  padding: 10px;
  border: #383838 2px solid;
  border-radius: 25px;
}

.course-description-enter-btn:hover {
  border: #383838 2px solid;
  color: white;
  background: #383838;
}

.footer-department {
  color: rgb(7, 78, 7);
  font-size: 12px;
  text-transform: uppercase;
}

.footer-deadline {
  font-size: 12px;
  padding-top: 4px;
}

.footer-deadline i {
  color: red;
}



.course-card-create {
  width: 100%;
  position: relative;
  padding-top: 100px;
  padding-left: 20px;
  padding-right: 20px;
}

.course-create-form {
  height: 200px;
  overflow: hidden;
}

.course-create-body {
  background-color: rgb(221, 221, 221); 
  margin-top: 5%; 
  margin-left: 20%; 
  width: 150px; 
  height: 150px; 
  text-align: center; 
  border-radius: 50%;
  transition: all 0.3s ease;
  color: #383838;
}

.course-create-body:hover {
  background-color: rgb(235, 235, 235); 
  width: 175px; 
  height: 175px;
  margin-top: 0;
  margin-left: 12%;
}
.course-create-body:hover .course-create-icon{
  font-size: 11.5em;

}
.course-create-icon {
  font-size: 10em;
  margin-top: -5px; 
  transition: all 0.3s ease;
}

.course-card-title-create {
  font-family: 'Text Me One', sans-serif;
  font-size: 25px;
  color: #fff;
  line-height: 1.2;
  text-align: center;
  overflow: hidden;
  display: block;
  position: absolute;
  width: 100%;
  height: 90px;
  top: 0;
  left: 0;
  background-color: #383838;
  padding-top: 30px;
  padding-bottom: 20px;
}

ul li {
  font-size: 1rem;
  font-weight: 400;
  color: #333;
  display: inline-block;
  padding: 15px;
  position: relative;
}

.navbar-top ul {
  display: none;
}

.navbar-top:hover {
  cursor: pointer;
  background-color: #383838;
  border-radius: 15px;
  color: white;
}

.navbar-top:hover ul {
  z-index: 10;
  display: block;
  margin-top: 15px;
  max-width: 250px;
  left: 0;
  position: absolute;
  box-shadow: 2px 3px 20px 0px rgba(0, 0, 0, 0.1);
}
.navbar-top:hover ul li {
  z-index: 10;
  display: block;
  background-color: #fff;
}
.navbar-top:hover ul li span {
  float: right;
  color: #fff;
  background-color: #F03861;
  padding: 2px 5px;
  text-align: center;
  font-size: .8rem;
  border-radius: 8px;
}
.navbar-top:hover ul li:hover {
  background-color: #efefef;
}
.navbar-top:hover ul li:hover span {
  background-color: #ee204e;
}

.left-contain {
  display: flex;
  flex-direction: row-reverse;
}

.pull-right {
  float: right;
}
.navbar-main {
  background: white;
  box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  height: 60px;
  padding: 5px;

}
@media (max-width: 705px) {
  .navbar-main {
    box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
    height: 120px;
    padding: 5px;
  }
}
@media (max-width: 374px) {
  .navbar-main {
    box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
    height: 180px;
    padding: 5px;
  }
}
@media (max-width: 293px) {
  .navbar-main {
    box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
    height: 240px;
    padding: 5px;
  }
}


#wrapper {
  padding-left: 0;
  transition: all 0.5s ease;
  z-index: -2;
}

#wrapper.toggled {
  padding-left: 186px;
}

#sidebar-wrapper {
  z-index: 0;
  position: fixed;
  top: 60px;
  left: 250px;
  width: 0;
  height: 100%;
  margin-left: -250px;
  overflow-y: auto;
  background: #fff;
  border-color: #fff;
  box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  transition: all 0.5s ease;
}

#wrapper.toggled #sidebar-wrapper {
  width: 186px;
}

#page-content-wrapper {
  width: 100%;
  position: absolute;
  padding: 15px;
}

#wrapper.toggled #page-content-wrapper {
  position: absolute;
  margin-right: -186px;
  /*margin-left: -45px;*/
}


.sidebar-nav {
  position: absolute;
  width: 186px;
  margin: 0;
  padding: 0;
  list-style: none;
}

.sidebar-nav li {
  text-align: center;
  line-height: 40px;
  width: 100%;
}

.sidebar-nav li a {
  display: block;
  text-decoration: none;
  color: #000;
  border-radius: 15px;
}

.sidebar-nav li a:hover {
  text-decoration: none;
  color: #000;
  background: #c3f5a64d;
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
  text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
  height: 65px;
  font-size: 18px;
  line-height: 60px;
}

.sidebar-nav > .sidebar-brand a {
  color: #999999;
}

.sidebar-nav > .sidebar-brand a:hover {
  color: #000;
  background: none;
}


@media (min-width: 200px) {
  #wrapper {
      padding-left: 186px;
  }

  #wrapper.toggled {
      padding-left: 70px;
  }

  #sidebar-wrapper {
      width: 186px;
  }

  #wrapper.toggled #sidebar-wrapper {
      width: 70px;
  }

  #wrapper.toggled #sidebar-wrapper #sidebar-nav {
      width: 70px;
  }

  #page-content-wrapper {
      padding: 20px;
      position: relative;
  }

  #wrapper.toggled #page-content-wrapper {
      position: relative;
      margin-right: 0;
  }
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
</style>