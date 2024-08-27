<template>
    <div class="bg-blue-400 h-full flex flex-col">
        <UserSection :user="user" />
        <Categories
            class="flex-1"
            :categories="categories"
            :userTasksCount="userTasksCount"
            :allTasksCount="allTasksCount"
        />
        <Settings />
    </div>
</template>

<script setup lang="ts">
import UserSection from "./UserSection.vue";
import type { Category, LoggedUser } from "@/types";
import Settings from "./Settings.vue";
import Categories from "./Categories.vue";

defineProps<{
    user: LoggedUser;
    categories: Category[];
    userTasksCount: number;
    allTasksCount: number;
}>();
</script>

<style scoped></style>
