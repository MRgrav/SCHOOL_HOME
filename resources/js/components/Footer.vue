<script setup lang="ts">
import { NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import AppLogoIcon from './AppLogoIcon.vue';
import { MapPin, Phone, Mail } from 'lucide-vue-next';

// Quick navigation items
const QuickLinks: NavItem[] = [
    {
        title: 'About Us',
        href: '/about',
    },
    {
        title: 'School Magazine',
        href: '/magazine',
    },
    {
        title: 'News & Events',
        href: '/news-events',
    },
    {
        title: 'Admission',
        href: '/admission',
    },
    {
        title: 'Activities',
        href: '/activities',
    },
    {
        title: 'Faculty',
        href: '/faculty',
    },
    {
        title: 'Staff',
        href: '/staff',
    },
];

// Quick navigation items
const QuickLinksItems: NavItem[] = [
    {
        title: 'About Us',
        href: '/about',
    },
    {
        title: 'School Magazine',
        href: '/magazine',
    },
    {
        title: 'News & Events',
        href: '/news-events',
    },
    {
        title: 'Admission',
        href: '/admission',
    },
    {
        title: 'Activities',
        href: '/activities',
    },
    {
        title: 'Faculty',
        href: '/faculty',
    },
    {
        title: 'Staff',
        href: '/staff',
    },
];

// Information navigation items
const InformationItems: NavItem[] = [
    {
        title: 'Rules and Regulations',
        href: '/rules-regulations',
    },
    {
        title: 'Transfer Certificate',
        href: '/transfer-certificate',
    },
    {
        title: 'Notification',
        href: '/notification',
    },
    {
        title: 'Fees Structure',
        href: '/fees-structure',
    },
    {
        title: 'Results',
        href: '/results',
    },
    {
        title: 'Career',
        href: '/career',
    },
];

// Address navigation items
const AddressItems: NavItem[] = [
    {
        title: 'Nefabari, Rowriah, Jorhat - 785005 (ASSAM)',
        href: 'https://maps.app.goo.gl/ToS7tiRbAbFB8qrP7',
        icon: MapPin,
    },
    {
        title: 'Phone: 9395642231',
        href: 'tel:+919395642231',
        icon: Phone,
    },
    {
        title: 'Email: arnsjorhat@ymail.com',
        href: 'mailto:arnsjorhat@ymail.com',
        icon: Mail,
    },
];

</script>

<template>
    <div class="footer">
        <div class="footer-top grid text-center md:text-left grid-cols-1 md:grid-cols-4 p-10 bg-[#182333] text-gray-400 small font-medium gap-x-8 gap-y-4">
            <div class="flex flex-col justify-center items-center text-center">
                <div class="size-20">
                    <AppLogoIcon/>
                </div>
                <p>
                   <span class="font-semibold"> Assam Rifles Public School, Jorhat Established in 1977, affiliated to CBSE.</span>
                    <br/>
                    Offering quality education guided by a dedicated team of trained educators.
                </p>
            </div>
            <div class="flex flex-col items-center md:items-start">
                <h4 class="text-white mb-3">Quick Links</h4>
                <Link class="pb-1 small relative after:bg-gray-300 after:absolute after:h-[1.5px] after:w-0 after:bottom-0 after:left-0 hover:after:w-full after:transition-all after:duration-300 cursor-pointer w-fit" v-for="item in QuickLinks" :key="item.title" :href="item.href">{{ item.title }}</Link>
            </div>
            <div class="flex flex-col items-center md:items-start">
                <h4 class="text-white mb-3">Information</h4>
                <Link class="pb-1 small relative after:bg-gray-300 after:absolute after:h-[1.5px] after:w-0 after:bottom-0 after:left-0 hover:after:w-full after:transition-all after:duration-300 cursor-pointer w-fit" v-for="item in InformationItems" :key="item.title" :href="item.href">{{ item.title }}</Link>
            </div>
            <div class="flex flex-col items-center md:items-start">
                <h4 class="text-white mb-3">Address</h4>
                <a target="_blank" rel="noopener noreferrer" class="pb-1 small relative after:bg-gray-300 after:absolute after:h-[2px] after:w-0 after:bottom-0 after:left-0 hover:after:w-full after:transition-all after:duration-300 cursor-pointer w-fit" v-for="item in AddressItems" :key="item.title" :href="item.href">
                    <span class="flex items-center">
                        <component :is="item.icon" class="size-4 mr-2" />
                        {{ item.title }}
                    </span>
                </a>
            </div>
        </div>
        <div class="footer-bottom grid grid-cols-1 md:grid-cols-2 p-10 bg-[#021526] text-white small gap-y-4">
            <div class="flex flex-col items-center text-center md:items-start">
                <span class="text-gray-400">©2025 ARPS, Jorhat, All Rights Reserved.</span>
                <Link href="https://www.deolang.com/" class="text-blue-800 font-semibold">Powered by DeoLang</Link>
            </div>
            <div class="flex flex-col items-center md:items-end">
                <span class="text-right text-gray-500">Today's visitors: 17</span>
                <span class="text-right text-gray-500">Total visitors : 1,188</span>
            </div>
        </div>
    </div>
</template>
