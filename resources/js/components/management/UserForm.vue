<template>
    <ResourceModal v-if="show" @cancel="handleCancel" @save="handleSave">
        <!-- <form @submit.prevent="handleSave"> -->
            <h2 class="text-lg mb-4">
                {{ user ? `Edit user #${user.id}` : "Add user" }}
            </h2>
            <TextInput
                v-model="form.name"
                type="text"
                label="Name"
                :error="form.errors.name"
            />
            <TextInput
                v-model="form.email"
                type="email"
                label="Email"
                :error="form.errors.email"
            />
            <TextInput
                v-model="form.password"
                type="password"
                label="Password"
                :error="form.errors.password"
                :hint="user && 'Leave blank to keep the same'"
            />
        <!-- </form> -->
    </ResourceModal>
</template>

<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";
import TextInput from "./TextInput.vue";
import ResourceModal from "./ResourceModal.vue";
import type { User } from "@/types";
import { watch } from "vue";
import { baseUrl } from '@/helpers/url.helpers';

const props = defineProps<{
    user?: User;
    show: boolean;
}>();

const emit = defineEmits(["cancel"]);

const form = useForm({
    name: "",
    email: "",
    password: "",
});

watch(
    () => props.user,
    (user) => {
        form.name = user?.name ?? "";
        form.email = user?.email ?? "";
    }
);

const handleCancel = () => {
    emit("cancel");
    form.clearErrors();
};

const handleSave = () => {
    const options = {
        onSuccess: () => {
            emit("cancel");
            form.reset();
        },
    };

    if (props.user) {
        form.put(baseUrl(`/users/${props.user.id}`), options);
    } else {
        form.post(baseUrl("/users"), options);
    }
};
</script>

<style scoped></style>
