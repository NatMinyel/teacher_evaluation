<template>
    <div id="sidebar-wrapper" ref="sidebarwrapper">
        <ul id="sidebar-nav" ref="sidebarnav" class="sidebar-nav">
            <li ref="first" :class="active == 'eval' ? 'active' : ''"><router-link :to="{ path: '/dashboard'}" id="my_forms_link"><i class="fab fa-wpforms"></i> <span v-bind:class="{ 'notVisible': toggled }" id="my_forms">My Forms</span></router-link></li>
            <li :class="active == 'statistics' ? 'active' : ''"><router-link :to="{ path: '/statistics'}" id="statistics_link"><i class="fa fa-chart-bar"></i> <span v-bind:class="{ 'notVisible': toggled }" id="statistics">Statistics</span></router-link></li>
            <li :class="active == 'course' ? 'active' : ''"><router-link :to="{ path: '/courses'}" id="courses_link"><i class="fa fa-graduation-cap"></i> <span v-bind:class="{ 'notVisible': toggled }" id="courses">Courses</span></router-link></li>
        </ul>
    </div>
</template>
<script>
import Vue from 'vue';
import SidebarButton from "./SidebarButton";
export default {
    methods: {
        handleScroll(event) {
            var top = event.srcElement.scrollingElement.scrollTop;
            var sidebarnav = this.$refs.sidebarnav;
            var sidebarwrapper = this.$refs.sidebarwrapper;
            if (top > 35) {
                sidebarnav.insertBefore(this.instance.$el, sidebarnav.firstChild);
                sidebarwrapper.style.top = "0px";
            } else {
                if (sidebarnav.firstChild == this.instance.$el) {
                    sidebarnav.removeChild(sidebarnav.firstChild);
                    sidebarwrapper.style.top = "60px";
                }
            }
        }, 
        toggleSide() {
            this.$store.commit('toggle'); 
        }
    },
    data() {
        return {
            toggled: false,
            instance: null
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
      },
    
    },
    props: ['active'],
    created() {
        this.toggled = this.$store.state.toggled;
        window.addEventListener("scroll", this.handleScroll);
        var Comp = Vue.extend(SidebarButton);
        var store =this.$store;
        var instance = new Comp({store, propsData: {}});
        instance.$mount();
        this.instance = instance;
    }, 
    destroyed() {
        window.removeEventListener('scroll', this.handleScroll);
    }
}
</script>
<style>
 .notVisible {
     display: none;
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