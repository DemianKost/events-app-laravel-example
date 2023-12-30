<template>
    <Application>
        <Container>
            <Header
                heading="Your team projects"
            />
            <div class="mt-5">

                <div v-for="project in projects" :key="project.id" class="w-full shadow-sm bg-gray-800 rounded-md p-3 mb-2">
                    <h2 class="text-2xl">{{ project.name }}</h2>
                </div>

            </div>
        </Container>
    </Application>
</template>

<script setup>
import { defineProps } from 'vue';
import Application from '@/Layouts/Application.vue';
import Container from '@/Components/Container.vue';
import Header from '@/Components/Header.vue';

defineProps({
    projects: {
        type: Array,
        required: true
    }
});
</script>