<template>
    <div class="course">
        <div class="col-2">
            <h3>Name: {{ name }}</h3>
            <div>{{ description }}</div>
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
    .course {
        display: flex;
        margin: 1em 1em 1em 0;
        border: 1px solid #d1d1d1;
        padding: 1em;
        max-width: 350px;
        background-color: white;
    }
    .course img {
        height: 70px;
    }
    .col-2 {
        margin-left: 1em;
    }
    .col-2 > h3 {
        margin: 0.5em 0;
    }
</style>