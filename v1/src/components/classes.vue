<template>
     <b-card style="margin-top:25px">
        <b-card-header>
            Lista de Turmas
        </b-card-header>
        <div v-for="item in items" :key="item.id">
            <b-list-group-item>{{item.name}}</b-list-group-item>
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
