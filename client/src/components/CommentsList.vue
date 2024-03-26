<script setup>
import Comment from "./Comment.vue";
import { ref } from "vue";

const showComments = ref(false);

const toggleComments = () => {
    showComments.value = !showComments.value;
}

</script>

<template>
    <h4 class="task-card-comments-title" @click="toggleComments">Comments</h4>

    <ul class="task-card-comments-list" v-if="showComments">
        <Comment />
    </ul>
</template>

<style scoped>
.task-card-comments-list {
    
}

.task-card-comments-title {
    cursor: pointer;
    font-weight: 500;
    padding: 20px;
}
</style>