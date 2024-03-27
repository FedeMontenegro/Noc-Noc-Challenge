<script setup>
import CommentsList from "./CommentsList.vue";
import CreateComment from "./CreateComment.vue";
</script>

<template>
    <article class="task-card">

        <div class="task-card-info-container">
            <mark class="task-card-status">status</mark>
            <small class="task-card-assigned-to"> assigned to: John Doe</small>
        </div>

        <div class="task-card-a">
            <a href="">Delete Task</a>
        </div>

        <h3 class="task-card-title">Task title</h3>

        <p class="task-card-content">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Exercitationem sapiente, temporibus voluptatibus cupiditate
            a tempore, voluptates facilis unde totam amet reprehenderit
            itaque minus? Magnam rem laudantium architecto cupiditate nemo mollitia.
        </p>

        <CommentsList />
        <CreateComment />
        
    </article>
</template>

<style scoped>
.task-card {
    border: solid 1px gray;
    margin: 10px;
    max-width: 500px;
}

.task-card-status {
    background-color: greenyellow;
    padding: 0 5px;
}

.task-card-title {
    font-weight: 600;
    padding: 20px;
}

.task-card-a {
    margin: 20px 10px auto auto;
    width: fit-content;
}

.task-card-content {
    padding: 20px;
}

.task-card-assigned-to {
    color: var(--vt-c-divider-dark-1);
}

.task-card-info-container {
    align-items: center;
    display: flex;
    justify-content: space-between;
    padding: 0 5px;
}
</style>