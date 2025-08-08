<script setup lang="ts">
import { UserPen, GraduationCapIcon } from 'lucide-vue-next';

</script>
<template>
    <div class="p-8 border-b-[.5px]">
        <h2 class="text-center text-[#4e71ff] py-10">Heart of Our Success</h2>

        <!-- hide on mobile and tablate -->
        <div class="hidden lg:block">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 py-10">
                <div>
                    <h3
                        class="text-[var(--primary-brand-500)] border-[var(--primary-brand-500)] p-3 mb-2 border-b-1 border-l-5">
                        Teachers & Staffs
                    </h3>
                    <p class="text-gray-500">
                        Behind every successful student is a team of dedicated educators and professionals. Our teachers
                        inspire learning with passion and purpose, while our support staff ensures a safe, efficient,
                        and
                        welcoming environment for all.
                    </p>
                </div>
                <div class="flex flex-col">
                    <div class="flex justify-center">
                        <svg class="size-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none" />
                            <path d="M192,120a59.91,59.91,0,0,1,48,24" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <path d="M16,144a59.91,59.91,0,0,1,48-24" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <circle cx="128" cy="144" r="40" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="16" />
                            <path d="M72,216a65,65,0,0,1,112,0" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="16" />
                            <path d="M161,80a32,32,0,1,1,31,40" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="16" />
                            <path d="M64,120A32,32,0,1,1,95,80" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="16" />
                        </svg>
                    </div>
                    <p class="text-center text-6xl font-bold text-purple-500">
                        71+
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2  gap-4 py-10">
                <div class="flex flex-col">
                    <div class="flex justify-center">
                        <UserPen class="size-20" />
                    </div>
                    <p class="text-center text-6xl font-bold text-purple-500">
                        71+
                    </p>
                </div>
                <div>
                    <h3
                        class="text-[var(--primary-brand-500)] border-[var(--primary-brand-500)] p-3 mb-2 border-b-1 border-r-5 text-end">
                        Students
                    </h3>
                    <p class="text-gray-500">
                        Curious minds, bright ideas, and boundless energy — our students bring life to the campus every
                        day. With opportunities to lead, create, and grow, they embody the spirit of learning in every
                        corner of the school.
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2  gap-4 py-10">
                <div>
                    <h3
                        class="text-[var(--primary-brand-500)] border-[var(--primary-brand-500)] p-3 mb-2 border-b-1 border-l-5">
                        Alumni
                    </h3>
                    <p class="text-gray-500">
                        Though they've stepped beyond our gates, our alumni remain deeply connected. As achievers across
                        fields and continents, they carry forward the values and vision of our school - and often give
                        back to guide those who follow.
                    </p>
                </div>
                <div class="flex flex-col">
                    <div class="flex justify-center">
                        <GraduationCapIcon class="size-20" />
                    </div>
                    <p class="text-center text-6xl font-bold text-purple-500">
                        71+
                    </p>
                </div>
            </div>
        </div>

        <!-- hide on desktop -->
        <div class="lg:hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 py-10">
                <div class="flex flex-col">
                    <div class="flex justify-center">
                        <svg class="size-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none" />
                            <path d="M192,120a59.91,59.91,0,0,1,48,24" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <path d="M16,144a59.91,59.91,0,0,1,48-24" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <circle cx="128" cy="144" r="40" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="16" />
                            <path d="M72,216a65,65,0,0,1,112,0" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="16" />
                            <path d="M161,80a32,32,0,1,1,31,40" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="16" />
                            <path d="M64,120A32,32,0,1,1,95,80" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="16" />
                        </svg>
                    </div>
                    <p class="text-center text-6xl font-bold text-purple-500">
                        71+
                    </p>
                </div>
                <div>
                    <h3
                        class="text-[var(--primary-brand-500)] border-[var(--primary-brand-500)] p-3 mb-2 border-b-1 border-l-5">
                        Teachers & Staffs
                    </h3>
                    <p class="text-gray-500">
                        Behind every successful student is a team of dedicated educators and professionals. Our teachers
                        inspire learning with passion and purpose, while our support staff ensures a safe, efficient,
                        and
                        welcoming environment for all.
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2  gap-4 py-10">
                <div class="flex flex-col">
                    <div class="flex justify-center">
                        <UserPen class="size-20" />
                    </div>
                    <p class="text-center text-6xl font-bold text-purple-500">
                        71+
                    </p>
                </div>
                <div>
                    <h3
                        class="text-[var(--primary-brand-500)] border-[var(--primary-brand-500)] p-3 mb-2 border-b-1 border-r-5 text-end">
                        Students
                    </h3>
                    <p class="text-gray-500">
                        Curious minds, bright ideas, and boundless energy — our students bring life to the campus every
                        day.
                        With opportunities to lead, create, and grow, they embody the spirit of learning in every corner
                        of
                        the school.
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2  gap-4 py-10">
                <div class="flex flex-col">
                    <div class="flex justify-center">
                        <GraduationCapIcon class="size-20" />
                    </div>
                    <p class="text-center text-6xl font-bold text-purple-500">
                        71+
                    </p>
                </div>
                <div>
                    <h3
                        class="text-[var(--primary-brand-500)] border-[var(--primary-brand-500)] p-3 mb-2 border-b-1 border-l-5">
                        Alumni
                    </h3>
                    <p class="text-gray-500">
                        Though they've stepped beyond our gates, our alumni remain deeply connected. As achievers across
                        fields and continents, they carry forward the values and vision of our school - and often give
                        back
                        to guide those who follow.
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>