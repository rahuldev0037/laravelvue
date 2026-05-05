<script setup lang="ts">
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link, router } from '@inertiajs/vue3';
import { VideoIcon, UserIcon, BookOpen, Folder, LayoutGrid } from 'lucide-vue-next';
import AppLogo from './AppLogo.vue';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        url: '/admin/dashboard',
        href: '/admin/dashboard',
        icon: LayoutGrid,

    },
    {
        title: 'Department',
        url: '/admin/departments',
        href: '/admin/departments',
        icon: BookOpen,
    },
    {
        title: 'Courses',
        url: '/admin/courses',
        href: '/admin/courses',
        icon: BookOpen,
    },
    {
        title: 'Students',
        url: '/admin/students',
        href: '/admin/students',
        icon: UserIcon,
    },
    {
        title: 'Videos',
        url: '/admin/videos',
        href: '/admin/videos',
        icon: VideoIcon,
    },

];

const footerNavItems: NavItem[] = [
    {
        title: 'Github Repo',
        href: 'https://github.com/laravel/vue-starter-kit',
        icon: Folder,
    },
    {
        title: 'Documentation',
        href: 'https://laravel.com/docs/starter-kits',
        icon: BookOpen,
    },
];
</script>

<template>
    <Sidebar collapsible="icon" variant="sidebar">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="route('dashboard')">
                            <AppLogo />
                        </Link>

                    </SidebarMenuButton>
                </SidebarMenuItem>
                <!--  -->
            </SidebarMenu>

        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
        </SidebarContent>

        <SidebarFooter>
            <!-- <NavFooter :items="footerNavItems" /> -->
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
