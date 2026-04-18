<script setup>
import { router, useForm } from '@inertiajs/vue3';
import { reactive } from 'vue';

const props = defineProps({
    post: Object
});

const form = useForm({
    name: props.post.name,
    short_name: props.post.short_name,
    type: props.post.type,
    fee: props.post.fee
});

// const form = reactive({
//     title: props.post.title,
//     content: props.post.content
// });


const submit = () => {
    form.put(`/courses/${props.post.id}`)
}
</script>

<template>

    <Head title="CreateCourses" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div
                class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <div class="flex items-center justify-center h-full">

                    <form @submit.prevent="submit"
                        class="bg-white p-6 rounded-2xl shadow-md w-full max-w-md space-y-4 text-black">
                        <h2 class="text-2xl font-bold text-center text-black">Update Course</h2>
                        <div>
                            <label for="name" class="block mb-2.5 text-sm font-medium text-heading">
                                Name
                            </label>
                            <input type="text" id="name"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body rounded-full"
                                placeholder="Name" v-model="form.name" required />
                        </div>
                        <div>
                            <label for="short_name" class="block mb-2.5 text-sm font-medium text-heading">
                                Short Name
                            </label>
                            <input type="text" id="short_name"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body rounded-full"
                                placeholder="Short Name" v-model="form.short_name" required />
                        </div>
                        <div>
                            <label for="type" class="block mb-2.5 text-sm font-medium text-heading">
                                Type
                            </label>

                            <select id="type" v-model="form.type"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body rounded-full">
                                <option value="">Select Type</option>
                                <option value="online">Online</option>
                                <option value="offline">Offline</option>
                            </select>
                        </div>
                        <div>
                            <label for="fee" class="block mb-2.5 text-sm font-medium text-heading">
                                Fee
                            </label>
                            <input type="text" id="fee"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body rounded-full"
                                placeholder="Fee" v-model="form.fee" required />
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