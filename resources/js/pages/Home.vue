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

const data = [
    {
        image: "hero-2.jpeg",
        name: "Uday Subba",
        title: "Principle",
        message: "Dear Students, Parents, and Esteemed Members of the Assam Rifles Public School Community,I extend my warm greetings to all of you.At Assam Rifles Public School, our commitment is to provide a nurturing environment that fosters academic excellence, character development, and holistic growth. Our dedicated faculty and staff work tirelessly to ensure that each student receives a well-rounded education, equipping them with the skills and values necessary to navigate the challenges of the future."
    },
    {
        image: "hero-3.jpeg",
        name: "Tiklu Subba",
        title: "Principle",
        message: "Dear Students, Parents, and Esteemed Members of the Assam Rifles Public School Community,I extend my warm greetings to all of you.At Assam Rifles Public School, our commitment is to provide a nurturing environment that fosters academic excellence, character development, and holistic growth. Our dedicated faculty and staff work tirelessly to ensure that each student receives a well-rounded education, equipping them with the skills and values necessary to navigate the challenges of the future."
    },
    {
        image: "hero-1.jpeg",
        name: "Ajoy Subba",
        title: "Principle",
        message: "Dear Students, Parents, and Esteemed Members of the Assam Rifles Public School Community,I extend my warm greetings to all of you.At Assam Rifles Public School, our commitment is to provide a nurturing environment that fosters academic excellence, character development, and holistic growth. Our dedicated faculty and staff work tirelessly to ensure that each student receives a well-rounded education, equipping them with the skills and values necessary to navigate the challenges of the future."
    }
]


</script>

<template>
    <Head title="Home">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <AppLayout>
        <Hero />
        <AboutAndNotification/>
        <div class="p-8">
            <h2 class="text-center mt-10">Messages From​</h2>
            <div class="flex justify-center my-16">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-15">
                    <div class="max-w-[320px]" v-for="index in 3" :key="index - 1">
                        <MessageCard v-bind="data[index - 1]"/>
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
