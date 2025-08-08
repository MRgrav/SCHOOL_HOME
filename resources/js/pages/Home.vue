<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import Hero from '@/components/Home/Hero.vue';
import AboutAndNotification from '@/components/Home/AboutAndNotification.vue';
import MessageCard from '@/components/Home/MessageCard.vue';
import NewsAndEvents from '@/components/Home/NewsAndEvents.vue';
import AboutUs from '@/components/Home/AboutUs.vue';
import Stats from '@/components/Home/Stats.vue';
import Activities from '@/components/Home/Activities.vue';
import { Profile } from '@/types';

/**
 * Props definition
 * The component expects an array of registrations.
 */
interface Props {
  notifications: Notification[]
  profiles: Profile[]
}
const props = defineProps<Props>() // Make props reactive and type-safe.

</script>

<template>
    <Head title="Home">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <AppLayout>
        <Hero />
        <AboutAndNotification :notifications="props.notifications"/>
        <div class="p-8">
            <div class="flex justify-center">
                <h2 class="mt-20 text-[#4e71ff] border-l-4 border-[#4e71ff] px-3">Messages From​</h2>
            </div>
            <div class="flex justify-center my-25">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-15">
                    <div class="md:max-w-[350px]" v-for="(profile, index) in props.profiles" :key="index">
                        <MessageCard v-if="profile" :profile="profile"/>
                    </div>
                </div>
            </div>
        </div>
        <NewsAndEvents/>
        <Stats/>
        <Activities/>
        <AboutUs/>
    </AppLayout>
</template>
