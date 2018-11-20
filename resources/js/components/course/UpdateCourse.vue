<template>
    <div class="login row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                   <h3>Update Course</h3> 
                </div>
                <div class="col-md-6"><button v-on:click="del">Delete</button></div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="form-group row" v-if="createError">
                            <p class="error">
                                {{createError}}
                            </p>
                        </div>
                        <div class="form-group row">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" v-validate="'required'" v-model="formCreate.name" placeholder="Name">
                            <span v-if="errors.has('name')" class="invalid-feedback" role="alert">{{ errors.first('name') }}</span>
                        </div>
                        <div class="form-group row">
                            <label for="description">Description</label>
                            <input type="description" name="description" v-validate="''" class="form-control" v-model="formCreate.description" placeholder="Description">
                            <span v-if="errors.has('description')" class="invalid-feedback" role="alert">{{ errors.first('description') }}</span>
                        </div>
                        <div class="form-group row">
                            <label for="description">Year Offered</label>
                            <input type="number" name="year_offered" v-validate="''" class="form-control" v-model="formCreate.year_offered" placeholder="Year Offered">
                            <span v-if="errors.has('year_offered')" class="invalid-feedback" role="alert">{{ errors.first('year_offered') }}</span>
                        </div>
                        <div class="form-group row">
                            <label for="description">Semester Offered</label>
                            <input type="number" name="semester_offered" v-validate="''" class="form-control" v-model="formCreate.semester_offered" placeholder="Semester Offered address">
                            <span v-if="errors.has('semester_offered')" class="invalid-feedback" role="alert">{{ errors.first('semester_offered') }}</span>
                        </div>
                        <div class="form-group row">
                            <label for="program">Program</label>
                            <input type="number" name="program" v-validate="''" class="form-control" v-model="formCreate.program" placeholder="Program">
                            <span v-if="errors.has('program')" class="invalid-feedback" role="alert">{{ errors.first('program') }}</span>
                        </div>
                        <div class="form-group row">
                            <input type="submit" value="Update" class="btn btn-outline-primary ml-auto">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {updateCourse, getCourseById, deleteCourse} from '../../partials/course';
export default {
    data(){
        return {
            formCreate: {
                name: '',
                description: '',
                semester_offered: 1,
                is_all_year: false,
                year_offered: 1,
                program: 1
            },
            error: null,
            currentUser: null,
            course: null,
            id: null,
        }
    },
    methods:{
        del() {
            deleteCourse(this.id, this.currentUser.token).then(res => {
                console.log("Successfully deleted");
                this.$router.push({path: '/courses/'});
            }).catch(error => {
                console.log(error);
            });
        },
        update(){
            updateCourse(this.id, this.$data.formCreate, this.currentUser.token)
            .then(res => {
                console.log(res);
                // this.$store.commit("CreateSuccess", res);
                this.$router.push({path: '/courses/' + this.id});
            })
            .catch(error => {
                // this.$store.commit("CreateFailed", {error});
            })
        }, 
        read() {
            getCourseById(this.id, this.currentUser.token).then(( data ) => {
                console.log(data);
                this.course = data;
                this.formCreate = this.course;
            });
        }
    },
    computed:{
        createError(){
            // return this.$store.getters.createError;
        }
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

<style scoped>
.error{
    text-align: center;
    color: red;
}
</style>