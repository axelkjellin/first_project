<template>
    <b-card >
        <b-card-header>
            Cadastro de Turma
        </b-card-header>
        <div>
            <b-card>
                <b-form-group
                    id="name"
                    label="Nome do Turma"
                    >
                    <b-form-input id="input-1" v-model="student_class.name" trim></b-form-input>
                </b-form-group>
                <b-form-group>
                    <b-button variant="primary" v-on:click="onClickButton" @click="saveClass">Salvar</b-button>
                </b-form-group>
            </b-card>
        </div>
    </b-card>
</template>
<script>
export default {
  name: "Class",
  props: ["currentUser"],
  data() {
    return {
      student_class: {
        name: ""
      },
    };
  },
  methods: {
    saveClass() {
      this.$http
        .post(
          "http://localhost:8000/api/classes",
          this.student_class,
          this.currentUser.authorization
        )
        .then(() => {
          this.student_class.name = "";
        });
    },
    onClickButton () {
      this.$emit('clicked', true)
    }
  }
};
</script>
