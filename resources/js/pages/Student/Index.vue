<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { router, useForm, Link, Head } from '@inertiajs/vue3';
import { reactive } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Department',
        href: '/departments',
    },
];

const props = defineProps({
    students: Object
});

function destroy(id: number) {
    if (confirm('Are you sure you want to delete this department?')) {
        router.delete(`/students/${id}`)
    }
}
</script>

<template>

    <Head title="Students List" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="w-full justify-end flex my-4">

                <Link href="/students/create" class="px-4 py-2 bg-blue-500 text-white rounded">Create Student</Link>
            </div>

            <div
                class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">

                <table class="w-full text-sm text-left rtl:text-right text-body">
                    <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                        <tr>
                            <th scope="col" class="px-6 py-3 font-medium">S. no.</th>
                            <th scope="col" class="px-6 py-3 font-medium">Dept Name</th>
                            <th scope="col" class="px-6 py-3 font-medium">Course Name</th>
                            <th scope="col" class="px-6 py-3 font-medium">Name</th>
                            <th scope="col" class="px-6 py-3 font-medium">Email</th>
                            <th scope="col" class="px-6 py-3 font-medium">Phone</th>
                            <th scope="col" class="px-6 py-3 font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(student, index) in students" :key="student.id"
                            class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                            <td class="px-6 py-4">{{ index + 1 }}</td>
                            <td class="px-6 py-4">{{ student.department?.name }}</td>
                            <td class="px-6 py-4">{{ student.course?.name }}</td>
                            <td class="px-6 py-4">{{ student.name }}</td>
                            <td class="px-6 py-4">{{ student.email }}</td>
                            <td class="px-6 py-4">{{ student.phone }}</td>
                            <td class="px-6 py-4">
                                <Link :href="`/students/${student.id}/edit`"
                                    class="bg-blue-500 py-1 px-3 rounded text-white hover:bg-blue-600">Edit</Link>
                                <button @click="destroy(student.id)"
                                    class="pl-4 bg-red-500 text-white py-1 px-3 rounded ml-1 hover:bg-red-600">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>