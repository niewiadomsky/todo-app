<template>
    <div class="flex flex-col">
        <Link href="/" class="text-white hover:bg-blue-600 p-4">
            Wszystkie taski ({{ allTasksCount }})
        </Link>
        <Link href="/me" class="text-white hover:bg-blue-600 p-4">
            Moje taski ({{ userTasksCount }})
        </Link>
        <Link
            v-for="category in categories"
            :key="category.id"
            :href="`/categories/${category.id}`"
            class="text-white hover:bg-blue-600 p-4"
        >
            {{ category.name }} 
            {{
                category.tasks_count ? `(${category.tasks_count})` : ""
            }}
        </Link>
    </div>
</template>

<script setup lang="ts">
import type { Category } from "@/types";
import { Link } from "@inertiajs/vue3";

defineProps<{
    categories: Category[];
    userTasksCount: number;
    allTasksCount: number;
}>();
</script>

<style scoped></style>
