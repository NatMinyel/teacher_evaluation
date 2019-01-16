<template>
    <li @click="toggleSide">
        <i class="fas fa-angle-double-left"></i>
    </li>
</template>
<script>
    export default {
        name: 'SidebarButton',
        methods: {
            toggleSide() {
                this.$store.commit('toggle'); 
            }
        }, 
        created() {
        }
    }
</script>