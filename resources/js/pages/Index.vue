<template>
    <div class="p-4">
        <TaskList :tasks="tasks" />
    </div>
</template>

<script setup lang="ts">
import type { AssignedUser, Task } from '@/types'
import TaskList from '@/components/TaskList.vue';

const props = defineProps<{
    tasks: Task[],
    defaultUsers: AssignedUser[]
}>()

console.log(props.tasks);
</script>

<style scoped>

</style>