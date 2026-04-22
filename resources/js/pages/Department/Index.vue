<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/vue3';
import { ref } from 'vue';
const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Department',
    href: '/departments',
  },
];

defineProps({
  departments: []
});

function destroy(id: number) {
  if (confirm('Are you sure you want to delete this department?')) {
    router.delete(`/departments/${id}`)
  }
}
const showModal = ref(false)

const openModal = () => {
  showModal.value = true
}

const closeModal = () => {
  showModal.value = false
}
</script>

<template>

  <Head title="Departments List" />

  <AppLayout :breadcrumbs="breadcrumbs">

    <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">

      <div class="w-full justify-end flex my-4">

        <Link href="/departments/create" class="px-4 py-2 bg-blue-500 text-white rounded">Create Department</Link>
      </div>

      <div
        class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">

        <table class="w-full text-sm text-left rtl:text-right text-body">
          <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
            <tr>
              <th scope="col" class="px-6 py-3 font-medium">S.no.</th>
              <th scope="col" class="px-6 py-3 font-medium">Name</th>
              <th scope="col" class="px-6 py-3 font-medium">Code</th>
              <th scope="col" class="px-6 py-3 font-medium">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(department, index) in departments" :key="department.id"
              class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
              <td class="px-6 py-4">{{ index + 1 }}</td>
              <td class="px-6 py-4">{{ department.name }}</td>
              <td class="px-6 py-4">{{ department.code }}</td>
              <td class="px-6 py-4">
                <Link :href="`/departments/${department.id}/edit`"
                  class="bg-blue-500 py-1 px-3 rounded text-white hover:bg-blue-600">Edit</Link>
                <button @click="destroy(department.id)"
                  class="pl-4 bg-red-500 text-white py-1 px-3 rounded ml-1 hover:bg-red-600">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>


      </div>
    </div>
  </AppLayout>
</template>

<style>
/* BACKDROP */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.25s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

/* SLIDE FROM TOP */
.slide-down-enter-active {
  transition: all 0.35s cubic-bezier(0.22, 1, 0.36, 1);
}

.slide-down-leave-active {
  transition: all 0.25s ease;
}

.slide-down-enter-from {
  opacity: 0;
  transform: translateY(-80px);
}

.slide-down-enter-to {
  opacity: 1;
  transform: translateY(0);
}

.slide-down-leave-from {
  opacity: 1;
  transform: translateY(0);
}

.slide-down-leave-to {
  opacity: 0;
  transform: translateY(-60px);
}
</style>