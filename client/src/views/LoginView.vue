<script setup>
import Login from '@/components/Login.vue';
import Welcome from '@/components/Welcome.vue';
</script>

<template>
    <div class="home-container">
        <Welcome />
        <Login />
    </div>
</template>

<style scoped>

@media (min-width: 800px) {
    .home-container {
        align-items: center;
        display: grid;
        grid-template-columns: 1fr 1fr;
        padding: 0 2rem;
    }
}
</style>