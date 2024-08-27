<template>
    <div class="bg-blue-400 h-full flex flex-col">
        <UserSection :user="user" />
        <Categories class="flex-1"/>
        <Settings />
    </div>
</template>

<script setup lang="ts">
import UserSection from "./UserSection.vue";
import type { LoggedUser } from "@/types";
import Settings from './Settings.vue';
import Categories from './Categories.vue';

defineProps<{
    user: LoggedUser;
}>();
</script>

<style scoped></style>
