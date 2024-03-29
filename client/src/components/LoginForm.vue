<script setup>
import { RouterLink, useRouter } from 'vue-router';
import { ref } from 'vue';
import { Field, Form, ErrorMessage } from "vee-validate"
import { valuesSchema } from "../services/form.validation.js";
import { useUserStore } from '@/stores/user';

const router = useRouter();
const { email, password } = valuesSchema;

const emailText = ref("");
const passwordText = ref("");
const showPassword = ref(false);
const schema = { email, password };

const userStore = useUserStore();

const handleSubmit = async () => {

    const response = await userStore.login({ email: emailText.value, password: passwordText.value });

    if(response) {
        router.push("/tasks");
    };
};

</script>

<template>
    <Form action="" @submit="handleSubmit" :validation-schema="schema" >

        <section class="login-form-section">

            <div class="login-input-container">
                <label for="email">Email</label>
                <Field v-model="emailText" type="email" name="email" id="email" class="login-input" />
                <ErrorMessage name="email" class="error" />
            </div>

            <div class="login-input-container">
                <label for="password">Password</label>
                <Field v-model="passwordText" :type="showPassword ? 'text' : 'password'" name="password" id="password"
                    class="login-input" />
                <ErrorMessage name="password" class="error" />
                
                <div class="login-form-show-password-container">
                    <input v-model="showPassword" type="checkbox" name="show-password" id="show-password">
                    <label class="login-form-lbl-show-password" for="show-password">Mostrar contraseña</label>
                </div>
            </div>

            <nav class="login-form-nav">
                <RouterLink to="reset-password">Olvidé mi contraseña</RouterLink>
            </nav>

            <button type="submit" class="login-form-btn">
                Iniciar Sesión
            </button>
        </section>
    </Form>
</template>

<style scoped>
.login-form-section {
    padding: 20px;
}

.login-input-container {
    display: flex;
    flex-direction: column;
    padding: 20px 0;
}

.login-input {
    padding: 10px;
    border: solid 1px;
}

.login-form-btn {
    border: 10px;
    background-color: var(--vt-c-indigo);
    padding: 10px;
    color: var(--vt-c-white-soft)
}

.login-form-lbl-show-password {
    margin-left: 5px;
}

.login-form-show-password-container {
    padding: 5px;
}

.login-form-nav {
    padding: 20px 0;
}

@media (min-width: 800px) {
    .login-form-section {
        padding: 50px;
    }
}
</style>