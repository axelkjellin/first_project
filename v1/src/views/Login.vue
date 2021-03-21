<template>
  <b-container class="fluid">
    <div class="login">
      <b-row>
          <b-col></b-col>
          <b-col class="mx-auto" style="width:200px;margin-top:250px">
            <b-card title="Login">
                <b-card class="register-card-group">
                    <b-input placeholder="E-mail" style="margin-top:10px" v-model="user.email"/>
                    <b-input type="password" placeholder="Senha"  style="margin-top:10px" v-model="user.password" />
                    <b-button-group>
                      <b-button class="btn" variant="primary" style="margin-top:10px" @click="login()" >Login</b-button>
                      <b-button class="btn" variant="primary" style="margin-top:10px" href="/register">Register</b-button>
                    </b-button-group>
                </b-card>
            </b-card>
          </b-col><b-col>
          </b-col>
      </b-row>
    </div>
  </b-container>
</template>

<script>
import redirect from "@/exports/redirect";
import api from '@/exports/api'

export default {
  name: "Login",
  data() {
    return {
      user: {
        email: "",
        password: ""
      }
    };
  },
  methods: {
    login() {
      this.$http
        .post( api() + "login", this.user)
        .then(resp => {
          if (resp.data.token) {
            sessionStorage.setItem("session", JSON.stringify(resp.data));
          } else {
            redirect("login");
          }
        })
        .finally(() => {
          this.$router.push('home')
        });
    }
  }
};
</script>

<style>
</style>

