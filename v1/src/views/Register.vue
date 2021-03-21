<template>
    <div class="register">
        <b-row>
            <b-col></b-col>
            <b-col class="mx-auto" style="width:200px;margin-top:350px">
            <b-card title="Register an Account">
                <b-card class="register-card-group">
                    <b-input type="text" placeholder="Name" style="margin-top:10px" v-model="user.name"/>
                    <b-input type="text" placeholder="E-mail" style="margin-top:10px" v-model="user.email"/>
                    <b-input type="password" placeholder="Password"  style="margin-top:10px" v-model="user.password"/>
                    <b-input type="password" placeholder="Password"  style="margin-top:10px" v-model="user.passwordConfirmation"/>
                    <span v-if="!isValidPassword && user.passwordConfirmation">Password is not the same</span>
                    <div>
                        <b-button variant="primary" style="margin-top:10px" @click="register()">Register</b-button>
                    </div>
                </b-card>
            </b-card>
            </b-col><b-col>
            </b-col>
        </b-row>
   </div>
</template>

<script>
export default {
    name: 'Register',
    data(){
        return {
            user: {
                name: null,
                email: null,
                password: null,
                passwordConfirmation: null
            }
        }
    },
    methods: {
        register(){
            this.$http.post('http://localhost:8000/api/register', this.user)
        }
    },
    computed:{
        isValidPassword()
        {
            return this.user.passwordConfirmation == this.user.password
        }
    }
}
</script>

<style>
.register-card-group{
    margin-top:10px
}

</style>