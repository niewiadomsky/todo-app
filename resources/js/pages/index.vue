<template>
    <div class="text-3xl font-bold underline">
        Hello World
    </div>
</template>

<script setup lang="ts">
import { defineProps } from 'vue'
import type { Task } from '@/types'

const props = defineProps<{
    tasks: Task[]
}>()

console.log(props.tasks);
</script>

<style scoped>

</style>