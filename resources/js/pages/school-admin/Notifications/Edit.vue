<script setup lang="ts">
import SchoolAdminLayout from '@/layouts/SchoolAdminLayout.vue';
import { type Notification, type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';

// Correctly define props with Inertia
const props = defineProps<{ notification: Notification }>()

const breadcrumbs: BreadcrumbItem[] = [
  { title: 'Dashboard', href: '/school-admin/dashboard' },
  { title: 'Notifications', href: '/school-admin/notifications' },
  { title: 'Edit', href: `/school-admin/notifications/${props.notification.id}/edit` },
]

// Use Inertia's useForm with existing data
const form = useForm({
  title: props.notification.title,
  message: props.notification.message,
})

// Submit using PUT request
const submit = () => {
  form.put(`/school-admin/notifications/${props.notification.id}`)
}
</script>

<template>
  <Head title="Edit Notification" />

  <SchoolAdminLayout :breadcrumbs="breadcrumbs">
    <div class="bg-white p-6 rounded shadow">
      <h1 class="text-2xl font-bold mb-4">Edit Notification</h1>

      <form @submit.prevent="submit" class="space-y-4">
        <div>
          <label class="block font-medium">Title</label>
          <input v-model="form.title" type="text" class="w-full border rounded px-3 py-2" />
          <div v-if="form.errors.title" class="text-red-500 text-sm">{{ form.errors.title }}</div>
        </div>

        <div>
          <label class="block font-medium">Message</label>
          <textarea v-model="form.message" rows="4" class="w-full border rounded px-3 py-2" />
          <div v-if="form.errors.message" class="text-red-500 text-sm">{{ form.errors.message }}</div>
        </div>

        <button
          type="submit"
          class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
          :disabled="form.processing"
        >
          {{ form.processing ? 'Updating...' : 'Update Notification' }}
        </button>
      </form>
    </div>
  </SchoolAdminLayout>
</template>
