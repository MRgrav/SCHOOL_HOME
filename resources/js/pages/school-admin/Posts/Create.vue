<script setup lang="ts">
import SchoolAdminLayout from '@/layouts/SchoolAdminLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import Button from '@/components/ui/button/Button.vue';
import { type BreadcrumbItem } from '@/types';
import { Input } from '@/components/ui/input';
import { Textarea } from '@/components/ui/textarea';

const breadcrumbs: BreadcrumbItem[] = [
  { title: 'Dashboard', href: '/school-admin/dashboard' },
  { title: 'Posts', href: '/school-admin/posts' },
  { title: 'Create', href: '/school-admin/posts/create' },
];
const form = useForm({
  title: '',
  image: null,
  content: '',
});

const submit = () => {
  form.post('/school-admin/posts', {
    forceFormData: true, // needed for image upload
  });
};
</script>

<template>

  <Head title="Create Post"></Head>

  <SchoolAdminLayout :breadcrumbs="breadcrumbs">
    <div class="bg-white p-8 rounded shadow">
      <h1 class="text-2xl font-bold mb-4">Create Post</h1>

      <form @submit.prevent="submit" class="space-y-4">
        <!-- Name -->
        <div>
          <label class="block font-medium">Title</label>
          <Input v-model="form.title" type="text" class="w-full border rounded px-3 py-2" />
          <div v-if="form.errors.title" class="text-red-500 text-sm">
            {{ form.errors.title }}
          </div>
        </div>

        <!-- Image -->
        <div>
          <label class="block font-medium">Cover Image</label>
          <Input type="file" @Input="form.image = $event.target.files[0]" />
          <div v-if="form.errors.image" class="text-red-500 text-sm">
            {{ form.errors.image }}
          </div>
        </div>

        <!-- Detail -->
        <div>
          <label class="block font-medium">Content</label>
          <Textarea v-model="form.content" rows="10" class="w-full border rounded px-3 py-2"></Textarea>
        </div>

        <!-- Buttons -->
        <div class="flex gap-2">
          <Button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
            :disabled="form.processing">
            {{ form.processing ? 'Saving...' : 'Save Post' }}
          </Button>
          <Link href="/school-admin/posts">
          <Button type="button" class="bg-gray-500 text-white px-4 py-2">
            Cancel
          </Button>
          </Link>
        </div>
      </form>
    </div>
  </SchoolAdminLayout>
</template>
