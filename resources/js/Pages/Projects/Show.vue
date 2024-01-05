<template>
    <Application>
        <Container>
            
            <section class="py-6">
                <Chart
                    type="bar"
                    :data="data"
                    :options="options"
                />
            </section>

        </Container>
    </Application>
</template>

<script setup>
import { defineProps } from 'vue';
import Application from '@/Layouts/Application.vue';
import Container from '@/Components/Container.vue';
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'
import {
    Chart,
    getDatasetAtEvent,
    getElementAtEvent,
    getElementsAtEvent
} from 'vue-chartjs';
import { data, options } from './chart';

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

defineProps({
    project: {
        type: Object,
        required: true
    }
});
</script>