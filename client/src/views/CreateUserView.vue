<script setup>
    import CreateUserView from "../components/CreateUserForm.vue";

    const elements = ["Employee", "Superadmin"]
</script>

<template>
    <div>
        <h2 class="create-user-title">Create User</h2>
        <CreateUserView />
    </div>
</template>

<style scoped>
    .create-user-title {
        padding: 20px;
        text-align: center;
    }
</style>