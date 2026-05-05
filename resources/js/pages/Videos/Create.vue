<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/vue3';
import { ref } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Videos',
        href: '/videos',
    },
];

const title = ref('');
const url = ref('');
const thumbnail = ref('');

function saveVideo() {
    router.post('/admin/videos/', {
        title: title.value,
        url: url.value,
        thumbnail: thumbnail.value,
    });
}

</script>

<template>

    <Head title="Create Video" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div
                class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <div class="flex items-center justify-center h-full">

                    <form @submit.prevent="saveVideo"
                        class="bg-white p-6 rounded-2xl shadow-md w-full max-w-md space-y-4 text-black">
                        <h2 class="text-2xl font-bold text-center text-black">Create Video</h2>
                        <div>
                            <label for="title" class="block mb-2.5 text-sm font-medium text-heading">
                                Title
                            </label>
                            <input type="text" id="title"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body rounded-full"
                                placeholder="Title" v-model="title" required />
                        </div>
                        <div>
                            <label for="url" class="block mb-2.5 text-sm font-medium text-heading">
                                URL
                            </label>
                            <input type="text" id="url"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body rounded-full"
                                placeholder="URL" v-model="url" required />
                        </div>
                        <div>
                            <label for="thumbnail" class="block mb-2.5 text-sm font-medium text-heading">
                                Thumbnail
                            </label>
                            <input type="text" id="thumbnail"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body rounded-full"
                                placeholder="Thumbnail" v-model="thumbnail" />
                        </div>

                        <button type="submit"
                            class="bg-purple-500 hover:bg-purple-600 text-white font-medium py-2 px-4 rounded-full">
                            Save
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </AppLayout>
</template>