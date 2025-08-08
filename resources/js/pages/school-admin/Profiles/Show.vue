<script setup lang="ts">
import SchoolAdminLayout from '@/layouts/SchoolAdminLayout.vue';
import { Profile, type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/vue3';
import Button from '@/components/ui/button/Button.vue';
import { ArrowLeftIcon } from 'lucide-vue-next';
import defaultProfileIcon from '@/../../resources/images/defaults/profile.png';

interface Props {
  profile: Profile;
}
const props = defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
  { title: 'Dashboard', href: '/school-admin/dashboard' },
  { title: 'Profiles', href: '/school-admin/profiles' },
  { title: props.profile.name, href: `/school-admin/profiles/${props.profile.id}` },
];

function deleteProfile() {
  if (confirm('Are you sure you want to delete this profile?')) {
    router.delete(`/school-admin/profiles/${props.profile.id}`);
  }
}

const handleImageError = (event: Event) => {
  (event.target as HTMLImageElement).src = defaultProfileIcon;
};
</script>

<template>

  <Head :title="`Profile - ${props.profile.name}`" />

  <SchoolAdminLayout :breadcrumbs="breadcrumbs">
    <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">

      <!-- Action buttons -->
      <div class="flex space-x-2">
        <Link :href="`/school-admin/profiles`" class="me-auto">
        <Button class="bg-gray-100 hover:bg-gray-200 text-black">
          <ArrowLeftIcon />
          Back To Profiles
        </Button>
        </Link>
        <Link :href="`/school-admin/profiles/${props.profile.id}/edit`">
        <Button>Edit</Button>
        </Link>
        <Button class="bg-red-500 hover:bg-red-600" @click="deleteProfile">
          Delete
        </Button>
      </div>

      <!-- Profile Info Card -->
      <div class="bg-white rounded-lg shadow p-6 grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Left Column: Image & Role -->
        <div class="flex flex-col items-center">
          <img :src="`/storage/uploads/${props.profile.image}`" alt="Profile Image"
            class="w-40 h-40 rounded-full object-cover border mb-4" @error="handleImageError($event)" />
          <div class="text-center">
            <h2 class="text-lg font-semibold">Role</h2>
            <p class="text-gray-700">{{ props.profile.role?.display_name || 'N/A' }}</p>
          </div>
        </div>

        <!-- Right Column: Details -->
        <div class="md:col-span-2 space-y-4">
          <div>
            <h2 class="text-xl font-bold">{{ props.profile.name }}</h2>
          </div>
          <div v-if="props.profile.position">
            <h3 class="font-semibold">Position</h3>
            <p>{{ props.profile.position }}</p>
          </div>
          <div v-if="props.profile.department_id">
            <h3 class="font-semibold">Department</h3>
            <p>{{ props.profile.department?.display_name }}</p>
          </div>
          <div v-if="props.profile.detail">
            <h3 class="font-semibold">Detail</h3>
            <p>{{ props.profile.detail }}</p>
          </div>
          <div v-if="props.profile.message">
            <h3 class="font-semibold">Message</h3>
            <p>{{ props.profile.message }}</p>
          </div>
          <div class="text-sm text-gray-500">
            <p>Created: {{ new Date(props.profile.created_at || '').toLocaleString() }}</p>
            <p>Updated: {{ new Date(props.profile.updated_at || '').toLocaleString() }}</p>
          </div>
        </div>
      </div>

    </div>
  </SchoolAdminLayout>
</template>
