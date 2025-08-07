<script setup lang="ts">
import SchoolAdminLayout from '@/layouts/SchoolAdminLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
  { title: 'Dashboard', href: '/school-admin/dashboard' },
  { title: 'Notifications', href: '/school-admin/notifications' },
  { title: 'Create', href: '/school-admin/notifications/create' },
];

// Create form using Inertia's useForm helper
const form = useForm({
  title: '',
  message: '',
});
const submit = () => {
  form.post('/school-admin/notifications');
};
</script>

<template>
  <Head title="Create Notification" />

  <SchoolAdminLayout :breadcrumbs="breadcrumbs">
    <div class=" bg-white p-6 rounded shadow">
      <h1 class="text-2xl font-bold mb-4">Create Notification</h1>
      
      <form @submit.prevent="submit" class="space-y-4">
        <div>
          <label class="block font-medium">Title</label>
          <input v-model="form.title" type="text" class="w-full border rounded px-3 py-2" />
          <div v-if="form.errors.title" class="text-red-500 text-sm">{{ form.errors.title }}</div>
        </div>

        <div>
          <label class="block font-medium">Message</label>
          <textarea v-model="form.message" class="w-full border rounded px-3 py-2" rows="4" />
          <div v-if="form.errors.message" class="text-red-500 text-sm">{{ form.errors.message }}</div>
        </div>

        <button
          type="submit"
          class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
          :disabled="form.processing"
        >
          {{ form.processing ? 'Submitting...' : 'Create Notification' }}
        </button>
      </form>
    </div>
  </SchoolAdminLayout>
</template>
