<script setup lang="ts">
import { Input } from '@/components/ui/input';
import SchoolAdminLayout from '@/layouts/SchoolAdminLayout.vue';
import { Department, type BreadcrumbItem } from '@/types';
import { Head, useForm, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Textarea } from '@/components/ui/textarea';

const props = defineProps<{
  department: Department,
}>();

const breadcrumbs: BreadcrumbItem[] = [
  { title: 'Dashboard', href: '/school-admin/dashboard' },
  { title: 'Departments', href: '/school-admin/departments' },
  { title: 'Edit', href: `/school-admin/departments/${props.department.id}/edit` },
];

// Use Inertia's form helper
const form = useForm({
  display_name: props.department.display_name ?? '',
  description: props.department.description ?? '',
});

const submit = () => {
  form.post(`/school-admin/departments/${props.department.id}/update`);
};
</script>

<template>
  <Head title="Edit Profile"></Head>

  <SchoolAdminLayout :breadcrumbs="breadcrumbs">
    <div class="bg-white rounded shadow p-8">
      <h1 class="text-2xl font-bold mb-4">Edit Profile</h1>

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

        <!-- Submit -->
        <div class="flex space-x-2">
          <Button
            type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
            :disabled="form.processing"
          >
            {{ form.processing ? 'Saving...' : 'Save Changes' }}
          </Button>

          <Link href="/school-admin/departments" class="px-4 py-2 rounded border border-gray-300">
            Cancel
          </Link>
        </div>
      </form>
    </div>
  </SchoolAdminLayout>
</template>
