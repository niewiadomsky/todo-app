<template>
    <div class="space-y-2">
        <TaskCard v-for="task in tasks" :key="task.id" :task="task" :categories="categories" />
    </div>
</template>

<script setup lang="ts">
import type { Category, Task } from '@/types';
import TaskCard from './TaskCard.vue';

defineProps<{
    tasks: Task[]
    categories: Category[]
}>()
</script>

<style scoped>

</style>