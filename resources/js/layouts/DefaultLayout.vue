<template>
    <div class="flex h-screen">
        <Drawer class="w-72" :user="user"/>
        <div class="p-4 flex-1 overflow-auto">
            <slot/>
        </div>
    </div>
</template>

<script setup lang="ts">
import Drawer from '@/components/drawer/Drawer.vue';
import type { LoggedUser } from '@/types';
import { usePage } from '@inertiajs/vue3';

const {props: {user}} = usePage<{
    user: LoggedUser
}>()

</script>

<style scoped>

</style>