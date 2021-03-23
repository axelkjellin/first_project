<template>
     <b-card style="margin-top:25px">
        <b-card-header>
            Lista de Alunos
        </b-card-header>
         <div v-for="item in items" :key="item.id">
           <b-list-group-item class="d-flex justify-content-between align-items-center">
            <b-input v-model="item.name" />
            <b-select id="student_class" v-model="item.student_class_id" :options="allClasses" trim></b-select>
            <b-button-group>
                <b-button size="sm" variant="outline-primary" @click="updateStudent(item)">Salvar</b-button>
                <b-button size="sm" variant="outline-danger" @click="deleteStudent(item)">Excluir</b-button>
            </b-button-group>
          </b-list-group-item>
        </div>
    </b-card>
</template>


<script>
export default {
  name: "Students",
  props: ["currentUser"],
  data() {
    return {
      students: [],
      allClasses: []
    };
  },
  beforeMount() {
    this.getStudents();
    this.getClasses();
  },
  methods: {
    getStudents() {
      this.$http
        .get("http://localhost:8000/api/student", {
          params: {},
          headers: {
            Authorization: "Bearer " + this.currentUser.token,
            Accept: "application/json",
            "cache-control": "no-cache"
          }
        })
        .then(resp => {
          this.students = resp.body;
        });
    },
    updateStudent(item) {
      this.$http
        .put(
          `http://localhost:8000/api/student/${item.id}`,
          item,
          this.currentUser.authorization
        )
        .then(() => {
          this.getStudents();
        });
    },
    deleteStudent(item) {
      this.$http
        .delete(`http://localhost:8000/api/student/${item.id}`, {
          headers: {
            Authorization: "Bearer " + this.currentUser.token,
            Accept: "application/json",
            "cache-control": "no-cache"
          }
        })
        .then(() => {
          this.getStudents();
        });
    },
    getClasses() {
      this.$http
        .get("http://localhost:8000/api/classes", {
          params: {},
          headers: {
            Authorization: "Bearer " + this.currentUser.token,
            Accept: "application/json",
            "cache-control": "no-cache"
          }
        })
        .then(resp => {
          this.allClasses = resp.body.map(item => {
            return { value: item.id, text: item.name };
          });
        });
    }
  },
  computed: {
    items() {
      return this.students;
    },
  }
};
</script>
