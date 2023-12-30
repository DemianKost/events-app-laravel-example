<template>
    <Application>
        <Container>
            
            <div></div>

        </Container>
    </Application>
</template>

<script setup>
import { defineProps } from 'vue';
import Application from '@/Layouts/Application.vue';
import Container from '@/Components/Container.vue';

defineProps({
    project: {
        type: Object,
        required: true
    }
});
</script>