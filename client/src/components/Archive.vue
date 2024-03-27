<script setup>
const elements = [1, 2, 3, 4, 5];
</script>

<template>
    <li class="archive-container"  v-for="(element, index) in elements" :key="index" :item="element">
        <span class="archive-name">Archive name</span>
    </li>
</template>

<style scoped>
.archive-container {
    background-color: var(--vt-c-text-dark-2);
    margin: 10px;
    padding: 5px 10px;
    max-width: 200px;
}

.archive-name {
    font-size: 12px;
    font-weight: 400;
}
</style>