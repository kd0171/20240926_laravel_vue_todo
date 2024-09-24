<template>
  <li>
    <input type="checkbox" v-model="localCompleted" @change="updateTodo" />
    {{ todo.title }}
    <button @click="deleteTodo">Delete</button>
  </li>
</template>

<script>
import axios from 'axios';

export default {
  props: ['todo'],
  data() {
    return {
      localCompleted: this.todo.completed, // todoのcompletedをローカルデータとして扱う
    };
  },
  methods: {
    async updateTodo() {
      await axios.put(`/api/todos/${this.todo.id}`, { completed: this.localCompleted });
      this.$emit('update');
    },
    async deleteTodo() {
      await axios.delete(`/api/todos/${this.todo.id}`);
      this.$emit('delete');
    },
  },
};
</script>
