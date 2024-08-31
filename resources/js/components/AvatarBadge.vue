<template>
    <div>
        <div
            class="w-10 h-10 rounded-full border border-gray-600 shadow-2xl relative"
        >
            <img
                v-if="user"
                class="w-full h-full rounded-full"
                :src="user.avatar_url"
                :title="user.name"
                :alt="user.name"
                @click="toggleDropdown"
            />
            <OhVueIcon
                v-else
                name="fa-user"
                class="w-full h-full p-2 text-gray-600"
                title="Not assigned"
                @click="toggleDropdown"
            />
            <OnClickOutside
                v-if="isOpenedDropdown"
                @trigger="hideDropdown"
                class="absolute right-0 top-10 z-10"
            >
                <AssignDropdown
                    :assigned-user="user"
                    v-model="user"
                    @update:model-value="hideDropdown"
                />
            </OnClickOutside>
        </div>
    </div>
</template>

<script setup lang="ts">
import type { AssignedUser } from "@/types";
import { OhVueIcon } from "oh-vue-icons";
import AssignDropdown from "./AssignDropdown.vue";
import { ref } from "vue";
import { OnClickOutside } from "@vueuse/components";

const user = defineModel<AssignedUser | null>();

const isOpenedDropdown = ref(false);
const toggleDropdown = () => {
    isOpenedDropdown.value = !isOpenedDropdown.value;
};

const hideDropdown = () => {
    if (isOpenedDropdown.value === true) {
        isOpenedDropdown.value = false;
    }
};
</script>

<style scoped></style>
