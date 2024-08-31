<template>
    <select
        class="rounded-md p-2 border bg-blue-500 text-white focus:outline-gray-600"
        v-model="model"
        :disabled="disabled"
    >
        <option :value="null">Uncategorized</option>
        <option
            v-for="category in categories"
            :key="category.id"
            :value="category.id"
        >
            {{ category.name }}
        </option>
    </select>
</template>

<script setup lang="ts">
import type { Category } from "@/types";

defineProps<{
    categories: Category[];
    disabled?: boolean;
}>();

const model = defineModel<number | null>();
</script>

<style scoped></style>
