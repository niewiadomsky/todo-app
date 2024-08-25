<template>
    <div
        class="border border-gray-600 rounded-lg p-4 flex items-center cursor-pointer hover:bg-blue-200 transition-colors gap-5"
    >
        <div>
            <Checkbox
                :id="checkboxId"
                v-model="task.is_completed"
                class="w-8 h-8"
            />
        </div>
        <label
            :for="checkboxId"
            :class="[
                'flex-1',
                {
                    'line-through decoration-2': task.is_completed,
                },
            ]"
        >
            {{ task.title }}
        </label>
        <AvatarBadge :user="task.assigned_user" />
        <div class="text-sm text-gray-600">
            {{ relativeDate }}
        </div>
    </div>
</template>

<script setup lang="ts">
import type { Task } from "@/types";
import Checkbox from "./Checkbox.vue";
import { computed } from "vue";
import AvatarBadge from "./AvatarBadge.vue";
import { formatRelative } from "date-fns";

const props = defineProps<{
    task: Task;
}>();

const checkboxId = computed(() => `checkbox-${props.task.id}`);

const relativeDate = computed(() =>
    formatRelative(new Date(props.task.created_at), new Date())
);
</script>

<style scoped></style>
