<script setup lang="ts">
defineProps({
    image: String,
    title: String,
    name: String,
    message: String
})

</script>


<template>
    <div class="border border-[var(--primary-brand-500)]">
        <div class="aspect-[1/1] object-center object-cover">
            <img :src="`/storage/uploads/${image}`" class="w-full h-full object-cover">
        </div>
        <div class="p-4">
            <h3 class="text-[var(--primary-brand-500)] py-1">{{ image }}</h3>
            <h4 class="text-slate-700">{{ name }}</h4>
            <p class="text-slate-500 max-t">{{ message.slice(0, 220) + '...' }}</p>
        </div>
    </div>
</template>