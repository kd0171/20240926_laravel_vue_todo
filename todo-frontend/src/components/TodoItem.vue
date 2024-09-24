<template>
  <li>
    <input type="checkbox" v-model="localCompleted" @change="updateTodo" />
    {{ todo.title }}
    <button @click="deleteTodo">Delete</button>

        <!-- タグを表示 -->
    <ul>
      <li v-for="tag in todo.tags" :key="tag.id">{{ tag.name }}</li>
    </ul>

    <!-- タグの追加 -->
    <div>
      <input v-model="newTag" placeholder="Add a tag" @keyup.enter="addTag" />
      <button @click="addTag">Add Tag</button>
    </div>
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
    async addTag() {
      if (this.newTag) {
        await axios.post(`/api/todos/${this.todo.id}/tags`, { name: this.newTag });
        this.newTag = ''; // 入力をクリア
        this.$emit('update'); // リスト更新
      }
    },
  },
};
</script>
