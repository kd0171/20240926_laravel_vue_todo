<template>
  <div>
    <h1>Sample</h1>
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

        <!-- タグの追加フォーム -->
    <tag-form @tag-added="fetchTodos"></tag-form>
  </div>
</template>

<script>
import axios from 'axios';
import TodoItem from './TodoItem.vue';
import TodoForm from './TodoForm.vue';
import TagForm from './TagForm.vue';

export default {
  components: { TodoItem, TodoForm, TagForm },
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
