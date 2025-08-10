<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import coverImage from '@/pages/Laboratory/Chemistry/chemistry.jpeg';

</script>


<template>
    <AppLayout>
        <div class="p-8 lg:p-16 w-full" data-ast-blocks-layout="true" itemprop="text">
            <h1 class="mb-4">Chemistry Lab</h1>
            <img :src="coverImage" alt="" class="w-full object-cover object-top">
            <p class="text-gray-700 pt-8">
                <span class="me-5"></span>Our Chemistry Lab is designed for safe and effective experimentation. Equipped with modern equipment and chemicals, students investigate chemical reactions, properties, and processes. Our lab encourages curiosity and creativity, allowing students to explore the molecular world. Faculty supervision ensures students follow proper protocols, developing essential skills in laboratory procedures and scientific inquiry.In practicals we include various experiments like inorganic salt analysis,organic salt analysis and volumetric analysis etc.we have digital balance and equipments like conical flask, beaker,volumetric flask, funnel ,biurett, pipette, test tubes , holder, bunsen burner etc.</p>
        </div>
    </AppLayout>
</template>