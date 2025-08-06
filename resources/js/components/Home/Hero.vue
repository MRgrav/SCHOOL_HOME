<script setup lang="ts">
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide } from 'vue3-carousel'
import { ArrowUpRight } from 'lucide-vue-next';
import { Link } from '@inertiajs/vue3';

const carouselConfig = {
  itemsToShow: 1,
  wrapAround: true,
  autoplay: 3000,
}
</script>

<template>
  <div class="relative w-full h-[450px] overflow-hidden">
    <Carousel v-bind="carouselConfig" class="w-full h-full">
      <Slide v-for="index in 4" :key="index">
        <div class="w-full h-[450px]">
          <img
            :src="`/storage/uploads/hero-${index}.jpeg`"
            alt="Hero Slide"
            class="w-full h-full object-cover"
          />
        </div>
      </Slide>
    </Carousel>

    <!-- ✅ Centered Overlay Content -->
    <div class="absolute inset-0 flex justify-center items-end p-6">
      <div class="z-10 bg-blue-600/50 p-6 text-white">
        <span>Welcome to</span>
        <h1><span class="text-[#ffeb00]">ARPS</span> Jorhat</h1>
        <span>This is where we teach students skills they need to transform themselves, others, and our global communities.</span>
        <div class="flex justify-center mt-5">
            <Link :href="online-registration" as="button" class="bg-[#ff5544] hover:bg-[#ff6655] hover:scale-105 rounded-xs py-2 px-4 flex items-center cursor-pointer ease-in-out`">
                <span>Addmission Now</span>
                <ArrowUpRight class="inline ml-1 stroke-[2.5] w-4 h-4 text-current" />
            </Link>
        </div>
      </div>
    </div>
  </div>
</template>
