<template>
    <div class="container-course">
        <div class="wrap-course">
            <div class="course-card">
                <div class="course-card-title">
                    {{ name }}
                </div>

                <div class="course-description">
                    <div class="course-description-text">
                        {{ description }}    
                    </div>
                    <div class="course-description-enter">
                        <button class="course-description-enter-btn"><router-link to="/courses/{name}">Enter Course</router-link></button>
                    </div>
                </div>
            </div>
            <div class="container-course-card-footer">
                <span class="footer-department">Computer Science</span>
                <span class="footer-deadline pull-right"><i class="fas fa-clock"></i> 25/12/2018</span>
            </div>
        </div>
    </div>
</template>
<script>
  export default {
    computed: {
    },
    methods: {
    },
    props: ['id', 'description', 'name'],
    filters: {
      properCase(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
      }
    }
  }
</script>
<style>


</style>