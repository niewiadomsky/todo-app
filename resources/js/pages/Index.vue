<template>
    <DefaultLayout>
        <TaskForm class="mb-4" :categories="categories" :default-category-id="defaultCategoryId"/>
        <TaskList :tasks="tasks" :categories="categories" />
    </DefaultLayout>
</template>

<script setup lang="ts">
import type { AssignedUser, Category, Task } from "@/types";
import TaskList from "@/components/TaskList.vue";
import DefaultLayout from "@/layouts/DefaultLayout.vue";
import TaskForm from "@/components/TaskForm.vue";

const props = defineProps<{
    tasks: Task[];
    categories: Category[];
    defaultCategoryId?: number;
}>();

console.log(props.tasks);
</script>

<style scoped></style>
