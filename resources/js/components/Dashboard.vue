<template>
    <div class='limiter'>
    <Header v-bind:toggled="toggled" />
    <div id="wrapper" v-bind:class="{ 'toggled': toggled} ">
        <Sidebar v-bind:toggled="toggled" v-bind:active="active" />
        <div id="page-content-wrapper">
            <div class="main">
                <div class="container-dashboard">
                    <div class="wrap-dashboard">
                        <div class="dashboard-card">
                            <span class="dashboard-card-title">
                                <a href="./FillEvaluationForm.html" style="text-decoration: none; color: inherit;">Evaluation Form 1</a>
                            </span>
        
                            <div class="dashboard-description">
                                This is a description for the whole stuff the backend sends and the frontend receives in json format. To send the data, we will use the following technologies: Laravel PHP, JWT Auth
                                This is a description for the whole stuff the backend sends and the frontend receives in json format. To send the data, we will use the following technologies: Laravel PHP, JWT Auth
                            </div>
                        </div>
                        <div class="container-dashboard-card-btn">
                            <button class="dashboard-card-btn card-view">
                                <a href="./EvaluationDetails.html">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </button>
                            <button class="dashboard-card-btn card-edit">
                                <a href="./EditBaseEvaluationForm.html">
                                    <i class="fa fa-pen"></i>
                                </a>
                            </button>
                            <button class="dashboard-card-btn card-delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="container-dashboard">
                    <div class="wrap-dashboard">
                        <div class="dashboard-card">
                            <span class="dashboard-card-title">
                                Create A New Form
                            </span>
                            <div class="dashboard-create-form">
                                <a href="./CreateEvaluationForm.html"><div class="dashboard-create-body"><i class="fa fa-plus dashboard-create-icon"></i></div></a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    </div>
</template>
<script>
    import Header from './parts/Header.vue';
    import Sidebar from './parts/Sidebar.vue';
    export default {
      data() {
        return {
          toggled: false,
          active: "eval"
        }
      },
      computed:{
          currentUser(){
            return this.$store.getters.currentUser;
          },
          retoggled() {
            return this.$store.state.toggled;
          }
        }, 
        watch: {
          retoggled(newT, oldT) {
            return this.toggled = newT; 
          }
        },
      components: {
          Header, Sidebar
      }, 
      created() {
        this.toggled = this.$store.state.toggled;
      }
    }
</script>
<style>

button {
	outline: none !important;
	border: none;
	background: transparent;
}

button:hover {
	cursor: pointer;
}

a {
  text-decoration: none;
  color: inherit;
}

.container-dashboard {
  display: flex;
  flex-wrap: wrap;
  margin: 1.5%;
  position: relative;
  background-color: #fff;
  width: 30%;
  min-width: 275px;
  float: left;
  transition: all 0.5s ease;
}

.wrap-dashboard {
  height: 300px;
  width: 100%;
  background: #fff;
  border-radius: 20px;
  overflow: hidden;
  z-index: auto;
  box-shadow: 4px 12px 20px 0px rgba(0, 0, 0, 0.1);
}



.dashboard-card {
  width: 100%;
  position: relative;
  padding-top: 100px;
  padding-left: 20px;
  padding-right: 20px;
}

.dashboard-card-title {
  font-family: 'Text Me One', sans-serif;
  font-size: 25px;
  color: #fff;
  line-height: 1.2;
  text-align: center;
  overflow: hidden;
  display: block;
  position: absolute;
  width: 100%;
  height: 90px;
  top: 0;
  left: 0;
  background-color: #383838;
  padding-top: 30px;
  padding-bottom: 20px;
}


.container-dashboard-card-btn {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  /* margin: 5px; */
  margin-bottom: 15px;
  width: 100%;
  position: absolute;
  bottom: 0;
}

.dashboard-card-btn {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
  width: 51px;
  height: 50px;
  background-color: #983857;
  border-radius: 25px;

  margin-left: 10px;
  margin-right: 10px;
  font-weight: 700;
  font-size: 15px;
  color: #fff;
  line-height: 1.2;
  text-transform: uppercase;

  transition: all 0.4s;
}

.dashboard-card-btn:hover {
  background-color: #2d1435;
}
@media (max-width: 576px) {
  .dashboard-card {
    padding-left: 15px;
    padding-right: 15px;
  }
}


.dashboard-description {
  height: 123px;
  overflow: hidden;
}

.dashboard-create-form {
  height: 200px;
  overflow: hidden;
}

.dashboard-create-body {
  background-color: rgb(221, 221, 221); 
  margin-top: 5%; 
  margin-left: 20%; 
  width: 150px; 
  height: 150px; 
  text-align: center; 
  border-radius: 50%;
  transition: all 0.3s ease;

  color: #383838;
}

.dashboard-create-body:hover {
  background-color: rgb(235, 235, 235); 
  width: 175px; 
  height: 175px;
  margin-top: 0;
  margin-left: 12%;
}
.dashboard-create-body:hover .dashboard-create-icon{
  font-size: 11.5em;

}
.dashboard-create-icon {
  font-size: 10em;
  margin-top: -5px; 
  transition: all 0.3s ease;
}

.card-view {
  background-color: green;
}

.card-edit {
  background-color: #e6e600;
}
.card-delete {
  background-color: red;
}


</style>