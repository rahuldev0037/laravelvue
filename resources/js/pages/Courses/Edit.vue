<script setup>
import { router } from '@inertiajs/vue3';
import { reactive } from 'vue';

const props = defineProps({
    post: Object
});

const form = reactive({
    title: props.post.title,
    content: props.post.content
});

function submit() {
    router.put(`/posts/${props.post.id}`, form);
}
</script>

<template>
    <div>
        <h1>Edit Post</h1>

        <form @submit.prevent="submit">
            <input v-model="form.title" />
            <textarea v-model="form.content"></textarea>

            <button type="submit">Update</button>
        </form>
    </div>
</template>