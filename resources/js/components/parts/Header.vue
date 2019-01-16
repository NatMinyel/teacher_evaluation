<template v-if="currentUser">
    <nav class="navbar-main">
        <ul>
            <li class="navbar-top"><router-link to="/">Teacher Evaluation</router-link></li>
            <li class="navbar-top" @click="toggleSide" style="margin-left: 20px;"><i id="collapser" :class="{'fas': true, 'fa-angle-double-left': !toggled, 'fa-angle-double-right': toggled }"></i></li>
            <template v-if="!currentUser">
                <li class="pull-right navbar-top">
                    <router-link to="/login" class="nav-link">Login</router-link>
                </li>
                <li class="pull-right navbar-top">
                    <router-link to="/register" class="nav-link">Register</router-link>
                </li>
            </template>
            <template v-else>
                <li class="pull-right navbar-top"><i class="fas fa-user"></i> {{ currentUser.username }} <i class="fa fa-angle-down"></i>
                <ul>
                    <li><router-link :to="{ path: '/settings'}"><i class="fa fa-cog"></i> Settings</router-link></li>
                    <li @click.prevent="logout"><router-link to="/logout"><i class="fa fa-sign-out-alt"></i> Logout</router-link></li>
                </ul>
                </li>
                <li class="pull-right navbar-top"><i class="fa fa-bell"></i> Notifications <i class="fa fa-angle-down"></i>
                    <ul>
                        <li><router-link :to="{ path: '/dashboard'}"><i class="fab fa-wpforms"></i> Forms&nbsp;<span>3</span></router-link></li>
                        <li><router-link :to="{ path: '/courses'}"><i class="fa fa-graduation-cap"></i> Courses&nbsp;<span>9</span></router-link></li>
                    </ul>
                </li>
                <li class="pull-right navbar-top"><router-link :to="{ path: '/dashboard'}"><i class="fab fa-wpforms"></i> Evaluation Forms</router-link></li>
            </template>
        </ul>
    </nav>
</template>
<script>
export default {
    name: 'app-header',
    props: ['toggled'],
    data() {
        return {
            // toggled: false,
        }
    },
    methods:{
        logout(){
            this.$store.commit('logout');
            this.$router.push('/login');
        },
        toggleSide() {
            this.$store.commit('toggle'); 
        }
    },
    computed:{
        currentUser(){
            if (this.$store.getters.currentUser == null)
                this.$router.push('/login');
            return this.$store.getters.currentUser;
        }
    },
    created() {
        this.toggled = this.$store.state.toggled;
    }
}
</script>
<style>

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

</style>