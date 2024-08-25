<template>
    <div
        class="w-10 h-10 rounded-full border border-gray-600 shadow-2xl relative"
    >
        <img
            v-if="user"
            class="w-full h-full rounded-full"
            :src="user.avatar_url"
            :title="user.name"
            :alt="user.name"
            @click="handleClick"
        />
        <OhVueIcon
            v-else
            name="fa-user"
            class="w-full h-full p-2 text-gray-600"
            title="Not assigned"
            @click="handleClick"
        />
        <OnClickOutside v-if="isOpenedDropdown" @trigger="handleClickOutside" class="absolute translate-x-1/2 right-1/2 top-10 z-10">
            <AssignDropdown :assigned-user="user"/>
        </OnClickOutside>
    </div>
</template>

<script setup lang="ts">
import type { AssignedUser } from "@/types";
import { OhVueIcon } from "oh-vue-icons";
import AssignDropdown from "./AssignDropdown.vue";
import { ref } from "vue";
import { OnClickOutside } from '@vueuse/components';

defineProps<{
    user?: AssignedUser;
}>();

const isOpenedDropdown = ref(false);
const handleClick = () => {
    isOpenedDropdown.value = !isOpenedDropdown.value
}

const handleClickOutside = () => {
    if (isOpenedDropdown.value === true) {
        isOpenedDropdown.value = false
    }
}
</script>

<style scoped></style>
