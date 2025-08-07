<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type Notification } from '@/types';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps<{ notification: Notification }>();
</script>

<template>
  <AppLayout>
    <Head :title="`Notification - ${props.notification.title}`" />
    <div class="p-8 lg:p-16">
      <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
        {{ props.notification.title }}
      </h1>
      <p class="text-gray-700 dark:text-gray-300 mb-6">
        {{ props.notification.message || 'No message provided.' }}
      </p>
      <p class="text-sm text-gray-500">
        Posted on:
        {{
          new Date(props.notification.created_at).toLocaleString('en-CA', {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit',
          })
        }}
      </p>

      <div class="mt-6">
        <Link href="/notifications">
          <Button>← Back to notifications</Button>
        </Link>
      </div>
    </div>
  </AppLayout>
</template>
