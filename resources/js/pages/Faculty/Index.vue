<script setup lang="ts">
import FacultyCard from '@/components/Faculty/FacultyCard.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Department, Profile } from '@/types';

interface Props {
    departments: Department[],
    profiles: Profile[]
}

const props = defineProps<Props>();
</script>

<template>
    <AppLayout>
        <div class="p-8 lg:p-16">
            <h1 class="font-bold mb-4">Our Faculties</h1>
            <p class=" mx-auto text-gray-500 leading-relaxed">
                Welcome to our faculty page, where dedication meets expertise. Our experienced educators across diverse departments are committed to nurturing curiosity, critical thinking, and academic excellence. Each member brings unique skills and passion to create a supportive learning environment. Explore the departments below to learn more about the professionals guiding our students toward success and lifelong growth.
            </p>

            <div class="space-y-4 mt-10">
                <div v-for="department in props.departments" :key="department.id" class="">
                    <h2 class="text-center bg-gray-100 p-6">
                        {{ department.display_name }}
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 rounded py-5">
                        <FacultyCard v-for="profile in props.profiles.filter(p => p.department_id === department.id)" :key="profile.id" :profile="profile" />
                    </div>
                </div>

            </div>
        </div>
    </AppLayout>
</template>
