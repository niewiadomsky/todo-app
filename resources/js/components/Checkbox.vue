<template>
    <label class="block rounded-full border w-4 h-4 border-gray-600 cursor-pointer">
        <div v-if="model" class="bg-blue-500 w-full h-full rounded-full flex justify-center align-center">
            <OhVueIcon name="oi-check" class="w-full h-full text-white" />
        </div>
        <input type="checkbox" :id="id" :checked="model" @change="handleChangeInput" hidden/>
    </label>
</template>

<script setup lang="ts">
import { OhVueIcon } from 'oh-vue-icons';

defineProps<{
    id?: string
}>()

    const model = defineModel<boolean>();

    const handleChangeInput = (event: Event) => {
        model.value = (<HTMLInputElement>event.target).checked
    }

</script>

<style scoped>

</style>