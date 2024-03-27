<script setup>
    import { ref } from 'vue';

    const elements = ["Employee", "Superadmin"]
</script>

<template>
    <form action="" @submit.prevent="handleSubmit">
        <section class="create-user-form-section">
            <div class="create-user-form-input-container">
                <label  for="email">Email</label>
                <input class="create-user-form-input" type="email" name="email" id="email">
            </div>
            
            <div class="create-user-form-select-container">
                <label for="role">Role</label>
                <select class="create-user-form-select" name="role" id="role">
                    <option value="" v-for="(element, key) in elements" :key="key" :item="element">
                        {{ element }}
                    </option>
                </select>
            </div>

            <button class="create-user-btn" type="button">Create user</button>
        </section>
    </form>
</template>

<style scoped>
.create-user-form-section {
    border: solid 2px var(--vt-c-divider-dark-1);
    padding: 20px;
    max-width: 500px;
    margin: 20px auto;
}

.create-user-form-input-container {
    display: flex;
    flex-direction: column;
    padding: 10px;
}

.create-user-form-select-container {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    padding: 10px;
}

.create-user-form-select {
    border: solid 1px;
    padding: 10px 5px;
}

.create-user-btn {
    border: 10px;
    background-color: var(--vt-c-indigo);
    padding: 10px;
    color: var(--vt-c-white-soft);
    margin: 20px;
}

.create-user-form-input {
    padding: 10px;
    border: solid 1px;
}

.create-user-form-input-textarea {
    height: 200px;
    padding: 0;
    resize: none;
    padding: 10px;
    border: solid 1px;
}

</style>