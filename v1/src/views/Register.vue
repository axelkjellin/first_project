<template>
    <div class="register">
        <b-row>
            <b-col></b-col>
            <b-col class="mx-auto" style="width:200px;margin-top:250px">
            <b-card title="Register an Account">
                <b-card class="register-card-group">
                    <b-input type="text" placeholder="Name" style="margin-top:10px" v-model="user.name"/>
                    <b-input type="text" placeholder="E-mail" style="margin-top:10px" v-model="user.email"/>
                    <b-input type="password" placeholder="Password"  style="margin-top:10px" v-model="user.password"/>
                    <b-input type="password" placeholder="Password"  style="margin-top:10px" v-model="user.passwordConfirmation"/>
                    <span v-if="!isValidPassword && user.passwordConfirmation">Password is not the same</span>
                    <b-button-group>
                        <b-button variant="primary" style="margin-top:10px" @click="register()">Register</b-button>
                        <b-button class="btn" variant="primary" style="margin-top:10px" href="/">Login</b-button>
                    </b-button-group>
                </b-card>
            </b-card>
            </b-col><b-col>
            </b-col>
        </b-row>
   </div>
</template>

<script>
import redirect from "@/exports/redirect";

export default {
  name: "Register",
  data() {
    return {
      user: {
        name: null,
        email: null,
        password: null,
        passwordConfirmation: null
      }
    };
  },
  methods: {
    register() {
      this.$http
        .post("http://localhost:8000/api/register", this.user)
        .then(resp => {
          if (resp.status == 201) {
            return redirect('');
          }
        });
    }
  },
  computed: {
    isValidPassword() {
      return this.user.passwordConfirmation == this.user.password;
    }
  }
};
</script>

<style>
.register-card-group {
  margin-top: 10px;
}
</style>