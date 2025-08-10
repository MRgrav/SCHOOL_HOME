<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import facultyImage from '@/../../resources/images/faculty.jpeg';
import studentsImage from '@/../../resources/images/students.jpeg';
import staffsImage from '@/../../resources/images/staffs.jpeg';


const data = [
    {
        link: "/faculty",
        title: "Our Faculties",
        image: facultyImage
    },
    {
        link: "/",
        title: "Our Students",
        image: studentsImage
    },
    {
        link: "/",
        title: "Our Staffs",
        image: staffsImage
    },
]

</script>
<template>
    <div class="bg-[#182333] p-8 border-b-[.5px] text-white py-14">
        <h2 class="text-center font-semibold">About Us</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 py-10">

            <Link :href="row.link" v-for="row in data" :key="row.title" class="block">
                <h3 class="text-center my-3 text-[#f7dc11]">{{row.title}}</h3>
                <div class="relative bg-blue-500 h-64">
                    <img :src="row.image" alt="" class="h-full w-full object-cover">
                    <div class="h-full w-full hover:bg-black/50 top-0 left-0 absolute">
                        <div class="text-center text-white text-sm opacity-0 hover:opacity-100 top-0 w-full h-full grid place-content-center -translate-x-4 hover:translate-x-4 duration-300">
                            Learn More →
                        </div>
                    </div>
                </div>
            </Link>
        </div>
    </div>
</template>