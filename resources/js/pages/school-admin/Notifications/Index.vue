<script setup lang="ts">
import SchoolAdminLayout from '@/layouts/SchoolAdminLayout.vue';
import { Notification, type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/vue3';
import Table from '@/components/ui/table/Table.vue';
import TableBody from '@/components/ui/table/TableBody.vue';
import TableCaption from '@/components/ui/table/TableCaption.vue';
import TableCell from '@/components/ui/table/TableCell.vue';
import TableHead from '@/components/ui/table/TableHead.vue';
import TableHeader from '@/components/ui/table/TableHeader.vue';
import TableRow from '@/components/ui/table/TableRow.vue';
import Button from '@/components/ui/button/Button.vue';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Dashboard',
    href: '/school-admin/dashboard',
  },
  {
    title: 'Notifications',
    href: '/school-admin/notifications',
  },
];

/**
 * Props definition
 * The component expects an array of registrations.
 */
interface Props {
  notifications: Notification[]
}
const props = defineProps<Props>() // Make props reactive and type-safe.

const deleteNotification = (id: string) => {
  if (confirm('Are you sure you want to delete this notification?')) {
    router.delete(`/school-admin/notifications/${id}`)
  }
}
</script>

<template>
    <Head title="Dashboard" />

    <SchoolAdminLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
          <div>
            <Link href="/school-admin/notifications/create">
              <Button>Add New</Button>
            </Link>
          </div>
            <Table>
                <TableCaption>A list of your recent notifications.</TableCaption>
                <TableHeader>
                <TableRow>
                    <TableHead class="w-full"> Title </TableHead>
                    <TableHead>Date</TableHead>
                    <TableHead class="text-center">Actions</TableHead>
                </TableRow>
                </TableHeader>
                <TableBody>
                <TableRow v-for="notification in props.notifications" :key="notification.id">
                    <TableCell class="font-medium"> {{ notification.title }} </TableCell>
                    <TableCell>
                        {{
                        new Date(notification.created_at).toLocaleString('en-CA', {
                          year: 'numeric',
                          month: '2-digit',
                          day: '2-digit',
                          hour: '2-digit',
                          minute: '2-digit',
                        })
                      }}
                    </TableCell>
                    <TableCell class="text-right space-x-2"> 
                      <Link :href="`/school-admin/notifications/${notification.id}`">
                        <Button>View</Button>
                      </Link>
                      <Link :href="`/school-admin/notifications/${notification.id}/edit`">
                        <Button>Edit</Button>
                      </Link>
                       <Link @click="deleteNotification(notification.id)">
                        <Button class="bg-red-500 hover:bg-red-600">Delete</Button>
                      </Link>
                    </TableCell>
                </TableRow>
                </TableBody>
            </Table>
            <!-- <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    nice
                </div>
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
            </div>
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 md:min-h-min dark:border-sidebar-border">
                <PlaceholderPattern />
            </div> -->
        </div>

    </SchoolAdminLayout>
</template>
