<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { router, useForm, Head } from '@inertiajs/vue3';

const props = defineProps({
    student: Object,
    departments: Object,
    courses: Object
});

const form = useForm({
    name: props.student.name,
    email: props.student.email,
    phone: props.student.phone,
    department_id: props.student.department_id,
    course_id: props.student.course_id
});

const submit = () => {
    form.put(`/students/${props.student.id}`)
}
</script>

<template>

    <Head title="Update Student" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div
                class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <div class="flex items-center justify-center h-full">

                    <form @submit.prevent="submit"
                        class="bg-white p-6 rounded-2xl shadow-md w-full max-w-md space-y-4 text-black">
                        <h2 class="text-2xl font-bold text-center text-black">Update Student</h2>
                        <div>
                            <label for="department_id" class="block mb-2.5 text-sm font-medium text-heading">
                                Department
                            </label>
                            <select id="department_id" v-model="form.department_id"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body rounded-full">
                                <option value="">Select Department</option>
                                <option v-for="department in departments" :key="department.id" :value="department.id">{{
                                    department.name }}</option>
                            </select>
                        </div>
                        <div>
                            <label for="course_id" class="block mb-2.5 text-sm font-medium text-heading">
                                Course
                            </label>
                            <select id="course_id" v-model="form.course_id"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body rounded-full">
                                <option value="">Select Course</option>
                                <option v-for="course in courses" :key="course.id" :value="course.id">{{ course.name }}
                                </option>

                            </select>
                        </div>
                        <div>
                            <label for="name" class="block mb-2.5 text-sm font-medium text-heading">
                                Name
                            </label>
                            <input type="text" id="name"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body rounded-full"
                                placeholder="Name" v-model="form.name" required />
                        </div>
                        <div>
                            <label for="email" class="block mb-2.5 text-sm font-medium text-heading">
                                Email
                            </label>
                            <input type="email" id="email"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body rounded-full"
                                placeholder="Email" v-model="form.email" required />
                        </div>
                        <div>
                            <label for="phone" class="block mb-2.5 text-sm font-medium text-heading">
                                Phone
                            </label>
                            <input type="text" id="phone"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body rounded-full"
                                placeholder="Phone" v-model="form.phone" />
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