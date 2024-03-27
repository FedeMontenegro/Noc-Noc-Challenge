<script setup>
import { ref } from 'vue';
import { Field, Form, ErrorMessage } from "vee-validate"
import { valuesSchema } from "../services/form.validation.js";

const { email, role } = valuesSchema;

const emailText = ref("");
const roleText = ref("");

const schema = { email, role }
const elements = ["Employee", "Superadmin"]

const handleSubmit = () => {
    console.log("Handle Submit", emailText.value, roleText.value);
}
</script>

<template>
    <Form action="" @submit="handleSubmit" :validation-schema="schema">

        <section class="create-user-form-section">

            <div class="create-user-form-input-container">
                <label for="email">Email</label>
                <Field 
                    class="create-user-form-input" 
                    type="email" 
                    name="email" 
                    id="email"
                    v-model="emailText"
                />
                <ErrorMessage class="error" name="email" />
            </div>
            
            <div class="create-user-form-select-container">
                <label for="role">Role</label>
                <Field 
                    class="create-user-form-select" 
                    name="role" 
                    id="role" 
                    v-model="roleText"
                    as="select"
                >
                    <option value="">Choice an option</option>
                    <option 
                        :value="element" 
                        v-for="(element, key) in elements" 
                        :key="key"
                    >
                        {{ element }}
                    </option>
                </Field>
                <ErrorMessage class="error" name="role" />
            </div>

            <button class="create-user-btn" type="submit">
                Create user
            </button>
        </section>
    </Form>
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