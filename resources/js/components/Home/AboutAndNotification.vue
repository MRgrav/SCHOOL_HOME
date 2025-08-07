<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { CalendarDays, ArrowBigRight } from 'lucide-vue-next';
/**
 * Props definition
 * The component expects an array of registrations.
 */
interface Props {
  notifications: Notification[]
}
const props = defineProps<Props>() // Make props reactive and type-safe.


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
            <div class="bg-blue-950/97 py-8 backdrop-blur-xs px-10">
                <div class="flex justify-center">
                    <h2 class="border-l-6 mb-8 border-white ps-6 ">Notifications</h2>
                </div>
                <ul class="space-y-2">
                    <li v-for="notification in props.notifications" :key="notification.id">
                         <Link :href="`/notifications/${notification.id}`">
                            <h3 class="text-lg mb-3 font-semibold">{{ notification.title }}</h3>
                            <div class="flex gap-4 items-center text-white/80">
                                <CalendarDays class="size-5"/>
                                {{
                                    new Date(notification.created_at).toLocaleString('en-CA', {
                                    year: 'numeric',
                                    month: '2-digit',
                                    day: '2-digit',
                                    hour: '2-digit',
                                    minute: '2-digit',
                                    })
                                }}
                            </div>
                            <hr class="mt-4 border-white/50">
                        </Link>
                    </li>
                </ul>
                <div class="flex justify-center items-center mt-3">
                    <Link href="/notifications" class="flex items-center">
                        <span>Read More</span>
                        <ArrowBigRight class="size-5"/>
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>