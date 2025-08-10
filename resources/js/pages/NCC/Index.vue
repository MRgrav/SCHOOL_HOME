<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import ncc1 from '@/pages/NCC/ncc1.jpeg';
import ncc2 from '@/pages/NCC/ncc2.jpeg';
import ncc3 from '@/pages/NCC/ncc3.jpeg';
import ncc4 from '@/pages/NCC/ncc4.jpeg';
import ncc5 from '@/pages/NCC/ncc5.jpeg';
import ncc6 from '@/pages/NCC/ncc6.jpeg';

const images = [ ncc1, ncc2, ncc3, ncc4, ncc5, ncc6];

</script>


<template>
    <AppLayout>
        <div class="p-8 lg:p-16 w-full" data-ast-blocks-layout="true" itemprop="text">
            <h1 class="mb-4">NCC</h1>
            <p class="text-gray-700">
                Our school is affiliated with 9 Assam Battalion NCC and has 100 cadets (Boys and girls). The NCC unit in
                our school plays a vital role in shaping the discipline, leadership, and character of our students.
                Through rigorous training and various activities, our cadets develop essential life skills, such as
                teamwork, time management, and problem-solving. The NCC program also instills a sense of patriotism and
                social responsibility, empowering our students to become responsible citizens.
                Our cadets actively participate in various camps and social service/community development programs
                organized by NCC. Annually, our cadets excel, earning Best Cadet awards and CWS scholarships. We
                consistently achieve commendable results in the ‘A’ certificate examination. Notably, Cadet Archan
                Borgohain represented our unit at the prestigious Republic Day Camp (RDC) in Delhi, held from January to
                the first week of February 2025.
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 py-10">
                <div v-for="image in images" class="aspect-4/3" :key="image">
                    <img :src="image" alt="" class="h-full w-full object-cover">
                </div>
            </div>
        </div>
    </AppLayout>
</template>