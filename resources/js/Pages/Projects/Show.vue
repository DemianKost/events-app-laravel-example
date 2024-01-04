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
import {
    Chart,
    getDatasetAtEvent,
    getElementAtEvent,
    getElementsAtEvent
} from 'vue-chartjs';

let data = {
    labels: [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    ],
    datasets: [
        {
            label: 'Data One',
            backgroundColor: '#6b32a8',
            data: [40, 20, 12, 39, 10, 40, 39, 80, 40, 20, 12, 11]
        }
    ]
};

let options = {
    responsive: true,
    maintainAspectRation: false
};

defineProps({
    project: {
        type: Object,
        required: true
    }
});
</script>