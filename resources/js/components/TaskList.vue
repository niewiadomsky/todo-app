<template>
    <div class="space-y-2">
        <TaskCard v-for="task in tasks" :key="task.id" :task="task" />
    </div>
</template>

<script setup lang="ts">
import type { Task } from '@/types';
import TaskCard from './TaskCard.vue';

defineProps<{
    tasks: Task[]
}>()
</script>

<style scoped>

</style>