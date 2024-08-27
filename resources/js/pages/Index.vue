<template>
    <DefaultLayout>
        <TaskList :tasks="tasks" />
    </DefaultLayout>
</template>

<script setup lang="ts">
import type { AssignedUser, Task } from '@/types'
import TaskList from '@/components/TaskList.vue';
import DefaultLayout from '@/layouts/DefaultLayout.vue';

const props = defineProps<{
    tasks: Task[],
    defaultUsers: AssignedUser[]
}>()

console.log(props.tasks);
</script>

<style scoped>

</style>