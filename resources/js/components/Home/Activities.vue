<script setup lang="ts">

</script>
<template>
    <div class="p-8 py-20 bg-[var(--primary-brand-500)] text-white">
        <h2 class="text-center py-10">Our Activities</h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 py-10">
            <div class="flex flex-col justify-center">
                <h3
                    class="border-blue-200 p-3 mb-2 border-b-1 border-l-5">
                    NCC at a Glance
                </h3>
                <p>
                    Behind every successful student is a team of dedicated educators and professionals. Our teachers
                    inspire learning with passion and purpose, while our support staff ensures a safe, efficient, and
                    welcoming environment for all.
                </p>
            </div>
            <div class="flex flex-col">
                <div class=" h-100 border border-blue-200 bg-cover bg-center bg-no-repeat border-r-4 border-b-4 transform transition duration-300 hover:scale-101 relative"
                    :style="{ backgroundImage: `url('/storage/uploads/hero-1.jpeg')` }">
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 py-10">
            <div class="flex flex-col justify-center lg:hidden">
                <h3
                    class="border-blue-200 p-3 mb-2 border-b-1 border-l-5">
                    Sports at a Glance
                </h3>
                <p>
                    Sports are an integral part of our school’s curriculum, promoting physical fitness, teamwork, and a healthy competitive spirit. Our students actively participate in various indoor and outdoor games, excelling at inter-school, district, and state-level events. Through sports, we nurture discipline, resilience, and all-round development.
                </p>
            </div>
            <div class="flex flex-col">
                <div class=" h-100 border border-blue-200 bg-cover bg-center bg-no-repeat border-r-4 border-b-4 transform transition duration-300 hover:scale-101 relative"
                    :style="{ backgroundImage: `url('/storage/uploads/hero-1.jpeg')` }">
                </div>
            </div>
            <div class="hidden lg:flex flex-col justify-center">
                <h3
                    class="border-blue-200 p-3 mb-2 border-b-1 border-l-5">
                    Sports at a Glance
                </h3>
                <p>
                    Sports are an integral part of our school’s curriculum, promoting physical fitness, teamwork, and a healthy competitive spirit. Our students actively participate in various indoor and outdoor games, excelling at inter-school, district, and state-level events. Through sports, we nurture discipline, resilience, and all-round development.
                </p>
            </div>

        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 py-10">
            <div class="flex flex-col justify-center">
                <h3
                    class="border-blue-200 p-3 mb-2 border-b-1 border-l-5">
                    Cultural Activities
                </h3>
                <p>
                    Our school celebrates creativity through vibrant cultural programs that include music, dance, drama, and art. These activities foster confidence, teamwork, and a deep appreciation for tradition. Every student is encouraged to explore and showcase their unique talents.
                </p>
            </div>
            <div class="flex flex-col">
                <div class=" h-100 border border-blue-200 bg-cover bg-center bg-no-repeat border-r-4 border-b-4 transform transition duration-300 hover:scale-101 relative"
                    :style="{ backgroundImage: `url('/storage/uploads/hero-1.jpeg')` }">
                </div>
            </div>
        </div>
    </div>
</template>