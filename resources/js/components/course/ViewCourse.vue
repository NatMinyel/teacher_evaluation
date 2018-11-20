<template>
  <div>
    <h1>Courses</h1>
    <course-card
      v-bind="course"
    >
    </course-card>
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
  import {getCourseById } from '../../partials/course';
  export default {
    data() {
      return {
        course: null,
        working: false,
        currentUser: null,
        id: null,
      }
    },
    methods: {
      read() {
        getCourseById(this.id, this.currentUser.token).then(( data ) => {
          console.log(data);
          this.course = data;
        });
      }
    },
    watch: {
      
    },
    components: {
       CourseCard
    },
    created() {
        
        this.currentUser = this.$store.getters.currentUser;
        try {
            this.id = this.$route.params.id;
            console.log(this.id);
            // console.log(this.currentUser);
            this.read();
        } catch (Exception) {
            console.log(e);
        }
    }
  }
</script>
