<script setup>
import { RouterLink, useRouter } from 'vue-router';

</script>

<template>
    <header class="header">
        <nav>
            <ul class="header-options">
                <RouterLink to="/login"> 
                    <li>Login</li>
                </RouterLink>
                <RouterLink to="/create-user"> 
                    <li>Create User</li>
                </RouterLink>
                <RouterLink to="/create-task"> 
                    <li>Create Task</li>
                </RouterLink>
                <RouterLink to="/tasks"> 
                    <li>Tasks</li>
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
</style>