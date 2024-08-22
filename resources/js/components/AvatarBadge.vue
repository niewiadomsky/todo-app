<template>
    <div class="w-10 h-10 rounded-full border border-gray-600 shadow-2xl">
        <img v-if="user" class="w-full h-full rounded-full" :src="user.avatar_url" :title="user.name" :alt="user.name">
        <OhVueIcon v-else name="fa-user" class="w-full h-full p-2 text-gray-600" title="Not assigned"/>
    </div>
</template>

<script setup lang="ts">
import type { AssignedUser } from '@/types';
import { OhVueIcon } from 'oh-vue-icons';

defineProps<{
    user?: AssignedUser
}>()

</script>

<style scoped>

</style>