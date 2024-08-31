<template>
    <div
        class="border-t border-gray-600"
    >
        <Link
            v-for="({ label, icon, href }, idx) in settings"
            :key="idx"
            :href="href"
            class="flex flex-row gap-4 items-center p-2 text-white hover:bg-blue-600"
        >
            <OhVueIcon :name="icon" scale="1.8" />
            <p>
                {{ label }}
            </p>
        </Link>
    </div>
</template>

<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
import { OhVueIcon } from "oh-vue-icons";

const settings = [
    {
        label: "Users management",
        icon: "fa-users",
        href: "/users",
    },
    {
        label: "Categories management",
        icon: "fa-list",
        href: "/categories",
    },
];
</script>

<style scoped></style>
