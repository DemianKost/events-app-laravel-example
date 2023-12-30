<template>
    <Application>
        <Container>
            <Header
                heading="Your team projects"
                message="Create project"
            />
            <div class="mt-5">

                <Link
                    v-for="project in projects"
                    :key="project.id"
                    :href="route('projects:show', project.id)"
                    class="flex items-center justify-between w-full shadow-sm bg-gray-800 rounded-md p-3 mb-2"
                >
                    <h2 class="text-2xl">{{ project.name }}</h2>
                    <p class="flex items-center text-xs bg-green-800 text-green-400 py-1 px-2 rounded-sm">
                        {{ project.status }}
                    </p>
                </Link>

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