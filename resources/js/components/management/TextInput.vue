<template>
    <div>
        <label v-if="label" class="block mb-1 text-gray-600">{{ label }}</label>
        <input
            :type="type"
            class="border border-gray-600 rounded-md px-2 py-1 w-full"
            v-model="model"
        />
        <p class="text-sm text-gray-600 mt-1" v-if="hint">{{ hint }}</p>
        <p class="text-red-500" v-if="error">{{ error }}</p>
    </div>
</template>

<script setup lang="ts">
withDefaults(
    defineProps<{
        type: "text" | "number" | "password" | "email";
        label?: string;
        placeholder?: string;
        error?: string;
        hint?: string;
    }>(),
    {
        type: "text",
    }
);

const model = defineModel<string>();
</script>

<style scoped></style>
