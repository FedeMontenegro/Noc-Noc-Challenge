<script setup>
import TaskCard from "../components/TaskCard.vue";
import { RouterLink, useRouter } from 'vue-router';

const elements = [1, 2, 3, 4, 5]
</script>

<template>
    <header class="tasks-view-header">
        <h1 class="tasks-view-title">Tasks</h1>
        <RouterLink to="/create-task">
            <button class="tasks-view-btn" type="button">Create Task</button>
        </RouterLink>
    </header>
    
    <section class="task-view-section">
        <TaskCard v-for="(element, index) in elements" :key="index" :item="element" />
    </section>
</template>

<style scoped>
.tasks-view-header {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    padding: 30px;
}

.tasks-view-title {
}

.tasks-view-btn {
    border: 10px;
    background-color: var(--vt-c-indigo);
    font-size: 18px;
    padding: 10px;
    color: var(--vt-c-white-soft);
}

.task-view-section {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
}

@media (min-width: 500px) {
    .tasks-view-header {
        flex-direction: row;
    }

}
</style>