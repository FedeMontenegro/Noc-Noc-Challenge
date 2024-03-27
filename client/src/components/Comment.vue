<script setup>
import Archive from "./Archive.vue";

const elements = [1, 2, 3, 4, 5];
</script>

<template>
        <li class="task-card-comment-content-item" v-for="(element, index) in elements" :key="index" :item="element">

            <span class="task-card-comment-username">User name</span>
            <p class="task-card-comment-content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Exercitationem sapiente, temporibus voluptatibus cupiditate
                a tempore, voluptates facilis unde totam amet reprehenderit
                itaque minus? Magnam rem laudantium architecto cupiditate nemo mollitia.
            </p>

            <hr>
            <div>
                <h4 class="task-card-comments-title">Attachments</h4>
                <ul class="task-card-attachments-list">
                    <Archive />
                </ul>
            </div>
        </li>
</template>

<style scoped>
.task-card-comment-content-item {
    border: solid 0.5px var(--vt-c-divider-dark-1);
    margin: 10px;
    padding: 10px;
}

.task-card-comment-content-item:hover {
    cursor: pointer;
}

.task-card-comment-username {
    padding: 10px;
    font-size: 15px;
    font-weight: 500;
}

.task-card-comment-content {
    font-size: 14px;
    font-weight: 300;
    color: var(--vt-c-black-mute);
}

.task-card-attachments-list {
    display: flex;
    flex-wrap: wrap;
}

hr {
    border-top: solid 1px var(--vt-c-text-dark-2);
    border-bottom: none;
    margin: 20px 0;
}

</style>