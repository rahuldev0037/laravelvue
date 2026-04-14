<script setup lang="ts">
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import type { BreadcrumbItemType } from '@/types';

import 'vue3-toastify/dist/index.css'

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});

import { watch } from 'vue'
import { usePage } from '@inertiajs/vue3'
import { toast } from 'vue3-toastify'

const page = usePage()

watch(
    () => page.props.flash,
    (flash: any) => {
        if (!flash) return

        if (flash.success) {
            toast.success(flash.success, {
                toastId: 'flash-success'
            })
        }

        if (flash.error) {
            toast.error(flash.error, {
                toastId: 'flash-error'
            })
        }
    },
    {
        immediate: true,
        deep: true
    }
)
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <slot />
    </AppLayout>
</template>
