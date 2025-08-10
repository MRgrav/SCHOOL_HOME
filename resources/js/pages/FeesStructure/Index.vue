<script setup lang="ts">
import PdfFile from '@/pages/FeesStructure/FeesStructure.pdf';
import AppLayout from '@/layouts/AppLayout.vue';
import { VuePDF, usePDF } from '@tato30/vue-pdf'

const { pdf } = usePDF(PdfFile);
</script>


<template>
    <AppLayout>
        <div class="p-8 lg:p-16" data-ast-blocks-layout="true" itemprop="text">
            <h1>Fees Structure</h1>
           <div>
             <VuePDF v-for="pageNo in 1" :pdf="pdf" fit-parent :page="pageNo" :key="pageNo" class="mx-auto"/>
           </div>
        </div>
    </AppLayout>
</template>