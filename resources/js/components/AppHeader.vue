<script setup lang="ts">
import AppLogo from '@/components/AppLogo.vue';
// import { Button } from '@/components/ui/button';
import { NavigationMenu, NavigationMenuItem, NavigationMenuList, navigationMenuTriggerStyle } from '@/components/ui/navigation-menu';
import { Sheet, SheetContent, SheetTrigger } from '@/components/ui/sheet';
import { Link } from '@inertiajs/vue3';
// import { computed } from 'vue';
import NavigationMenuTrigger from './ui/navigation-menu/NavigationMenuTrigger.vue';
import NavigationMenuContent from './ui/navigation-menu/NavigationMenuContent.vue';
import NavigationMenuLink from './ui/navigation-menu/NavigationMenuLink.vue';
import Infobar from './Infobar.vue';
import Accordion from './ui/accordion/Accordion.vue';
import { AccordionContent } from 'reka-ui';
import AccordionTrigger from './ui/accordion/AccordionTrigger.vue';
import AccordionItem from './ui/accordion/AccordionItem.vue';
import { NavItem } from '@/types';
import { MenuIcon } from 'lucide-vue-next';


// const page = usePage();
// const auth = computed(() => page.props.auth);

// const isCurrentRoute = computed(() => (url: string) => page.url === url);

// const activeItemStyles = computed(
//     () => (url: string) => (isCurrentRoute.value(url) ? 'text-neutral-900 dark:bg-neutral-800 dark:text-neutral-100' : ''),
// );

// Academic navigation items
const AcademicItems: NavItem[] = [
    {
        title: 'Academic Calendar',
        href: '/academic-calendar',
    },
    {
        title: 'Holiday List',
        href: '/holiday-list',
    },
    {
        title: 'School Timing',
        href: '/school-timing',
    },
    {
        title: 'School Uniform',
        href: '/school-uniform',
    },
    {
        title: 'List of Books',
        href: '/list-of-books',
    },
    {
        title: 'Subjects Offered',
        href: '/subjects-offered',
    },
];

// Non-Academic navigation items
const NonAcademicItems: NavItem[] = [
    {
        title: 'News & Events',
        href: '/news-events',
    },
    {
        title: 'Calendar for Sports/Co-curricular activities',
        href: '/sports-calendar',
    },
    {
        title: 'NCC',
        href: '/ncc',
    },
];

const AdmissionItems: NavItem[] = [
    {
        title: 'Online Registration',
        href: '/online-registration',
    },
    {
        title: 'Admission Procedure',
        href: '/admission-procedure',
    },
    {
        title: 'Fees Structure',
        href: '/fees-structure',
    },
    {
        title: 'Testimonials',
        href: '/testimonials',
    },
    {
        title: 'Office Remittances',
        href: '/office-remittances',
    },
    {
        title: 'Transfer Certificate',
        href: '/transfer-certificate',
    },
    {
        title: 'Orientation Program',
        href: '/orientation-program',
    },
    {
        title: 'Age Limits',
        href: '/age-limits',
    },
];

const InfrastructureItems: NavItem[] = [
    {
        title: 'Classrooms',
        href: '/classrooms',
    },
    {
        title: 'Library',
        href: '/library',
    },

    {
        title: 'Playground Sports',
        href: '/playground-sports',
    },
    {
        title: 'Creative & Performing Arts',
        href: '/creative-performing-arts',
    },
    {
        title: 'Medical Care',
        href: '/medical-care',
    },
];

const AchievementsItems: NavItem[] = [
    {
        title: 'Academic Achievements',
        href: '/academic-achievements',
    },
];

const ActivitiesItems: NavItem[] = [
    {
        title: 'Sports',
        href: '/sports',
    },
];

const HouseItems: NavItem[] = [
    {
        title: 'Gandhi House',
        href: '/house/gandhi',
    },
    {
        title: 'Nehru House',
        href: '/house/nehru',
    },
    {
        title: 'Subhash House',
        href: '/house/subhash',
    },
    {
        title: 'Tagore House',
        href: '/house/tagore',
    },

];

const LaboratoryItems: NavItem[] = [
    {
        title: 'Computer Lab',
        href: '/laboratory/computer',
    },
    {
        title: 'Physics Lab',
        href: '/laboratory/physics',
    },
    {
        title: 'Chemistry Lab',
        href: '/laboratory/chemistry',
    },
    {
        title: 'Biology Lab',
        href: '/laboratory/biology',
    },

];


</script>

<template>
    <Infobar/>
    <div class="flex items-center px-4 md:px-10 py-3 shadow-sm">

        <Link :href="'/'" class="flex items-center gap-x-3 w-full lg:w-fit">
            <AppLogo />
        </Link>

        <!-- Mobile Menu -->
        <div class="ml-auto lg:hidden">
            <Sheet>
                <SheetTrigger :as-child="true">
                    <MenuIcon class="size-10 m-auto stroke-gray-600 hover:stroke-gray-900"/>
                </SheetTrigger>
                <SheetContent side="right" class="w-[300px] p-10 pt-20" >
                    <Accordion type="single" class="w-full" collapsible>

                        <NavigationMenuLink :href="'/'" class="block font-['Poppins'] font-semibold px-2 py-4 hover:underline"><span class="">Home</span></NavigationMenuLink>
                        <!-- Divider line between sections-->
                        <hr class="border-t-1 border-gray-200 dark:border-gray-700" />

                        <AccordionItem :value="'Academic'" class="hover:bg-gray-100 px-2">
                            <AccordionTrigger> <span class="font-semibold">Academic</span></AccordionTrigger>
                            <AccordionContent v-for="item in AcademicItems" :key="item.title">
                                <NavigationMenuLink :href="item.href" class="hover:underline p">
                                    {{ item.title }}
                                </NavigationMenuLink>
                            </AccordionContent>
                        </AccordionItem>

                        <AccordionItem :value="'Non Academic'" class="hover:bg-gray-100 px-2">
                            <AccordionTrigger> <span class="font-semibold">Non Academic</span></AccordionTrigger>
                            <AccordionContent v-for="item in NonAcademicItems" :key="item.title">
                                <NavigationMenuLink :href="item.href" class="hover:underline p">
                                    {{ item.title }}
                                </NavigationMenuLink>
                            </AccordionContent>
                        </AccordionItem>

                        <AccordionItem :value="'Admission'" class="hover:bg-gray-100 px-2">
                            <AccordionTrigger> <span class="font-semibold">Admission</span></AccordionTrigger>
                            <AccordionContent v-for="item in AdmissionItems" :key="item.title">
                                <NavigationMenuLink :href="item.href" class="hover:underline p">
                                    {{ item.title }}
                                </NavigationMenuLink>
                            </AccordionContent>
                        </AccordionItem>

                        <AccordionItem :value="'Infrastructure'" class="hover:bg-gray-100 px-2">
                            <AccordionTrigger> <span class="font-semibold">Infrastructure</span></AccordionTrigger>
                            <AccordionContent>
                                <div class=" whitespace-nowrap">
                                    <div class="nav-link p-3 pt-3 font-semibold uppercase text-muted-foreground tracking-wide">
                                        Laboratory
                                    </div>
                                    <!-- Divider line between sections-->
                                    <hr class="border-t border-gray-200 dark:border-gray-700" />

                                    <ul class="w-max">
                                        <li v-for="items in LaboratoryItems" :key="items.title">
                                        <NavigationMenuLink as-child>
                                            <Link
                                            :href="items.href"
                                            class="block select-none rounded-md py-2 px-6 leading-none no-underline outline-none transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground"
                                            >
                                            <div class="py-1 hover:underline">{{ items.title }}</div>
                                            </Link>
                                        </NavigationMenuLink>
                                        </li>
                                    </ul>
                                    <!-- Divider line between sections-->
                                    <hr class="border-t border-gray-200 dark:border-gray-700 mb-2" />
                                </div>
                            </AccordionContent>
                            <AccordionContent v-for="item in InfrastructureItems" :key="item.title">
                                <NavigationMenuLink :href="item.href" class="hover:underline p">
                                    {{ item.title }}
                                </NavigationMenuLink>
                            </AccordionContent>
                        </AccordionItem>

                        <AccordionItem :value="'Activities'" class="hover:bg-gray-100 px-2">
                            <AccordionTrigger> <span class="font-semibold">Activities</span></AccordionTrigger>
                            <AccordionContent>
                                <div class=" whitespace-nowrap">
                                    <div class="nav-link p-3 pt-3 font-semibold uppercase text-muted-foreground tracking-wide">
                                        House
                                    </div>
                                    <!-- Divider line between sections-->
                                    <hr class="border-t border-gray-200 dark:border-gray-700" />

                                    <ul class="w-max">
                                        <li v-for="items in HouseItems" :key="items.title">
                                        <NavigationMenuLink as-child>
                                            <Link
                                            :href="items.href"
                                            class="block select-none rounded-md py-2 px-6 leading-none no-underline outline-none transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground"
                                            >
                                            <div class="py-1 hover:underline">{{ items.title }}</div>
                                            </Link>
                                        </NavigationMenuLink>
                                        </li>
                                    </ul>
                                    <!-- Divider line between sections-->
                                    <hr class="border-t border-gray-200 dark:border-gray-700 mb-2" />
                                </div>
                            </AccordionContent>
                            <AccordionContent v-for="item in ActivitiesItems" :key="item.title">
                                <NavigationMenuLink :href="item.href" class="hover:underline p">
                                    {{ item.title }}
                                </NavigationMenuLink>
                            </AccordionContent>
                        </AccordionItem>

                        <AccordionItem :value="'Achievements'" class="hover:bg-gray-100 px-2">
                            <AccordionTrigger> <span class="font-semibold">Achievements</span></AccordionTrigger>
                            <AccordionContent v-for="item in AchievementsItems" :key="item.title">
                                <NavigationMenuLink :href="item.href" class="hover:underline p">
                                    {{ item.title }}
                                </NavigationMenuLink>
                            </AccordionContent>
                        </AccordionItem>

                        <NavigationMenuLink :href="'/notifications'" class="block font-['Poppins'] font-semibold px-2 py-4 hover:underline"><span class="">Notifications</span></NavigationMenuLink>

                    </Accordion>
                </SheetContent>
            </Sheet>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden lg:flex items-center ml-auto">
            <NavigationMenu >
                <NavigationMenuList >
                    <NavigationMenuItem>
                        <NavigationMenuLink>
                            <Link href="/" class="nav-link">Home</Link>
                        </NavigationMenuLink>
                    </NavigationMenuItem>
                </NavigationMenuList>
            </NavigationMenu>

            <NavigationMenu>
                <NavigationMenuList>
                    <NavigationMenuItem>
                        <NavigationMenuTrigger> <span class="nav-link">Academic</span></NavigationMenuTrigger>
                        <NavigationMenuContent>
                        <ul class="w-max">
                            <li v-for="items in AcademicItems" :key="items.title">
                            <NavigationMenuLink as-child>
                                <Link
                                :href="items.href"
                                class="small select-none space-y-1 rounded-md p-3 leading-none no-underline outline-none transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground"
                                >
                                <div class="nav-link">{{ items.title }}</div>
                                </Link>
                            </NavigationMenuLink>
                            </li>
                        </ul>
                        </NavigationMenuContent>
                    </NavigationMenuItem>
                </NavigationMenuList>
            </NavigationMenu>

            <NavigationMenu>
                <NavigationMenuList>
                    <NavigationMenuItem>
                        <NavigationMenuTrigger> <span class="nav-link">Non Academic</span></NavigationMenuTrigger>
                        <NavigationMenuContent>
                        <ul class="w-max">
                            <li v-for="items in NonAcademicItems" :key="items.title">
                            <NavigationMenuLink as-child>
                                <Link
                                :href="items.href"
                                class="block select-none space-y-1 rounded-md p-3 leading-none no-underline outline-none transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground"
                                >
                                <div class="nav-link">{{ items.title }}</div>
                                </Link>
                            </NavigationMenuLink>
                            </li>
                        </ul>
                        </NavigationMenuContent>
                    </NavigationMenuItem>
                </NavigationMenuList>
            </NavigationMenu>

            <NavigationMenu>
                <NavigationMenuList>
                    <NavigationMenuItem>
                        <NavigationMenuTrigger> <span class="nav-link">Admission</span></NavigationMenuTrigger>
                        <NavigationMenuContent>
                        <ul class="w-max">
                            <li v-for="items in AdmissionItems" :key="items.title">
                            <NavigationMenuLink as-child>
                                <Link
                                :href="items.href"
                                class="block select-none space-y-1 rounded-md p-3 leading-none no-underline outline-none transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground"
                                >
                                <div class="nav-link">{{ items.title }}</div>
                                </Link>
                            </NavigationMenuLink>
                            </li>
                        </ul>
                        </NavigationMenuContent>
                    </NavigationMenuItem>
                </NavigationMenuList>
            </NavigationMenu>

            <NavigationMenu>
                <NavigationMenuList>
                    <NavigationMenuItem>
                        <NavigationMenuTrigger> <span class="nav-link">Infrastructure</span></NavigationMenuTrigger>
                        <NavigationMenuContent>
                            <!-- Grouped Subsection -->
                            <div class="space-y-1 whitespace-nowrap">
                                <div class="nav-link p-3 pt-3 font-semibold uppercase text-muted-foreground tracking-wide">
                                    Laboratory
                                </div>
                                <!-- Divider line between sections-->
                                <hr class="border-t border-gray-100 dark:border-gray-700" />

                                <ul class="w-max">
                                    <li v-for="items in LaboratoryItems" :key="items.title">
                                    <NavigationMenuLink as-child>
                                        <Link
                                        :href="items.href"
                                        class="block select-none space-y-1 rounded-md py-3 px-6 leading-none no-underline outline-none transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground"
                                        >
                                        <div class="nav-link">{{ items.title }}</div>
                                        </Link>
                                    </NavigationMenuLink>
                                    </li>
                                </ul>
                                <!-- Divider line between sections-->
                                <hr class="border-t border-gray-100 dark:border-gray-700" />
                            </div>

                            <ul class="w-max">
                                <li v-for="items in InfrastructureItems" :key="items.title">
                                <NavigationMenuLink as-child>
                                    <Link
                                    :href="items.href"
                                    class="block select-none space-y-1 rounded-md p-3 leading-none no-underline outline-none transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground"
                                    >
                                    <div class="nav-link">{{ items.title }}</div>
                                    </Link>
                                </NavigationMenuLink>
                                </li>
                            </ul>
                        </NavigationMenuContent>
                    </NavigationMenuItem>
                </NavigationMenuList>
            </NavigationMenu>

            <NavigationMenu>
                <NavigationMenuList>
                    <NavigationMenuItem>
                    <NavigationMenuTrigger> <span class="nav-link">Activities</span></NavigationMenuTrigger>
                    <NavigationMenuContent class="w-max whitewrap-nowrap">

                        <!-- Grouped Subsection -->
                        <div class="space-y-1 whitespace-nowrap">
                            <div class=" p-3 py-3 font-semibold uppercase text-muted-foreground tracking-wide nav-link">
                                Houses
                            </div>
                            <!-- Divider line between Activities and Houses -->
                            <hr class="border-t border-gray-100 dark:border-gray-700" />

                            <ul class="w-max">
                                <li v-for="items in HouseItems" :key="items.title">
                                <NavigationMenuLink as-child>
                                    <Link
                                    :href="items.href"
                                    class="block select-none space-y-1 rounded-md py-3 px-6 leading-none no-underline outline-none transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground"
                                    >
                                    <div class="nav-link">{{ items.title }}</div>
                                    </Link>
                                </NavigationMenuLink>
                                </li>
                            </ul>
                            <!-- Divider line between sections-->
                            <hr class="border-t border-gray-100 dark:border-gray-700" />
                            </div>
                                <ul class="w-full">
                                <li v-for="items in ActivitiesItems" :key="items.title">
                                <NavigationMenuLink as-child>
                                    <Link
                                    :href="items.href"
                                    class="block select-none space-y-1 rounded-md p-3 leading-none no-underline outline-none transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground"
                                    >
                                    <div class="nav-link">{{ items.title }}</div>
                                    </Link>
                                </NavigationMenuLink>
                                </li>
                            </ul>

                    </NavigationMenuContent>
                    </NavigationMenuItem>
                </NavigationMenuList>
            </NavigationMenu>


            <NavigationMenu>
                <NavigationMenuList>
                    <NavigationMenuItem>
                        <NavigationMenuTrigger> <span class="nav-link">Achievements</span></NavigationMenuTrigger>
                        <NavigationMenuContent>
                        <ul class="w-max">
                            <li v-for="items in AchievementsItems" :key="items.title">
                            <NavigationMenuLink as-child>
                                <Link
                                :href="items.href"
                                class="block select-none space-y-1 rounded-md p-3 leading-none no-underline outline-none transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground"
                                >
                                <div class="nav-link">{{ items.title }}</div>
                                </Link>
                            </NavigationMenuLink>
                            </li>
                        </ul>
                        </NavigationMenuContent>
                    </NavigationMenuItem>
                </NavigationMenuList>
            </NavigationMenu>

            <NavigationMenu>
                <NavigationMenuList >
                    <NavigationMenuItem>
                        <NavigationMenuLink href="/notifications" :class="navigationMenuTriggerStyle()">
                                <span class="nav-link">Notifications</span>
                        </NavigationMenuLink>
                    </NavigationMenuItem>
                </NavigationMenuList>
            </NavigationMenu>

        </div>
    </div>


        <!-- <div v-if="props.breadcrumbs.length > 1" class="flex w-full border-b border-sidebar-border/70">
            <div class="mx-auto flex h-12 w-full items-center justify-start px-4 text-neutral-500 md:max-w-7xl">
                <Breadcrumbs :breadcrumbs="breadcrumbs" />
            </div>
        </div> -->
    
</template>
