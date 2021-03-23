<template>
     <b-card style="margin-top:25px">
        <b-card-header>
            Lista da Turmas
        </b-card-header>
        <div v-for="item in items" :key="item.id">
           <b-list-group-item class="d-flex justify-content-between align-items-center">
            <b-input v-model="item.name" />
            <b-button-group>
                <b-button size="sm" variant="outline-primary" @click="updateClass(item)">Salvar</b-button>
                <b-button size="sm" variant="outline-danger" @click="deleteClass(item)">Excluir</b-button>
            </b-button-group>
          </b-list-group-item>
        </div>
    </b-card>
</template>

<script>
export default {
  name: 'Classes',
  props: ['currentUser', 'reloadClasses'],
  data() {
    return {
      classes: null
    };
  },
  beforeMount() {
    this.getClasses();
  },
  methods: {
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
            this.classes = resp.body
        });
    },
    updateClass(item) {
      this.$http.put(`http://localhost:8000/api/classes/${item.id}`, item , this.currentUser.authorization).then(() => {
        this.getClasses()
      })
    },
    deleteClass(item) {
      this.$http.delete(`http://localhost:8000/api/classes/${item.id}`,{
            headers: {
                "Authorization": "Bearer " + this.currentUser.token,
                "Accept": "application/json",
                "cache-control": "no-cache"
            }
        }).then(() => {
        this.getClasses()
      })
    }
  },
  computed: {
      items() {
          return this.classes
      },
      hasNewClass() {
          console.log('eai?')
          return this.reloadClasses == true ? this.getClasses() : null;
      }
  }
};
</script>