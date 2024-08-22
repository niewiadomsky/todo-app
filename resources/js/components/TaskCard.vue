<template>
    <label
        :for="checkboxId"
        class="border border-gray-600 rounded-lg p-4 flex items-center cursor-pointer hover:bg-blue-200 transition-colors"
    >
        <div class="mr-4">
            <Checkbox
                :id="checkboxId"
                v-model="task.is_completed"
                class="w-8 h-8"
            />
        </div>
        <div :class="{
            'line-through decoration-2': task.is_completed
        }">
            {{ task.title }}
        </div>
    </label>
</template>

<script setup lang="ts">
import type { Task } from "@/types";
import Checkbox from "./Checkbox.vue";
import { computed } from "vue";

const props = defineProps<{
    task: Task;
}>();

const checkboxId = computed(() => `checkbox-${props.task.id}`);
</script>

<style scoped></style>
