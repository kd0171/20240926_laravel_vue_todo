<template>
  <form @submit.prevent="addTodo">
    <input v-model="title" placeholder="New Todo" />
    <button type="submit">Add</button>
  </form>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      title: '',
    };
  },
  methods: {
    async addTodo() {
      await axios.post('/api/todos', { title: this.title });
      this.title = '';
      this.$emit('add');
    },
  },
};
</script>
