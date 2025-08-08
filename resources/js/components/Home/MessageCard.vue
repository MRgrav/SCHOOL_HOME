<script setup lang="ts">
import { Profile } from '@/types';
import defaultProfileIcon from '@/../../resources/images/defaults/profile.png';
import { Link } from '@inertiajs/vue3';
// import { BookOpenCheck } from 'lucide-vue-next';

interface Props {
    profile: Profile;
}
const props = defineProps<Props>();

const handleImageError = (event: Event) => {
    (event.target as HTMLImageElement).src = defaultProfileIcon;
};
</script>


<template>
    <Link :href="`/profiles/${props.profile.id}`" class="border overflow-hidden border-[var(--primary-brand-500)]/80 border-b-10 border-r-10 rounded-xs block hover:scale-101 transition duration-400 ease-in-out shadow-md">
        <div class="aspect-[4/3] object-center object-cover">
            <img v-if="props.profile.image" :src="`/storage/uploads/${props.profile.image}`"
                class="w-full h-full object-cover" @error="handleImageError" alt="Profile Image" />
            <img v-else :src="defaultProfileIcon" alt="">
        </div>
        <div class="p-4 relative">
            <h3 class="text-[var(--primary-brand-500)] py-1">
                {{ props.profile.role?.display_name || "name" }}
            </h3>
            <h4 class="text-slate-700">
                {{ props.profile.name || "Please Select a Role" }}
            </h4>
            <p class="text-slate-500 max-t text-sm">
                {{ props.profile?.message ? props.profile.message.slice(0, 220) + "..." : "No Message" }}
            </p>
        </div>

        <!-- <div class="w-[200%] h-[100%] top-0 left-0 -translate-x-[50%] hover:translate-x-[0%] absolute transition duration-400 ease-in-out flex opacity-0 hover:opacity-100">
            <div class="w-[50%] h-full bg-blue-800/40 flex justify-center items-center">
                <span class="text-xl text-white flex items-center gap-4 font-bold"><BookOpenCheck style="stroke-width: 3px;"/> Read More</span> 
            </div>
            <div class="w-[50%] h-full">

            </div>
          
        </div> -->
    </Link>
</template>
