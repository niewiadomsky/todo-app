<template>
    <div class="border border-gray-600 rounded-md w-64 bg-white">
        <div class="w-full border-b border-gray-600 px-4 py-2">
            <input
                class="text-sm focus:outline-none"
                type="text"
                v-model="searchTerm"
                placeholder="Assign to..."
            />
        </div>
        <div class="max-h-64 overflow-auto">
            <AssignDropdownItem
                :is-assigned="!assignedUser"
                @click="assignedUser = null"
            />
            <AssignDropdownItem
                v-for="user in users"
                :key="user.id"
                :user="user"
                :is-assigned="user.id === assignedUser?.id"
                @click="assignedUser = user"
            />
        </div>
    </div>
</template>

<script setup lang="ts">
import type { AssignedUser } from "@/types";
import { usePage } from "@inertiajs/vue3";
import { computed, ref } from "vue";
import AssignDropdownItem from "./AssignDropdownItem.vue";

const assignedUser = defineModel<AssignedUser | null>();

const {
    props: { defaultUsers },
} = usePage<{
    defaultUsers?: AssignedUser[];
}>();

const searchTerm = ref("");

const users = computed(() => {
    let users = defaultUsers ?? [];

    if (searchTerm.value) {
        return users.filter((user) =>
            user.name.toLowerCase().includes(searchTerm.value.toLowerCase())
        );
    }

    return users;
});
</script>

<style scoped></style>
