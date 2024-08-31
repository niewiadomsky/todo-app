<template>
    <div class="group border rounded-lg border-gray-600">
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
            <input type="number" placeholder="Estimated time" class="p-4 outline-none" v-model="form.estimated_time" />
            <CategorySelect :categories="categories" v-model="form.category_id" />
            <AvatarBadge />
            <button type="submit">
                <OhVueIcon
                    name="io-send"
                    class="w-6 h-6 text-blue-600 hover:text-blue-400"
                />
            </button>
        </form>
    </div>
</template>

<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import AvatarBadge from "./AvatarBadge.vue";
import { OhVueIcon } from "oh-vue-icons";
import type { Category } from "@/types";
import CategorySelect from "./CategorySelect.vue";

defineProps<{
    categories: Category[];
}>();

const form = useForm({
    title: null,
    assigned_to: null,
    category_id: null,
    estimated_time: null,
});

const inputRef = ref<HTMLInputElement | null>(null);

const handleClick = () => {
    inputRef.value?.focus();
};

const addTask = () => {
    form.post("/tasks")
};


</script>

<style scoped></style>
