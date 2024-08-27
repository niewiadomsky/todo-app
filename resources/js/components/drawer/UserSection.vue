<template>
    <div class="flex items-center p-3 bg-blue-600 border-b border-gray-600">
        <div class="w-16 h-16 border border-gray-600 rounded-full">
            <img :src="user.avatar_url" :alt="`${user.name} avatar`" class="rounded-full w-full h-full">
        </div>
        <div class="pl-4 text-white leading-4 text-lg flex-1">
            {{ user.name }}
        </div>
        <LogoutButton />
    </div>
</template>

<script setup lang="ts">
import type { LoggedUser } from '@/types';
import LogoutButton from '@/components/drawer/LogoutButton.vue';

defineProps<{
    user: LoggedUser
}>()

</script>

<style scoped>

</style>