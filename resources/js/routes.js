import Home from './components/Home.vue';
import Dashboard from './components/Dashboard.vue';
import Login from './components/security/Login.vue';
import Register from './components/security/Register.vue';
import Courses from './components/course/Courses.vue';
import CreateCourse from './components/course/CreateCourse.vue';
import ViewCourse from './components/course/ViewCourse.vue';
export const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    }, {
        path: '/register',
        name: 'register',
        component: Register
    }, {
        path: '/login',
        name: 'login',
        component: Login
    }, {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard
    }, {
        path: '/courses',
        name: 'courses',
        component: Courses
    }, {
        path: '/courses/create',
        name: 'create-course',
        component: CreateCourse
    }, {
        path: '/courses/:id',
        name: 'view-course',
        component: ViewCourse
    }
]