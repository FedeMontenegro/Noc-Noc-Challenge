<script setup>
import { ref } from 'vue';
import { Field, Form, ErrorMessage } from "vee-validate";
import { valuesSchema } from "../services/form.validation.js";

const { title, description, assignedTo, status } = valuesSchema;

const elements = ["John Doe", "Vinicius", "Cristiano", "Lionel", "Angelito"]

const titleText = ref("");
const descriptionText = ref("");
const assignedToSelected = ref("")
const statusText = ref("")

const schema = { title, description, assignedTo, status };

const handleSubmit = () => {
    console.log(
        "Handle Submit: ",
        titleText.value,
        descriptionText.value,
        assignedToSelected.value,
        statusText.value
    );
}
</script>

<template>
    <Form action="" @submit="handleSubmit" :validation-schema="schema">

        <section class="create-task-form-section">
            <div class="create-task-form-input-container">

                <label for="title">Title</label>
                <Field class="create-task-form-input" type="text" name="title" id="title" v-model="titleText" />
                <ErrorMessage name="title" class="error" />
            </div>

            <div class="create-task-form-input-container">

                <label for="description">Description</label>
                <Field class="create-task-form-input create-task-form-input-textarea" name="description"
                    id="description" v-model="descriptionText" as="textarea" />
                <ErrorMessage name="description" class="error" />

            </div>

            <div class="create-task-form-select-container">

                <div class="create-task-form-input-container">

                    <label for="assignedTo">Assigned To</label>
                    <Field class="create-task-form-select" name="assignedTo" id="assignedTo"
                        v-model="assignedToSelected" as="select">
                        <option value="">Choice an option</option>
                        <option :value="element" v-for="(element, key) in elements" :key="key" :item="element">
                            {{ element }}
                        </option>
                    </Field>
                    <ErrorMessage name="assignedTo" class="error" />
                </div>

                <div class="create-task-form-input-container">

                    <label for="status">Status</label>
                    <Field class="create-task-form-select" name="status" id="status" v-model="statusText" as="select">
                        <option value="">Choice an option</option>
                        <option :value="element" v-for="(element, key) in elements" :key="key" :item="element">
                            {{ element }}
                        </option>
                    </Field>
                    <ErrorMessage name="status" class="error"/>
                </div>
            </div>

            <button class="create-task-btn" type="submit">
                Create Task
            </button>
        </section>
    </Form>
</template>

<style scoped>
.create-task-form-section {
    border: solid 2px var(--vt-c-divider-dark-1);
    padding: 20px;
    max-width: 500px;
    margin: 20px auto;
}

.create-task-form-input-container {
    display: flex;
    flex-direction: column;
    padding: 10px;
}

.create-task-form-select-container {
    display: flex;
    justify-content: space-around;
}

.create-task-form-select {
    padding: 10px 5px;
}

.create-task-btn {
    border: 10px;
    background-color: var(--vt-c-indigo);
    padding: 10px;
    color: var(--vt-c-white-soft);
    margin: 20px;
}

.create-task-form-input {
    padding: 10px;
    border: solid 1px;
}

.create-task-form-input-textarea {
    height: 200px;
    padding: 0;
    resize: none;
    padding: 10px;
    border: solid 1px;
}
</style>