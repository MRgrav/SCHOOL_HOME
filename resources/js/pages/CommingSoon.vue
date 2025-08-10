<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';

const props = defineProps<{
    title: string
}>();

</script>

<template>
    <AppLayout>
        <div class="p-8 lg:p-16">
            <h1>{{ props.title }}</h1>
            <p>Comming Soon</p>
        </div>
    </AppLayout>
</template>