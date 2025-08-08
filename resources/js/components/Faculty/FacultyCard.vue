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
    <Link :href="`/profiles/${props.profile.id}`" class="block rounded-tl-4xl rounded-tr-lg rounded-br-4xl rounded-bl-lg hover:rounded-tl-lg hover:rounded-tr-4xl hover:rounded-br-lg hover:rounded-bl-4xl duration-200 ease-in-out overflow-hidden relative">
        <div class="aspect-[1/1] object-center object-cover">
            <img v-if="props.profile.image" :src="`/storage/uploads/${props.profile.image}`"
                class="w-full h-full object-cover" @error="handleImageError" alt="Profile Image" />
            <img v-else :src="defaultProfileIcon" alt="">
        </div>
        <div class="p-4 bg-[#ff7c7c] text-white text-center">
            <h3>
                {{ props.profile.name || "Please enter name" }}
            </h3>
            <p class="opacity-70 font-semibold">
                {{ props.profile.detail || "Please enter a details" }}
            </p>
        </div>
        <div class="w-full h-full opacity-0 hover:opacity-100 bg-blue-900/20 absolute top-0 left-0 duration-300 ease-in-out flex justify-center items-end">
            <!-- <span class="text-white font-bold flex gap-2 text-xl"> <UserSearch class="size-10"/></span> -->
        </div>
    </Link>
</template>
