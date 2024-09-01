<template>
    <div class="flex justify-center items-center h-screen bg-slate-200">
        <div class="rounded-xl shadow-xl border p-4 border-gray-600 bg-white w-96">
            <h1 class="text-3xl my-4 text-center">Login</h1>
            <form
                @submit.prevent="form.post(baseUrl('/login'))"
                class="flex flex-col gap-4"
            >
                <div>
                    <input
                        v-model="form.email"
                        type="email"
                        placeholder="Email"
                        class="p-2 rounded-md border border-gray-600 w-full"
                        required
                    />
                    <div v-if="form.errors.email" class="text-red-500">{{ form.errors.email }}</div>
                </div>
                <div>
                    <input
                    v-model="form.password"
                        type="password"
                        placeholder="Password"
                        class="p-2 rounded-md border border-gray-600 w-full"
                        required
                    />
                    <div v-if="form.errors.password" class="text-red-500">{{ form.errors.password }}</div>
                </div>
                <div>
                    <input
                        type="submit"
                        value="Login"
                        class="p-2 mt-2 rounded-md bg-blue-600 text-white w-full"
                        :disabled="form.processing"
                    />
                </div>
            </form>
        </div>
    </div>
</template>

<script setup lang="ts">
import { baseUrl } from '@/helpers/url.helpers';
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    email: null,
    password: null,
});

</script>

<style scoped></style>
