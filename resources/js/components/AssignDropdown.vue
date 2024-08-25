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
            <AssignDropdownItem :is-assigned="!assignedUser" />
            <AssignDropdownItem
                v-for="user in users"
                :key="user.id"
                :user="user"
                :is-assigned="user.id === assignedUser?.id"
            />
        </div>
    </div>
</template>

<script setup lang="ts">
import type { AssignedUser } from "@/types";
import { usePage } from "@inertiajs/vue3";
import { computed, ref } from "vue";
import AssignDropdownItem from "./AssignDropdownItem.vue";

const { assignedUser } = defineProps<{
    assignedUser?: AssignedUser;
}>();

const {
    props: { defaultUsers },
} = usePage<{
    defaultUsers?: AssignedUser[];
}>();

const searchTerm = ref("");

const users = computed(() => {
    let users = defaultUsers ?? [];

    if (searchTerm.value) {
        // search 
    }

    // TODO to small refactor
    const isAssignedUserInUsers = users.find(
        (user) => user.id === assignedUser?.id
    );

    if (assignedUser && !isAssignedUserInUsers) {
        users.unshift(assignedUser);
    } else if (assignedUser) {
        users = users.filter((user) => user.id !== assignedUser.id);
        users.unshift(assignedUser);
    }

    return users;
});
</script>

<style scoped></style>
