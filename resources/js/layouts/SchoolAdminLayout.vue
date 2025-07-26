<script setup lang="ts">
import SchoolDashboardLayout from './app/SchoolDashboardLayout.vue';
import type { BreadcrumbItemType } from '@/types';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>
    <SchoolDashboardLayout :breadcrumbs="breadcrumbs">
        <slot />
    </SchoolDashboardLayout>
</template>
