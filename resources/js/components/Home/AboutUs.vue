<script setup lang="ts">

const data = [
    {
        link: "/",
        title: "Our Faculties",
        image: "hero-1.jpeg"
    },
    {
        link: "/",
        title: "Our Students",
        image: "hero-2.jpeg"
    },
    {
        link: "/",
        title: "Our Staffs",
        image: "hero-3.jpeg"
    },
]
</script>
<template>
    <div class="bg-[#182333] p-8 border-b-[.5px] text-white py-14">
        <h2 class="text-center font-semibold">News & Events</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 py-10">
        
        <div v-for="row in data" :key="row.name">
            <h3 class="text-center my-3 text-[#f7dc11]">{{row.title}}</h3>
            <div class=" h-64 bg-cover bg-center bg-no-repeat transform transition duration-300 hover:scale-101 relative" :style="{ backgroundImage: `url('/storage/uploads/${row.image}')` }">
                <div class="h-full w-full hover:bg-black/50">
                    <div class="text-center text-white text-sm opacity-0 hover:opacity-100 absolute top-0 w-full h-full grid place-content-center -translate-x-4 hover:translate-x-4 duration-300"> Learn More →</div>
                </div>
            </div>
        </div>
        </div>
    </div>
</template>