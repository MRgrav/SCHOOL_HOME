<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import coverImage from '@/pages/Laboratory/Physics/physics.jpeg';

</script>


<template>
    <AppLayout>
        <div class="p-8 lg:p-16 w-full" data-ast-blocks-layout="true" itemprop="text">
            <h1 class="mb-4">Physics Lab</h1>
            <img :src="coverImage" alt="" class="w-full object-cover object-top">
            <p class="text-gray-700 pt-8">
                <span class="me-5"></span>Our Physics Lab is equipped with modern apparatus and instruments, enabling students to explore fundamental concepts through hands-on experimentation. From mechanics to electromagnetism, our lab facilitates experiential learning, fostering a deeper understanding of physical principles. Experienced faculty guide students in conducting experiments, analyzing data, and drawing meaningful conclusions.In experiments we have Meter bridge, Potentiometer, Travelling microscope, Vernier callipers, Screw gauge,Spherometer, Ohm’s law apparatus , Prism, Glass slab and p-n junction etc.</p>
        </div>
    </AppLayout>
</template>