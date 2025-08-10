<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import coverImage from '@/pages/Laboratory/Biology/biology.jpeg';

</script>


<template>
    <AppLayout>
        <div class="p-8 lg:p-16 w-full" data-ast-blocks-layout="true" itemprop="text">
            <h1 class="mb-4">Biology Lab</h1>
            <img :src="coverImage" alt="" class="w-full object-cover object-top">
            <p class="text-gray-700 pt-8">
                <span class="me-5"></span>Our Biology Lab is a hub for exploration and discovery. Well-equipped with microscopes,models, and specimens, students investigate the intricacies of life sciences. From cellular biology to ecosystems, our lab enables hands-on learning, promoting a deeper understanding of biological concepts. Experienced faculty guide students in conducting experiments, collecting data, and analyzing results, fostering a passion for scientific inquiry.ln practicals we include experiments like observation and identification of various permanent  slides under microscope, Identification of various specimens ,quadrate method,slide preparation and observation, DNA experiment etc.We have a human skeleton and different models of anatomical parts of human in lab .</p>
        </div>
    </AppLayout>
</template>