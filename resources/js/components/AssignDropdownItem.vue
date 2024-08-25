<template>
    <div class="flex items-center gap-2 p-2 hover:bg-blue-200">
        <div class="w-8 h-8 border border-gray-600 rounded-full">
            <img
                v-if="user"
                :src="user.avatar_url"
                :alt="user.name"
                class="w-full h-full rounded-full"
            />
            <OhVueIcon
                v-else
                name="fa-user"
                class="w-full h-full p-1 text-gray-600"
            />
        </div>
        <div class="flex-1">
            {{ user?.name ?? 'Not assigned' }}
        </div>
        <div v-if="isAssigned">
            <OhVueIcon name="oi-check" class="w-8 h-8 text-blue-500" />
        </div>
    </div>
</template>

<script setup lang="ts">
import type { AssignedUser } from "@/types";
import { OhVueIcon } from 'oh-vue-icons';

defineProps<{
    user?: AssignedUser;
    isAssigned?: boolean;
}>();
</script>

<style scoped></style>
