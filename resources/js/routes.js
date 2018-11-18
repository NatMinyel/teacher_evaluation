import Home from './components/Home.vue';
import Dashboard from './components/Dashboard.vue';
import Login from './components/Login.vue';
import Register from './components/Register.vue';
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
    }
]