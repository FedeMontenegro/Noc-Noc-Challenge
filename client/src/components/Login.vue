<script setup>
    import LoginForm from "./LoginForm.vue";
</script>

<template>
    <div class="login-container">
        <h1 class="login-title">Login</h1>
        <LoginForm />
    </div>
</template>

<style scoped>
    .login-container {
        border: solid 1px var(--vt-c-text-dark-2);
    }

    .login-title {
        text-align: center;
        font-size: 1.7rem;
        padding: 30px 0;
    }
    
    @media (min-width: 800px) {
        .login-container {
            margin: 20px;
        }
        
    }
</style>