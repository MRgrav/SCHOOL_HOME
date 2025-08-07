<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type Notification } from '@/types';
import { Link } from '@inertiajs/vue3';

interface Props {
  notifications: Notification[]
}

const props = defineProps<Props>();
</script>

<template>
  <AppLayout>
    <div class="p-8 lg:p-16">
      <h1 class="font-bold mb-4">Notifications</h1>

      <div class="space-y-4">
        <Link
          v-for="notification in props.notifications"
          :key="notification.id"
          :href="`/notifications/${notification.id}`"
          class="border border-gray-200 dark:border-gray-700 rounded-md p-4 shadow-sm bg-white dark:bg-gray-900 block"
        >
          <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
            {{ notification.title }}
          </h2>
          <p class="text-gray-600 dark:text-gray-300 mt-1">
            {{ notification.message }}
          </p>
          <p class="text-xs text-gray-500 mt-2">
            {{ new Date(notification.created_at).toLocaleString() }}
          </p>
        </Link>
      </div>
    </div>
  </AppLayout>
</template>
