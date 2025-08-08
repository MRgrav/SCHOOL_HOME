<script setup lang="ts">
import SchoolAdminLayout from '@/layouts/SchoolAdminLayout.vue';
import { Department, type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import {
  Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow
} from '@/components/ui/table';
import Button from '@/components/ui/button/Button.vue';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Dashboard',
    href: '/school-admin/dashboard',
  },
  {
    title: 'Departments',
    href: '/school-admin/departments',
  },
];

interface Props {
  departments: Department[];
}
const props = defineProps<Props>();

</script>

<template>

  <Head title="Dashboard" />

  <SchoolAdminLayout :breadcrumbs="breadcrumbs">
    <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
      <div>
        <Link href="/school-admin/departments/create">
          <Button>Add New</Button>
        </Link>
      </div>
      <!-- Main Table -->
      <Table>
        <!-- Caption  -->
        <TableCaption>A list of your recent Departments.</TableCaption>

        <!-- Table header row -->
        <TableHeader>
          <TableRow>
            <TableHead class="w-[100px]">Name</TableHead>
            <TableHead>Description</TableHead>
            <TableHead class="text-right">Quick Action</TableHead>
          </TableRow>
        </TableHeader>

        <!-- Table body with data rows -->
        <TableBody>
          <!-- Loop through each department -->
          <TableRow v-for="department in props.departments" :key="department.id">

            <!-- Name -->
            <TableCell class="w-[100px]">{{ department.display_name }}</TableCell>

            <!-- Description -->
            <TableCell>{{ department.description }}</TableCell>


            <!-- Actions -->
            <TableCell class="text-right space-x-2">
              <!-- Link to Department detail page -->
              <Link :href="`/school-admin/departments/${department.id}`">
                <Button>Details</Button>
              </Link>
              <!-- Link to Department edit page -->
              <Link :href="`/school-admin/departments/${department.id}/edit`">
                <Button>Edit</Button>
              </Link>
            </TableCell>
          </TableRow>
        </TableBody>
      </Table>
    </div>

  </SchoolAdminLayout>
</template>
