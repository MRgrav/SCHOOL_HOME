<script setup lang="ts">
import SchoolAdminLayout from '@/layouts/SchoolAdminLayout.vue';
import { Department, type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/vue3';
import Button from '@/components/ui/button/Button.vue';
import { ArrowLeftIcon } from 'lucide-vue-next';

interface Props {
  department: Department;
}
const props = defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
  { title: 'Dashboard', href: '/school-admin/dashboard' },
  { title: 'Departments', href: '/school-admin/departments' },
  { title: props.department.name, href: `/school-admin/departments/${props.department.id}` },
];

function deleteProfile() {
  if (confirm('Are you sure you want to delete this profile?')) {
    router.delete(`/school-admin/departments/${props.department.id}`);
  }
}

</script>

<template>

  <Head :title="`Profile - ${props.department.name}`" />

  <SchoolAdminLayout :breadcrumbs="breadcrumbs">
    <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">

      <!-- Action buttons -->
      <div class="flex space-x-2">
        <Link :href="`/school-admin/departments`" class="me-auto">
          <Button class="bg-gray-100 hover:bg-gray-200 text-black">
            <ArrowLeftIcon />
            Back To Departments
          </Button>
        </Link>
        <Link :href="`/school-admin/departments/${props.department.id}/edit`">
        <Button>Edit</Button>
        </Link>
        <Button class="bg-red-500 hover:bg-red-600" @click="deleteProfile">
          Delete
        </Button>
      </div>

      <h2 class="text-center">Department Details</h2>
      <!-- Department Info Card -->
      <div class="bg-white rounded-lg shadow p-6 grid grid-cols-1 gap-6">


        <!-- Right Column: Details -->
        <div class="md:col-span-2 space-y-4">
          <div>
            <h3><span class="font-bold">Department Name:</span> {{ props.department.display_name }}</h3>
          </div>
          <div v-if="props.department.description">
            <h4 class="font-semibold">Description</h4>
            <p>{{ props.department.description }}</p>
          </div>
        </div>
      </div>

    </div>
  </SchoolAdminLayout>
</template>
