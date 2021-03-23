<template>
<div id="form">
    <b-container class="fluid">
        <h1  style="text-align:right;margin-top:30;">
            Olá {{currentUser.name}}
        </h1> 
        <h6 style="text-align:right;margin-bottom:30px;">
            <b-button size="sm" @click="logout()">logout</b-button>
        </h6>
        <b-row>
            <b-col>
                <Student :currentUser="currentUser" />
            </b-col>
            <b-col >
                <Class :currentUser="currentUser" @clicked="onClickChild"/>
                <Classes :currentUser="currentUser" :reloadClass="onClickChild"/>
            </b-col>
        </b-row>
        <b-row>
            <b-col >
                <Students :currentUser="currentUser"/>
            </b-col>
        </b-row>
    </b-container>
</div>
</template>

<script>
import Student from "../components/Student.vue";
import Students from "../components/Students.vue";
import Classes from "../components/Classes.vue";
import Class from "../components/Class.vue";
import redirect from "@/exports/redirect";

export default {
  name: "Home",
  components: {
    Student,
    Students,
    Class,
    Classes
  },
  data() {
    return {
      currentUser: null,
      reloadClasses: false
    };
  },
  mounted() {
    this.getCurrentUser(sessionStorage.getItem("session"));
  },
  methods: {
    getCurrentUser(session) {
      if (session) {
        this.currentUser = JSON.parse(session);
        this.getAuthorization();
      } else {
        redirect();
      }
    },
    logout() {
      sessionStorage.clear();
      redirect();
    },
    getAuthorization() {
      this.currentUser.authorization = {
        headers: { authorization: "Bearer " + this.currentUser.token }
      };
    },
    onClickChild(value) {
        if(value) {
            return true
        }
    }
  }
};
</script>

<style scoped>
</style>

