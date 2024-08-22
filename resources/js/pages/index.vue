<template>
    <div class="p-4">
        <TaskList :tasks="tasks"/>
    </div>
</template>

<script setup lang="ts">
import { defineProps } from 'vue'
import type { Task } from '@/types'
import TaskList from '@/components/TaskList.vue';

const props = defineProps<{
    tasks: Task[]
}>()

console.log(props.tasks);
</script>

<style scoped>

</style>