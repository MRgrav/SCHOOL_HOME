<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue'
import { type Profile } from '@/types'
import { Head } from '@inertiajs/vue3'
import defaultProfileIcon from '@/../../resources/images/defaults/profile.png';

const props = defineProps<{ profile: Profile }>()

const handleImageError = (event: Event) => {
    (event.target as HTMLImageElement).src = defaultProfileIcon;
};
</script>

<template>

    <Head :title="`${props.profile.name} - Profile`" />

    <AppLayout>
        <!-- Hero Section -->
        <div class="relative bg-gradient-to-b from-blue-500 to-[var(--primary-brand-500)] h-40">
            <div class="absolute inset-0 bg-black/20"></div>
        </div>

        <!-- Profile Card Overlapping Hero -->
        <div class="p-8 -mt-40 relative z-10">
            <div class="bg-white  rounded-lg overflow-hidden border shadow-sm">
     
                <div class="gap-8 flex flex-col md:flex-row py-8">
                    <!-- Left Column: Profile Image -->
                    <div class="flex flex-col items-center p-8">
                        <img :src="`/storage/uploads/${props.profile.image}`" alt="Profile Image"
                            @error="handleImageError($event)"
                            class="aspect-1/1 max-w-[350px] rounded-lg object-cover" />
                    </div>
                    <div class="flex flex-col justify-center p-8 gap-4">
                        <h1 class="font-bold text-gray-900">{{ props.profile.name }}</h1>

                        <!-- Role & Department Badges -->
                        <div class="flex flex-wrap gap-2 mt-2">
                            <span v-if="props.profile.role?.display_name"
                                class="bg-blue-200 text-blue-800 px-3 py-1 rounded-full font-medium">
                                {{ props.profile.role.display_name }}
                            </span>
                            <span v-if="props.profile.department"
                                class="bg-green-300 text-green-800 px-3 py-1 rounded-full font-medium">
                                {{ props.profile.department }}
                            </span>
                            <span v-if="props.profile.position"
                                class="bg-red-200 text-red-800 px-3 py-1 rounded-full font-medium">
                                {{ props.profile.position }}
                            </span>
                        </div>

                        <!-- About -->
                        <div class="mt-6">
                            <h2 class="font-semibold text-gray-800 mb-2">About</h2>
                            <p v-if="props.profile.detail" class="text-gray-700 leading-relaxed">
                                {{ props.profile.detail }}
                            </p>
                            <p v-else class="text-gray-500 italic">No additional information available.</p>
                        </div>
                    </div>
                </div>
      
                <!-- Personal Message -->
                <div v-if="props.profile.message" class="p-8 lg:p-16 bg-slate-100/50 border border-t-0 rounded-b-lg">
                    <h2 class="font-semibold text-gray-800 mb-8">Message</h2>
                    <div class="text-gray-700 italic whitespace-pre-line">
                        "{{ props.profile.message }}"
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
