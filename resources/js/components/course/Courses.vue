<template>
  <div>
    <h1>Courses</h1>
    <course-card
      v-for="course in courses"
      v-bind="course"
      :key="course.id"
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
  import { getCourses } from '../../partials/course';
  export default {
    data() {
      return {
        courses: [],
        working: false,
        currentUser: null,
      }
    },
    methods: {
      read() {
        getCourses(this.currentUser.token).then(( data ) => {
          console.log(data);
          data.forEach(course => {
            this.courses.push(new Course(course));
          });
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
        this.read();
    }
  }
</script>
