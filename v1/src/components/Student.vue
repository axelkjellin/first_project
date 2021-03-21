<template>
    <b-card >
        <b-card-header>
            Cadastro de Estudante
        </b-card-header>
        <div>
            <b-card>
                <b-form-group
                    id="name"
                    label="Nome do Estudante"
                    >
                    <b-form-input id="name" v-model="student.name" trim></b-form-input>
                </b-form-group>
                <b-form-group
                    id="gender"
                    label="Sexo"
                    >
                    <b-form-select id="gender" v-model="student.gender" :options="genders" trim></b-form-select>
                </b-form-group>
                <b-form-group
                    id="student_class"
                    label="Turma"
                    >
                    <b-select id="student_class" v-model="student.student_class_id" :options="classes" trim></b-select>
                </b-form-group>
                <b-form-group   
                    id="birthdate"
                    label="Data de Nascimento"
                    >
                    <b-calendar id="birthdate" v-model="student.birthdate" locale="pt-br"></b-calendar>
                </b-form-group>
                <b-form-group>
                    <b-button variant="primary" @click="saveStudent()" >Salvar</b-button>
                </b-form-group>
            </b-card>
        </div>
    </b-card>
</template>

<script>
// import api from '@/exports/api'

export default {
  name: "Student",
  props: ["currentUser"],
  data() {
    return {
      student: {
        name: "",
        birthdate: "",
        gender: "",
        student_class_id: ""
      },
      genders: [
        { value: "male", text: "Homen" },
        { value: "female", text: "Mulher" },
      ],
      classes: []
    };
  },
  beforeMount(){
      this.getClasses()
  },
  methods: {
    saveStudent() {
      this.$http
        .post(
          "http://localhost:8000/api/student",
          this.student,
          this.currentUser.authorization
        )
    },
    getClasses() {
      this.$http
        .get("http://localhost:8000/api/classes", {
            params: {
            },
            headers: {
                "Authorization": "Bearer " + this.currentUser.token,
                "Accept": "application/json",
                "cache-control": "no-cache"
            }
        })
        .then(resp => {
            this.classes = resp.body.map(item => {
                return { value: item.id, text: item.name }
            })
        });
    }
  },
};
</script>

<style scoped>
</style>
