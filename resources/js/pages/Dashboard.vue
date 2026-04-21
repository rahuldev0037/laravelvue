<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

defineProps<{
    departments?: string;
    courses?: string;
}>();
</script>

<template>

    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-4">
                <div>
                    <div class="bg-white shadow rounded-xl p-5 border-l-4 border-indigo-500">
                        <h2 class="text-gray-500">Total Departments</h2>
                        <p class="text-3xl font-bold">{{ departments }}</p>
                    </div>
                </div>
                <div>
                    <div class="bg-white shadow rounded-xl p-5 border-l-4 border-green-500">
                        <h2 class="text-gray-500">Total Courses</h2>
                        <p class="text-3xl font-bold">{{ courses }}</p>
                    </div>
                </div>
                <div>
                    <div class="bg-white shadow rounded-xl p-5 border-l-4 border-pink-500">
                        <h2 class="text-gray-500">Total Students</h2>
                        <p class="text-3xl font-bold">1000</p>
                    </div>
                </div>
                <div>
                    <div class="bg-white shadow rounded-xl p-5 border-l-4 border-purple-500">
                        <h2 class="text-gray-500">Total Rumours</h2>
                        <p class="text-3xl font-bold">200</p>
                    </div>
                </div>
            </div>
            <div
                class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <!-- <PlaceholderPattern /> -->
            </div>
        </div>
    </AppLayout>
</template>
