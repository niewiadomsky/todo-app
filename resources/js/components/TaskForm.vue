<template>
    <div>
        <div class="group border rounded-lg border-gray-600" :class="{ 'border-red-500': form.hasErrors }">
            <form
                @submit.prevent="addTask"
                class="group-has-[input:focus]:border-blue-300 group-has-[input:focus]:border-4 border-4 border-transparent rounded-lg flex items-center gap-10 pr-4 cursor-pointer"
                @click.self="handleClick"
            >
                <input
                    type="text"
                    ref="inputRef"
                    placeholder="Add a task..."
                    class="p-4 bg-transparent border-none outline-none flex-1"
                    v-model="form.title"
                />
                <input
                    type="number"
                    placeholder="Estimated time"
                    class="p-4 outline-none"
                    v-model="form.estimated_minutes"
                />
                <CategorySelect
                    :categories="categories"
                    v-model="form.category_id"
                />
                <AvatarBadge v-model="form.assigned_user" />
                <button type="submit">
                    <OhVueIcon
                        name="io-send"
                        class="w-6 h-6 text-blue-600 hover:text-blue-400"
                    />
                </button>
            </form>
        </div>
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
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import AvatarBadge from "./AvatarBadge.vue";
import { OhVueIcon } from "oh-vue-icons";
import type { Category, Task } from "@/types";
import CategorySelect from "./CategorySelect.vue";

const props = defineProps<{
    categories: Category[];
    defaultCategoryId?: number;
}>();

const form = useForm<Partial<Task>>({
    title: '',
    assigned_to: undefined,
    category_id: props.defaultCategoryId,
    estimated_minutes: undefined,
    assigned_user: undefined
});

const inputRef = ref<HTMLInputElement | null>(null);

const handleClick = () => {
    inputRef.value?.focus();
};

const addTask = () => {

    if (form.processing) {
        return;
    }

    form.transform((data) => {
        data.assigned_to = data.assigned_user?.id ?? null;
        return data;
    }).post("/tasks", {
        onSuccess: () => {
            form.reset();
            inputRef.value?.focus();
        }
    });
};
</script>

<style scoped></style>
