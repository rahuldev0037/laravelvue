<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { router, useForm, Link, Head } from '@inertiajs/vue3';

// import '@coreui/coreui/dist/css/coreui.min.css'
const videoId = "jt6NMDM_nP4";

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Videos',
        href: '/videos',
    },
];

const props = defineProps({
    videos: Object
});

function destroy(id: number) {
    if (confirm('Are you sure you want to delete this video?')) {
        router.delete(`/videos/${id}`)
    }
}

</script>

<template>

    <Head title="Videos List" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="w-full justify-end flex my-4">

                <Link href="/admin/videos/create" class="px-4 py-2 bg-blue-500 text-white rounded">Create Video</Link>
            </div>

            <div
                class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">

                <table class="w-full text-sm text-left rtl:text-right text-body">
                    <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                        <tr>
                            <th scope="col" class="px-6 py-3 font-medium">S. no.</th>

                            <th scope="col" class="px-6 py-3 font-medium">Title</th>
                            <th scope="col" class="px-6 py-3 font-medium">URL</th>
                            <th scope="col" class="px-6 py-3 font-medium">Thumbnail</th>
                            <th scope="col" class="px-6 py-3 font-medium">Published</th>
                            <th scope="col" class="px-6 py-3 font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(video, index) in videos" :key="video.id"
                            class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">

                            <td class="px-6 py-4">{{ index + 1 }}</td>

                            <td class="px-6 py-4">{{ video.title }}</td>

                            <td class="px-6 py-4">{{ video.url }}</td>

                            <td class="px-6 py-4">
                                <iframe width="100%" height="200" :src="`https://www.youtube.com/embed/${video.url}`"
                                    title="YouTube video player" frameborder="10"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </td>

                            <td class="px-6 py-4">
                                <span
                                    :class="`px-2 py-1 rounded-full text-xs font-medium ${video.is_published ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}`">
                                    {{ video.is_published ? 'Published' : 'Not Published' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <Link :href="`/admin/videos/${video.id}/edit`"
                                    class="bg-blue-500 py-1 px-3 rounded text-white hover:bg-blue-600">Edit</Link>
                                <button @click="destroy(video.id)"
                                    class="pl-4 bg-red-500 text-white py-1 px-3 rounded ml-1 hover:bg-red-600">Delete</button>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>