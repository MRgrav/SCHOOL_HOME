<script setup lang="ts">
import { Input } from '@/components/ui/input';
import { Textarea } from '@/components/ui/textarea';
import SchoolAdminLayout from '@/layouts/SchoolAdminLayout.vue';
import { type BreadcrumbItem, Post } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';

// Correctly define props with Inertia
const props = defineProps<{ post: Post }>()

const breadcrumbs: BreadcrumbItem[] = [
  { title: 'Dashboard', href: '/school-admin/dashboard' },
  { title: 'Posts', href: '/school-admin/posts' },
  { title: 'Edit', href: `/school-admin/posts/${props.post.id}/edit` },
]

// Use Inertia's useForm with existing data
const form = useForm({
  title: props.post.title,
  content: props.post.content || '',
  image: null,
})

// Submit using PUT request
const submit = () => {
  form.post(`/school-admin/posts/${props.post.id}/update`)
}
</script>

<template>
  <Head title="Edit Notification" />

  <SchoolAdminLayout :breadcrumbs="breadcrumbs">
    <div class="bg-white p-6 rounded shadow">
      <h1 class="text-2xl font-bold mb-4">Edit Post</h1>

      <form @submit.prevent="submit" class="space-y-4">
        <!-- Name -->
        <div>
          <label class="block font-medium">Title</label>
          <Input v-model="form.title" type="text" class="w-full border rounded px-3 py-2" />
          <div v-if="form.errors.title" class="text-red-500 text-sm">{{ form.errors.title }}</div>
        </div>

        <!-- Image Upload -->
        <div>
          <label class="block font-medium">Cover Image</label>
          <Input type="file" @Input="form.image = $event.target.files[0]"/>
          <div v-if="form.errors.image" class="text-red-500 text-sm">{{ form.errors.image }}</div>

          <div class="mt-2">
            <img :src="`/storage/uploads/${props.post.image}`" alt="Current Profile" class="w-50 h-50 object-cover" />
          </div>
        </div>

                <!-- Message -->
        <div>
          <label class="block font-medium">Content</label>
          <Textarea v-model="form.content" rows="10" class="w-full border rounded px-3 py-2"></Textarea>
        </div>

        <!-- Submit -->
        <div class="flex space-x-2">
          <Button
            type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
            :disabled="form.processing"
          >
            {{ form.processing ? 'Saving...' : 'Save Changes' }}
          </Button>

          <Link href="/school-admin/profiles" class="px-4 py-2 rounded border border-gray-300">
            Cancel
          </Link>
        </div>
      </form>
    </div>
  </SchoolAdminLayout>
</template>
