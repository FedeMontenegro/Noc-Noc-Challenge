<script>
import { ref } from 'vue';

const commentText = ref("");
let files = [];

const handleFileChange = (event) => {
    files = Array.from(event.target.files);
}

</script>

<template>
    <form @submit.prevent="submitComment">
        <section class="create-comment-container">
            <div class="create-comment-input-container">
                <input class="create-comment-text" v-model="commentText" placeholder="Write your comment here">
                <div class="create-comment-file-container">
                    <input class="create-comment-file" type="file" @change="handleFileChange" multiple>
                    <button class="create-comment-btn create-comment-upload-files-btn" type="button">+</button>
                </div>
            </div>
            <button class="create-comment-btn" type="submit">Send</button>
        </section>
        </form>
</template>

<style scoped>
.create-comment-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.create-comment-input-container {
    align-items: center;
    display: flex;
    flex: 0.8;
    position: relative;
}

.create-comment-text {
    border: solid 1px var(--vt-c-divider-dark-1);
    border-radius: 20px;
    margin: 5px;
    padding: 12px 10px;
    width: 100%;
}

.create-comment-file-container {
    position: absolute;
    right: 0px;
}

.create-comment-file {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
}

.create-comment-btn {
    border: 10px;
    background-color: var(--vt-c-indigo);
    flex: 0.2;
    margin: 10px;
    padding: 10px;
    color: var(--vt-c-white-soft)
}

.create-comment-upload-files-btn {
    border-radius: 50px;
    padding: 10px 13px;
}
</style>