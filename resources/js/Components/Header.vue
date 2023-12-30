<script setup>
import { defineProps } from 'vue';

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
</script>

<template>
    <section>
        <div class="border-b border-gray-200 pb-3 flex">
            <h3 class="text-gray-300">{{ heading }}</h3>
        </div>
    </section>
</template>