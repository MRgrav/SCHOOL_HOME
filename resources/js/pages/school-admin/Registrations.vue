<script setup lang="ts">
import SchoolAdminLayout from '@/layouts/SchoolAdminLayout.vue';
import { Registration, type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import RegistrationList from '@/components/SchoolAdmin/Registrations/RegistrationList.vue';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Dashboard',
    href: '/school-admin/dashboard',
  },
  {
    title: 'Registrations',
    href: '/school-admin/registrations',
  },
];

interface Props {
  registrations: Registration[];
}
const props = defineProps<Props>();

</script>

<template>
    <Head title="Dashboard" />

    <SchoolAdminLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
          <RegistrationList :registrations="props.registrations"/>
        </div>

    </SchoolAdminLayout>
</template>
