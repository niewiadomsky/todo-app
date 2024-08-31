<template>
    <div class="flex flex-col">
        <Link href="/" class="text-white hover:bg-blue-600 p-4">
            All tasks ({{ allTasksCount }})
        </Link>
        <Link href="/me" class="text-white hover:bg-blue-600 p-4">
            My tasks ({{ userTasksCount }})
        </Link>
        <Link
            v-for="category in limitedCategories"
            :key="category.id"
            :href="`/categories/${category.id}`"
            class="text-white hover:bg-blue-600 p-4"
        >
            {{ category.name }} 
            {{
                category.tasks_count ? `(${category.tasks_count})` : "(0)"
            }}
        </Link>
    </div>
</template>

<script setup lang="ts">
import type { Category } from "@/types";
import { Link } from "@inertiajs/vue3";
import { computed } from 'vue';

const props = defineProps<{
    categories: Category[];
    userTasksCount: number;
    allTasksCount: number;
}>();

const limitedCategories = computed(() => {
    return props.categories.slice(0, 10);
})
</script>

<style scoped></style>
