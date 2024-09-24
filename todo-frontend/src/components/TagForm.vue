<template>
  <form @submit.prevent="addTag">
    <input v-model="name" placeholder="New Tag" />
    <button type="submit">Add Tag</button>
  </form>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      name: '', // 新しいタグの名前
    };
  },
  methods: {
    async addTag() {
      if (this.name) {
        try {
          await axios.post('/api/tags', { name: this.name });
          this.$emit('tag-added'); // タグが追加されたことを親コンポーネントに通知
          this.name = ''; // 入力フィールドをクリア
        } catch (error) {
          console.error(error);
        }
      }
    },
  },
};
</script>
