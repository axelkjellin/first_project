<template>
    <div class="login">
        <b-row>
            <b-col></b-col>
            <b-col class="mx-auto" style="width:200px;margin-top:350px">
            <b-card title="Login">
                <b-card class="register-card-group">
                    <b-input placeholder="E-mail" style="margin-top:10px" v-model="user.email"/>
                    <b-input type="password" placeholder="Senha"  style="margin-top:10px" v-model="user.password" />
                    <b-button class="btn" variant="primary" style="margin-top:10px" @click="login()" >Login</b-button>
                </b-card>
            </b-card>
            </b-col><b-col>
            </b-col>
        </b-row>
   </div>
</template>

<script>

export default {
  name: "Login",
  data() {
    return {
      user:{
        email: '',
        password: ''
      }
    };
  },
  methods: {
    login() {
      this.$http.post('http://localhost:8000/api/login', this.user)
      .then(resp => {
        if(resp.data.token) {
          console.log('logado');
        } else {
          console.log('nao logou')
        }
      }).finally(e => {
        console.log(e)
      })
    }
  },
};
</script>

<style>
</style>

