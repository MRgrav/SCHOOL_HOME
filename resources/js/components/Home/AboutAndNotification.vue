<script setup lang="ts">
import { CalendarDays, ArrowBigRight } from 'lucide-vue-next';
// import { defineProps } from 'vue';

// const props = defineProps({
//     about: String,
// });

const notifications = [
    {
        "Title":"Test Notification",
        "Message": "This is a test notification",
        "Date": "2023-10-01:10:00",
    },
    {
        "Title": "Another Notification",
        "Message": "This is another notification",
        "Date": "2023-10-02:11:00",
    },
    {
        "Title": "Important Update",
        "Message": "Please read this important update",
        "Date": "2023-10-03:12:00",
    }
]

</script>


<template>
    <div class="grid grid-cols-1 lg:grid-cols-2 bg-[var(--primary-brand-500)] p-8 text-white gap-10">
        <div class="grid place-content-center p-8 gap-6">
            <h2>About Us</h2>
            <p>
                If you’re looking to belong to a friendly, close-knit community, DWU might just be the perfect place for you. Our campus is lively and filled with a strong, genuine and supportive group of people that are here to nourish your growth and development.
                "DWU is about community. If you want a space where you can authentically grow into the best version of yourself, DWU is the place for you."
            </p>
        </div>
        <div class="bg-[url('/storage/uploads/hero-1.jpeg')] bg-cover bg-center">
            <div class="bg-blue-950/97 py-8 backdrop-blur-xs px-10 ">
                <div class="flex justify-center mb-8">
                    <h2 class="border-l-6 border-white ps-6 ">Notifications</h2>
                </div>
                <ul class="space-y-5">
                    <li v-for="(notification, index) in notifications" :key="index">
                        <h3 class="text-lg font-semibold">{{ notification.Title }}</h3>
                        <br>
                        <div class="flex gap-5 align-middle ">
                            <CalendarDays/>{{ notification.Date }}
                        </div>
                        <hr class="mt-5">
                    </li>
                </ul>
                <div class="flex justify-center items-center mt-5">
                    <span>Read More</span>
                    <ArrowBigRight class="size-5"/>
                </div>
            </div>
        </div>
    </div>
</template>