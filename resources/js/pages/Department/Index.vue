<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/vue3';
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
                <Link :href="`/departments/${department.id}/edit`">Edit</Link>
                <button @click="destroy(department.id)" class="pl-4">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AppLayout>
</template>