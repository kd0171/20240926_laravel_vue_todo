<template>
  <div>
    <h1>Todo List</h1>
    <ul>
      <todo-item
        v-for="todo in todos"
        :key="todo.id"
        :todo="todo"
        @update="fetchTodos"
        @delete="fetchTodos"
      ></todo-item>
    </ul>
    <todo-form @add="fetchTodos"></todo-form>
  </div>
</template>

<script>
import axios from 'axios';
import TodoItem from './TodoItem.vue';
import TodoForm from './TodoForm.vue';

export default {
  components: { TodoItem, TodoForm },
  data() {
    return {
      todos: [],
    };
  },
  methods: {
    async fetchTodos() {
      const response = await axios.get('/api/todos');
      this.todos = response.data;
    },
  },
  mounted() {
    this.fetchTodos();
  },
};
</script>
