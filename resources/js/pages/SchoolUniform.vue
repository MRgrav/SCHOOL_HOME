<script setup lang="ts">
import uniformPdf from '@/../../resources/pdfs/SummerUniform.pdf';
import AppLayout from '@/layouts/AppLayout.vue';
import { VuePDF, usePDF } from '@tato30/vue-pdf'


const { pdf } = usePDF(uniformPdf);

console.log(pdf);

</script>
<template>
    <AppLayout>
        <div class="my-3"></div>
        <VuePDF v-for="pageNo in 10" :pdf="pdf" fit-parent :page="pageNo" :key="pageNo"/>
    </AppLayout>
</template>

