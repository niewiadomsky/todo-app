<template>
    <div
        class="fixed h-screen w-screen top-0 left-0 z-10 inset-0 flex items-center justify-center bg-black bg-opacity-50"
        @click.self="$emit('cancel')"
    >
        <div class="bg-white rounded-lg p-4">
            <slot />
            <div class="flex justify-between pt-4">
                <button
                    class="px-4 py-2 border border-gray-600 rounded-md"
                    @click="$emit('cancel')"
                >
                    Cancel
                </button>
                <button
                    class="px-4 py-2 bg-blue-600 rounded-md text-white"
                    @click="$emit('save')"
                >
                    Save
                </button>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts"></script>

<style scoped></style>
