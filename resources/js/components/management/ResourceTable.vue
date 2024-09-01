<template>
    <div>
        <h1 v-if="header" class="text-4xl mb-4 mt-8">{{ header }}</h1>

    <div class="py-2 flex justify-end">
        <button type="button" class="bg-blue-600 rounded-md px-2 py-1 text-white border border-gray-600 hover:bg-blue-500" @click="$emit('add')">
            Add resource
        </button>
    </div>
        <div class="border rounded-md border-gray-400">
            <table class="w-full">
                <thead>
                    <tr>
                        <th
                            v-for="column in columns"
                            :key="column.key"
                            class="px-4 py-2"
                        >
                            {{ column.label }}
                        </th>
                        <th v-if="$slots.actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="resource in resources"
                        :key="resource.id"
                        class="odd:bg-blue-100"
                    >
                        <td
                            v-for="column in columns"
                            :key="column.key"
                            class="px-4 py-2"
                        >
                            {{
                                column.format
                                    ? column.format(resource[column.key])
                                    : resource[column.key]
                            }}
                        </td>
                        <td v-if="$slots.actions" class="px-4 py-2">
                            <slot name="actions" :resource="resource" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup lang="ts">
import type { ResourceTableColumn } from "@/types";

defineProps<{
    columns: ResourceTableColumn[];
    resources: any[];
    header?: string;
}>();
</script>

<style scoped></style>
