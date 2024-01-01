<script setup>
import ApiTokenManager from '@/Pages/API/Partials/ApiTokenManager.vue';
import Application from '@/Layouts/Application.vue';
import Container from '@/Components/Container.vue';

defineProps({
    tokens: Array,
    availablePermissions: Array,
    defaultPermissions: Array,
});
</script>

<template>
    <Application title="API Tokens">
        <Container>
            <div>
                <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                    <ApiTokenManager
                        :tokens="tokens"
                        :available-permissions="availablePermissions"
                        :default-permissions="defaultPermissions"
                    />
                </div>
            </div>
        </Container>
    </Application>
</template>
