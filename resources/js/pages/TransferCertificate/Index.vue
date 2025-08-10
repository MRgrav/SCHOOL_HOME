<script setup lang="ts">
import PdfFile from '@/pages/TransferCertificate/TransferCertificate.pdf';
import AppLayout from '@/layouts/AppLayout.vue';
import { VuePDF, usePDF } from '@tato30/vue-pdf'
import { Button } from '@/components/ui/button';

const { pdf } = usePDF(PdfFile);
</script>


<template>
    <AppLayout>
        <div class="p-8 lg:p-16" data-ast-blocks-layout="true" itemprop="text">
            <h1>Transfer Certificate</h1>
            <div class="py-2 space-y-4">
                <p>
                    Click on the button below to download Transfer Certificate Application form
                </p>
                <a download target="_blank" :href="PdfFile">
                    <Button class="bg-blue-600 hover:bg-blue-700">Download</Button>
                </a>

            </div>
            <div>
                <VuePDF v-for="pageNo in 1" :pdf="pdf" fit-parent :page="pageNo" :key="pageNo" class="mx-auto" />
            </div>

        </div>
    </AppLayout>
</template>