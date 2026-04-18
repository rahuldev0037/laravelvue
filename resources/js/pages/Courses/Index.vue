<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, usePage } from '@inertiajs/vue3';
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Courses',
        href: '/courses',
    },
];

import { Link, router } from '@inertiajs/vue3';

defineProps({
    courses: []
});

function destroy(id: number) {
    if (confirm('Are you sure you want to delete this course?')) {
        router.delete(`/courses/${id}`)
    }
}

</script>

<template>

    <Head title="Courses List" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="w-full justify-end flex my-4">

                <Link href="/courses/create" class="px-4 py-2 bg-blue-500 text-white rounded">Create Course</Link>
            </div>

            <div
                class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">

                <table class="w-full text-sm text-left rtl:text-right text-body">
                    <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                        <tr>
                            <th scope="col" class="px-6 py-3 font-medium">Name</th>
                            <th scope="col" class="px-6 py-3 font-medium">Short Name</th>
                            <th scope="col" class="px-6 py-3 font-medium">Type</th>
                            <th scope="col" class="px-6 py-3 font-medium">Fee</th>
                            <th scope="col" class="px-6 py-3 font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="course in courses" :key="course.id"
                            class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                            <td class="px-6 py-4">{{ course.name }}</td>
                            <td class="px-6 py-4">{{ course.short_name }}</td>
                            <td class="px-6 py-4">{{ course.type }}</td>
                            <td class="px-6 py-4">{{ course.fee }}</td>
                            <td class="px-6 py-4">
                                <Link :href="`/courses/${course.id}/edit`">Edit</Link>
                                <button @click="destroy(course.id)" class="pl-4">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>
