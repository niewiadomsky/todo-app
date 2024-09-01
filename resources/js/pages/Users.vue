<template>
    <DefaultLayout>
        <UserForm
            :show="openedForm"
            :user="selectedUser"
            @cancel="openedForm = false"
        />
        <ResourceTable
            :columns="columns"
            :resources="users"
            header="Users"
            @add="openAddForm"
        >
            <template #actions="{ resource }">
                <div class="text-center space-x-3">
                    <OhVueIcon
                        name="hi-solid-pencil-alt"
                        class="w-6 h-6 hover:text-green-500"
                        @click="openEditForm(resource)"
                    />
                    <Link
                        :href="baseUrl(`/users/${resource.id}`)"
                        as="button"
                        method="delete"
                    >
                        <OhVueIcon
                            name="fa-trash"
                            class="w-6 h-6 hover:text-red-500"
                        />
                    </Link>
                </div>
            </template>
        </ResourceTable>
    </DefaultLayout>
</template>

<script setup lang="ts">
import ResourceTable from '@/components/management/ResourceTable.vue';
import UserForm from '@/components/management/UserForm.vue';
import { baseUrl } from '@/helpers/url.helpers';
import DefaultLayout from '@/layouts/DefaultLayout.vue';
import type { User } from '@/types';
import { Link } from '@inertiajs/vue3';
import { format } from 'date-fns';
import { OhVueIcon } from 'oh-vue-icons';
import { ref } from 'vue';

defineProps<{
    users: User[]
}>();


const openedForm = ref(false);
const selectedUser = ref<User | undefined>(undefined);

const openAddForm = () => {
    selectedUser.value = undefined;
    openedForm.value = true;
};

const openEditForm = (user: User) => {
    console.log(user);
    selectedUser.value = user;
    openedForm.value = true;
};

const columns = [
    {
        key: 'id',
        label: 'ID',
    },
    {
        key: 'name',
        label: 'Name',
    },
    {
        key: 'email',
        label: 'Email',
    },
    {
        key: 'created_at',
        label: 'Created at',
        format: (date: string) => format(new Date(date), 'yyyy-MM-dd HH:mm:ss'),
    },
    {
        key: 'updated_at',
        label: 'Updated at',
        format: (date: string) => format(new Date(date), 'yyyy-MM-dd HH:mm:ss'),
    }
];

</script>

<style scoped>

</style>