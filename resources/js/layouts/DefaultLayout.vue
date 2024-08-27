<template>
    <div class="flex h-screen">
        <Drawer
            class="w-72"
            :user="user"
            :categories="categories"
            :userTasksCount="user_tasks_count"
            :allTasksCount="all_tasks_count"
        />
        <div class="p-4 flex-1 overflow-auto">
            <slot />
        </div>
    </div>
</template>

<script setup lang="ts">
import Drawer from "@/components/drawer/Drawer.vue";
import type { Category, LoggedUser } from "@/types";
import { usePage } from "@inertiajs/vue3";

const {
    props: { user, categories, user_tasks_count, all_tasks_count },
} = usePage<{
    user: LoggedUser;
    categories: Category[];
    user_tasks_count: number;
    all_tasks_count: number;
}>();
</script>

<style scoped></style>
