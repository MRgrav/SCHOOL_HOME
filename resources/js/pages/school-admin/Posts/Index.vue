<script setup lang="ts">
import SchoolAdminLayout from '@/layouts/SchoolAdminLayout.vue';
import { Post, type BreadcrumbItem } from '@/types';
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
    title: 'Posts',
    href: '/school-admin/posts',
  },
];

/**
 * Props definition
 * The component expects an array of registrations.
 */
interface Props {
  posts: Post[]
}
const props = defineProps<Props>() // Make props reactive and type-safe.

const deleteNotification = (id: string | number) => {
  if (confirm('Are you sure you want to delete this post?')) {
    router.delete(`/school-admin/posts/${id}`)
  }
}
</script>

<template>

  <Head title="Dashboard"></Head>

  <SchoolAdminLayout :breadcrumbs="breadcrumbs">
    <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
      <div>
        <Link href="/school-admin/posts/create">
        <Button>Add New</Button>
        </Link>
      </div>
      <Table>
        <TableCaption>A list of your recent Posts.</TableCaption>
        <TableHeader>
          <TableRow>
            <TableHead class="w-full"> Title </TableHead>
            <TableHead>Created At</TableHead>
            <TableHead class="text-center">Actions</TableHead>
          </TableRow>
        </TableHeader>
        <TableBody>
          <TableRow v-for="post in props.posts" :key="post.id">
            <TableCell class="font-medium"> {{ post.title }} </TableCell>
            <TableCell v-if="post.created_at">
              {{
                new Date(post.created_at).toLocaleString('en-CA', {
                  year: 'numeric',
                  month: '2-digit',
                  day: '2-digit',
                  hour: '2-digit',
                  minute: '2-digit',
                })
              }}
            </TableCell>
            <TableCell class="text-right space-x-2">
              <Link :href="`/school-admin/posts/${post.id}`">
              <Button>View</Button>
              </Link>
              <Link :href="`/school-admin/posts/${post.id}/edit`">
              <Button>Edit</Button>
              </Link>
              <Button @click="deleteNotification(post.id)" class="bg-red-500 hover:bg-red-600">Delete</Button>
            </TableCell>
          </TableRow>
        </TableBody>
      </Table>
    </div>

  </SchoolAdminLayout>
</template>
