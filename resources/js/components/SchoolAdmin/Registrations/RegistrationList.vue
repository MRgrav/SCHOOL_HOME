<script setup lang="ts">
import {Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow} from '@/components/ui/table';

    const registrations = [
    {
        id: '0001',
        status: 'Completed',
        name: 'Uday Subba',
        forClass: 'Uday Subba',
        phone: '60039481880',
        date: '2025-01-2004',
    },
    ];
</script>

<template>
    <Table>
        <TableCaption>A list of your recent invoices.</TableCaption>
        <TableHeader>
        <TableRow>
            <TableHead class="w-[100px]">Registration ID</TableHead>
            <TableHead>Status</TableHead>
            <TableHead>Name</TableHead>
            <TableHead>For Class</TableHead>
            <TableHead>Phone</TableHead>
            <TableHead class="text-right">Date</TableHead>

        </TableRow>
        </TableHeader>
        <TableBody>
        <TableRow v-for="registration in registrations" :key="registration.id">
            <TableCell class="font-medium"> {{ registration.id }} </TableCell>
            <TableCell>{{ registration.status }}</TableCell>
            <TableCell>{{ registration.name }}</TableCell>
            <TableCell>{{ registration.forClass }}</TableCell>
            <TableCell>{{ registration.phone }}</TableCell>
            <TableCell class="text-right"> {{ registration.date }}</TableCell>
        </TableRow>
        </TableBody>
    </Table>
</template>