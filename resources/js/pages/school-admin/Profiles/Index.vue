<script setup lang="ts">
import SchoolAdminLayout from '@/layouts/SchoolAdminLayout.vue';
import { Profile, type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import ProfilesList from '@/components/SchoolAdmin/Profiles/ProfilesList.vue';
import Button from '@/components/ui/button/Button.vue';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Dashboard',
    href: '/school-admin/dashboard',
  },
  {
    title: 'Profiles',
    href: '/school-admin/profiles',
  },
];

interface Props {
  profiles: Profile[];
}
const props = defineProps<Props>();

</script>

<template>
    <Head title="Dashboard" />

    <SchoolAdminLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
          <div>
            <Link href="/school-admin/profiles/create">
              <Button>Add New</Button>
            </Link>
          </div>
          <ProfilesList :profiles="props.profiles"/>
        </div>

    </SchoolAdminLayout>
</template>
