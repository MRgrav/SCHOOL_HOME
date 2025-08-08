<script setup lang="ts">
import SchoolAdminLayout from '@/layouts/SchoolAdminLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import Button from '@/components/ui/button/Button.vue';
import { Department, Role, type BreadcrumbItem } from '@/types';
import { Input } from '@/components/ui/input';
import { Textarea } from '@/components/ui/textarea';
import { Select, SelectTrigger, SelectValue, SelectContent, SelectGroup, SelectItem } from '@/components/ui/select';

const breadcrumbs: BreadcrumbItem[] = [
  { title: 'Dashboard', href: '/school-admin/dashboard' },
  { title: 'Profiles', href: '/school-admin/profiles' },
  { title: 'Create', href: '/school-admin/profiles/create' },
];

defineProps<{
  roles: Role[],
  departments: Department[]
}>();

const form = useForm({
  name: '',
  role_id: '',
  position: '',
  department_id: '',
  detail: '',
  message: '',
  image: null,
});

const submit = () => {
  form.post('/school-admin/profiles', {
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
          <Input v-model="form.name" type="text" class="w-full border rounded px-3 py-2" />
          <div v-if="form.errors.name" class="text-red-500 text-sm">
            {{ form.errors.name }}
          </div>
        </div>

        <!-- Role -->
        <div>
          <label class="block font-medium">Role</label>

            <Select v-model="form.role_id">
              <SelectTrigger class="form-select w-full">
                <SelectValue placeholder="-- Select --" />
              </SelectTrigger>
              <SelectContent>
                <SelectGroup>
                  <SelectItem v-for="role in $props.roles" :key="role.id" :value="role.id">{{ role.display_name }}</SelectItem>
                </SelectGroup>
              </SelectContent>
            </Select>

          <div v-if="form.errors.role_id" class="text-red-500 text-sm">
            {{ form.errors.role_id }}
          </div>
        </div>

        <!-- Position -->
        <div>
          <label class="block font-medium">Position</label>
          <Input v-model="form.position" type="text" class="w-full border rounded px-3 py-2" />
        </div>

        <!-- Department -->
        <div>
          <label class="block font-medium">Department</label>

            <Select v-model="form.department_id">
              <SelectTrigger class="form-select w-full">
                <SelectValue placeholder="-- Select --" />
              </SelectTrigger>
              <SelectContent>
                <SelectGroup>
                  <SelectItem v-for="department in $props.departments" :key="department.id" :value="department.id">{{ department.display_name }}</SelectItem>
                </SelectGroup>
              </SelectContent>
            </Select>

          <div v-if="form.errors.department_id" class="text-red-500 text-sm">
            {{ form.errors.department_id }}
          </div>
        </div>

        <!-- Detail -->
        <div>
          <label class="block font-medium">Detail</label>
          <Textarea v-model="form.detail" rows="3" class="w-full border rounded px-3 py-2"></Textarea>
        </div>

        <!-- Message -->
        <div>
          <label class="block font-medium">Message</label>
          <Textarea v-model="form.message" rows="10" class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <!-- Image -->
        <div>
          <label class="block font-medium">Profile Image</label>
          <Input type="file" @Input="form.image = $event.target.files[0]" />
          <div v-if="form.errors.image" class="text-red-500 text-sm">
            {{ form.errors.image }}
          </div>
        </div>

        <!-- Buttons -->
        <div class="flex gap-2">
          <Button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
            :disabled="form.processing">
            {{ form.processing ? 'Saving...' : 'Save Profile' }}
          </Button>
          <Link href="/school-admin/profiles">
          <Button type="button" class="bg-gray-500 text-white px-4 py-2">
            Cancel
          </Button>
          </Link>
        </div>
      </form>
    </div>
  </SchoolAdminLayout>
</template>
