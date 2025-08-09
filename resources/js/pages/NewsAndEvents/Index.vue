<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import { Post } from '@/types';

/**
 * Props definition
 * The component expects an array of registrations.
 */
interface Props {
    posts: Post[]
}
const props = defineProps<Props>() // Make props reactive and type-safe.

const formatDate = (dateStr: string) =>
  new Date(dateStr).toLocaleString('en-CA', {
    year: 'numeric',
    month: 'short', // "Aug"
    day: '2-digit',
  })
</script>
<template>
<AppLayout>
    <div class="max-w-7xl mx-auto py-8 px-4">
      <h1 class="text-3xl font-bold mb-6">Latest Posts</h1>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div
          v-for="post in props.posts"
          :key="post.id"
          class="bg-white shadow rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-200"
        >
          <!-- Post Image -->
          <img
            :src="`/storage/uploads/${post.image}`"
            alt="Post Image"
            class="w-full h-48 object-cover"
          />

          <div class="p-5">
            <h2 class="text-xl font-semibold mb-2">
              <Link :href="`/posts/${post.id}`" class="hover:underline">
                {{ post.title }}
              </Link>
            </h2>
            <p v-if="post.created_at" class="text-gray-500 text-sm mb-4">
              {{ formatDate(post.created_at) }}
            </p>
            <div class="text-gray-700 line-clamp-3" v-html="post.content"></div>
          </div>
          <div class="p-5 border-t text-right">
            <Link
              :href="`/news-events/${post.id}`"
              class="text-blue-600 hover:text-blue-800 font-medium"
            >
              Read More →
            </Link>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>