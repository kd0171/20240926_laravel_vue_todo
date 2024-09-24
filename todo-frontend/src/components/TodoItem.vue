<template>
  <li>
    <input type="checkbox" v-model="todo.completed" @change="updateTodo" />
    {{ todo.title }}
    <button @click="deleteTodo">Delete</button>
  </li>
</template>

<script>
import axios from 'axios';

export default {
  props: ['todo'],
  methods: {
    async updateTodo() {
      await axios.put(`/api/todos/${this.todo.id}`, { completed: this.todo.completed });
      this.$emit('update');
    },
    async deleteTodo() {
      await axios.delete(`/api/todos/${this.todo.id}`);
      this.$emit('delete');
    },
  },
};
</script>
