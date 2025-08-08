<script setup lang="ts">
import SchoolAdminLayout from '@/layouts/SchoolAdminLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import Button from '@/components/ui/button/Button.vue';
import { Role, type BreadcrumbItem } from '@/types';
import { Input } from '@/components/ui/input';
import { Textarea } from '@/components/ui/textarea';

const breadcrumbs: BreadcrumbItem[] = [
  { title: 'Dashboard', href: '/school-admin/dashboard' },
  { title: 'Departments', href: '/school-admin/departments' },
  { title: 'Create', href: '/school-admin/profiles/create' },
];

defineProps<{
  roles: Role[]
}>();

const form = useForm({
  display_name: '',
  description: '',
});

const submit = () => {
  form.post('/school-admin/departments', {
    forceFormData: true, // needed for image upload
  });
};
</script>

<template>

  <Head title="Create Profile"></Head>

  <SchoolAdminLayout :breadcrumbs="breadcrumbs">
    <div class="bg-white p-8 rounded shadow">
      <h1 class="text-2xl font-bold mb-4">Create Profile</h1>

      <form @submit.prevent="submit" class="space-y-4">
        <!-- Name -->
        <div>
          <label class="block font-medium">Name</label>
          <Input v-model="form.display_name" type="text" class="w-full border rounded px-3 py-2" required/>
          <div v-if="form.errors.display_name" class="text-red-500 text-sm">
            {{ form.errors.display_name }}
          </div>
        </div>

        <!-- Description -->
        <div>
          <label class="block font-medium">Description</label>
          <Textarea v-model="form.description" rows="3" class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <!-- Buttons -->
        <div class="flex gap-2">
          <Button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
            :disabled="form.processing">
            {{ form.processing ? 'Saving...' : 'Save Department' }}
          </Button>
          <Link href="/school-admin/departments">
          <Button type="button" class="bg-gray-500 text-white px-4 py-2">
            Cancel
          </Button>
          </Link>
        </div>
      </form>
    </div>
  </SchoolAdminLayout>
</template>
