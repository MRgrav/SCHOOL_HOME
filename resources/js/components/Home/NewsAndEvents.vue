<script setup lang="ts">
</script>

<template>
  <div class="bg-[#4e71ff] px-8 py-18">
    <h2 class="text-center text-white text-3xl font-semibold">News & Events</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 py-10">
      <div v-for="index in 6" :key="index" class=" h-64 border border-blue-200 bg-cover bg-center bg-no-repeat border-r-4 border-b-4 transform transition duration-300 hover:scale-101 relative" :style="{ backgroundImage: `url('/storage/uploads/hero-${index}.jpeg')` }">
        <div class=" bg-[#022CB84F] hover:bg-[#012DB8B5] flex flex-col justify-end transition-colors duration-300 h-full">
            <div class="text-center text-white text-sm opacity-0 hover:opacity-100 absolute top-0 w-full h-full grid place-content-center -translate-x-4 hover:translate-x-4 duration-300"> Read More →</div>
            <div class="text-[#F5FA70CF] p-5">
                <h3 class="text-lg font-semibold">Sports Week</h3>
                <span class="font-bold text-sm">May 22, 2025</span>
            </div>
        </div>
      </div>
    </div>
  </div>
</template>