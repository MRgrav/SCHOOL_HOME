<script setup lang="ts">
import SchoolAdminLayout from '@/layouts/SchoolAdminLayout.vue';
import { type Notification, type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import Button from '@/components/ui/button/Button.vue';

const props = defineProps<{ notification: Notification }>();

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Dashboard',
    href: '/school-admin/dashboard',
  },
  {
    title: 'Notifications',
    href: '/school-admin/notifications',
  },
  {
    title: 'View Notification',
    href: `/school-admin/notifications/${props.notification.id}`,
  },
];
</script>

<template>
  <Head :title="`Notification - ${props.notification.title}`" />

  <SchoolAdminLayout :breadcrumbs="breadcrumbs">
    <div class=" bg-white dark:bg-gray-900 rounded-xl p-6  space-y-6">
      <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
          {{ props.notification.title }}
        </h1>
        <Link :href="`/school-admin/notifications/${props.notification.id}/edit`">
          <Button>Edit</Button>
        </Link>
      </div>

      <div class="text-gray-700 dark:text-gray-300">
        {{ props.notification.message || 'No message provided.' }}
      </div>

      <div class="text-sm text-gray-500 dark:text-gray-400">
        Created at:
        {{
          new Date(props.notification.created_at).toLocaleString('en-CA', {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit',
          })
        }}
      </div>

      <div class="pt-4">
        <Link href="/school-admin/notifications">
          <Button variant="secondary">← Back to Notifications</Button>
        </Link>
      </div>
    </div>
  </SchoolAdminLayout>
</template>
