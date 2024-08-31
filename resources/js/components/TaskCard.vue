<template>
    <div>
        <form
            class="border border-gray-600 rounded-lg p-4 flex items-center cursor-pointer hover:bg-blue-200 transition-colors gap-5"
            :class="{ 'border-red-500': form.hasErrors }"
        >
            <div>
                <Checkbox
                    :id="checkboxId"
                    v-model="form.is_completed"
                    class="w-8 h-8"
                    :disabled="form.processing"
                    @update:model-value="updateTask"
                />
            </div>
            <label
                :for="checkboxId"
                :class="[
                    'flex-1',
                    {
                        'line-through decoration-2': form.is_completed,
                    },
                ]"
            >
                {{ task.title }}
            </label>
            <p v-if="task.estimated_minutes" class="text-sm text-gray-600">
                ETA {{ task.estimated_minutes }} min
            </p>
            <p v-else class="text-sm text-gray-600">No ETA</p>
            <CategorySelect
                :categories="categories"
                v-model="form.category_id"
                @update:model-value="updateTask"
                :disabled="form.processing"
            />
            <AvatarBadge
                v-model="form.assigned_user"
                :disabled="form.processing"
                @update:model-value="updateTask"
            />
            <div class="text-sm text-gray-600">
                {{ relativeDate }}
            </div>
            <button
                type="button"
                @click="deleteTask"
                :disabled="form.processing"
            >
                <OhVueIcon
                    name="fa-trash"
                    class="w-6 h-6 hover:text-red-500 disabled:text-blue-600"
                />
            </button>
        </form>
        <div v-if="form.hasErrors" class="mt-2">
            <p
                v-for="(error, index) in form.errors"
                :key="index"
                class="text-red-500"
            >
                {{ error }}
            </p>
        </div>
    </div>
</template>

<script setup lang="ts">
import type { Category, Task, TaskProperty } from "@/types";
import Checkbox from "./Checkbox.vue";
import AvatarBadge from "./AvatarBadge.vue";
import { formatRelative } from "date-fns";
import CategorySelect from "./CategorySelect.vue";
import { useForm } from "@inertiajs/vue3";
import { OhVueIcon } from "oh-vue-icons";
import { computed } from "vue";

const props = defineProps<{
    task: Task;
    categories: Category[];
}>();

const form = useForm(props.task);

const checkboxId = computed(() => `checkbox-${props.task.id}`);

const relativeDate = computed(() =>
    formatRelative(new Date(props.task.created_at), new Date())
);

const updateTask = () => {
    form.transform((data) => {
        data.assigned_to = data.assigned_user?.id ?? null;

        const dirtyFields: Partial<Task> = {};

        for (const [key, value] of Object.entries(data) as [
            TaskProperty,
            any
        ][]) {
            if (data[key] !== props.task[key]) {
                dirtyFields[key] = value;
            }
        }

        console.log({ data, dirtyFields });
        return dirtyFields;
    }).patch(`/tasks/${props.task.id}`, {
        onSuccess: () => {
            form.clearErrors();
        },
        onError: () => {
            form.reset();
        },
    });
};

const deleteTask = async () => {
    form.delete(`/tasks/${props.task.id}`);
};
</script>

<style scoped></style>
