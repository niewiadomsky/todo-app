<template>
    <ResourceModal v-if="show" @cancel="handleCancel" @save="handleSave">
        <form @submit.prevent="handleSave">
            <h2 class="text-lg mb-4">
                {{
                    category ? `Edit Category #${category.id}` : "Add Category"
                }}
            </h2>
            <TextInput
                v-model="form.name"
                type="text"
                label="Name"
                :error="form.errors.name"
            />
        </form>
    </ResourceModal>
</template>

<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";
import TextInput from "./TextInput.vue";
import ResourceModal from "./ResourceModal.vue";
import type { Category } from "@/types";
import { watch } from "vue";
import { baseUrl } from '@/helpers/url.helpers';

const props = defineProps<{
    category?: Category;
    show: boolean;
}>();

const emit = defineEmits(["cancel"]);

const form = useForm({
    name: "",
});

watch(
    () => props.category,
    (category) => {
        form.name = category?.name ?? "";
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

    if (props.category) {
        form.patch(baseUrl(`/categories/${props.category.id}`), options);
    } else {
        form.post(baseUrl("/categories"), options);
    }
};
</script>

<style scoped></style>
