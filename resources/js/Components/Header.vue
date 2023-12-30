<script setup>
import { defineProps, ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

defineProps({
    heading: {
        type: String,
        required: true
    },
    message: {
        type: String,
        required: true
    }
});

const form = useForm({
    name: ''
});

const submit = () => {
    form.post(route('projects:store'), {
        preserveState: true,
        preserveScroll: true,
        onSuccess: () => {
            formOpen.value = false;
        }
    })
};

const formOpen = ref(false);
</script>

<template>
    <section>
        <div class="border-b border-gray-200 pb-3 flex items-center justify-between">
            <h3 class="text-gray-300 uppercase">{{ heading }}</h3>
            <button @click.prevent="formOpen = !formOpen;form.name = null;" class="text-sm bg-blue-500 text-white px-4 py-2 rounded-md">{{ message }}</button>
        </div>
        <form @submit.prevent="submit" v-if="formOpen" class="mt-4 flex">
            <input type="text" v-model="form.name" class="w-5/6 border-b pb-2 mr-2 rounded-md text-md text-white bg-transparent placeholder:text-gray-600" placeholder="Enter project name" />
            <button type="submit" class="w-1/6 text-white bg-gray-700 rounded-md">Create</button>
        </form>
    </section>
</template>