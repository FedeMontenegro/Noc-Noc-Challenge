<template>
    <header class="welcome-header">
        <h1 class="welcome-title">Bienvenido!</h1>
    </header>
</template>

<style scoped>
    .welcome-header {
        align-items: center;
        display: none;
        justify-content: center;
        width: 100%;
        height: 100%;
    }

    .welcome-title {
        font-size: 1.7rem;
    }

    @media (min-width: 800px) {
        .welcome-header {
            display: flex;
        }
    }
</style>