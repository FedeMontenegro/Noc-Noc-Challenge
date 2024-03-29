<script setup>
import { RouterLink, useRouter } from 'vue-router';
import { computed } from 'vue';
import { useUserStore } from '@/stores/user';

const storeUser = useUserStore();
const router = useRouter();
const isLoggedIn = computed(() => storeUser.getIsLoggedIn);

const handleLogout = async () => {
    const response = await storeUser.logout();

    if (response) {
        router.push("/login");
    }
};

</script>

<template>
    <header class="header">
        <nav>
            <ul class="header-options">
                <div v-show="!isLoggedIn">
                    <RouterLink to="/login">
                        <li class="header-options-item">Login</li>
                    </RouterLink>
                </div>
                <div v-show="isLoggedIn">
                    <li class="header-options-item" @click="handleLogout">Logout</li>
                </div>
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