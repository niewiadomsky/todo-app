<template>
    <Link :href="baseUrl('/logout')" method="post" as="button">
        <OhVueIcon
            name="md-logout"
            class="text-white hover:scale-110"
            scale="1.5"/>
        </Link>
</template>

<script setup lang="ts">
import { baseUrl } from '@/helpers/url.helpers';
import { Link } from "@inertiajs/vue3";
import { OhVueIcon } from "oh-vue-icons";
</script>

<style lang="scss" scoped></style>
