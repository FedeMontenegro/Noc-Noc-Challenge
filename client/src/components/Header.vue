<script setup>
import { RouterLink, useRouter } from 'vue-router';

</script>

<template>
    <header class="header">
        <nav>
            <ul class="header-options">
                <RouterLink to="/login"> 
                    <li class="header-options-item">Login</li>
                </RouterLink>
                <RouterLink to="/create-user"> 
                    <li class="header-options-item">Create User</li>
                </RouterLink>
                <RouterLink to="/create-task"> 
                    <li class="header-options-item">Create Task</li>
                </RouterLink>
                <RouterLink to="/tasks"> 
                    <li class="header-options-item">Tasks</li>
                </RouterLink>
            </ul>
        </nav>
    </header>
</template>

<style scoped>
.header {
    padding: 10px;
    
}

.header-options {
    align-items: center;
    display: flex;
    justify-content: space-evenly;
}

.header-options-item {
    color: var(--vt-c-black-soft);
}
</style>