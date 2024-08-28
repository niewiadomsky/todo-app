<template>
    <select class="rounded-md p-2 border bg-blue-500 text-white focus:outline-gray-600">
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
}>();
</script>

<style scoped></style>
