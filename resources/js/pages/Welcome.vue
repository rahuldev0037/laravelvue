<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted } from 'vue'
const videoId = "jt6NMDM_nP4";

const slides = [
    '/images/banner1.jpg',
    '/images/banner2.jpg',
    '/images/banner3.jpg'
];

const current = ref(0)
let interval = null

const next = () => {
    current.value = (current.value + 1) % slides.length
}

const prev = () => {
    current.value =
        (current.value - 1 + slides.length) % slides.length
}

const props = defineProps({
    videos: Object
});

onMounted(() => {
    interval = setInterval(next, 3000)
})

onUnmounted(() => {
    clearInterval(interval)
})

</script>

<template>

    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <div
        class="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-6 text-[#1b1b18] dark:bg-[#0a0a0a] lg:justify-center lg:p-8">
        <header class="not-has-[nav]:hidden mb-6 w-full max-w-[335px] text-sm lg:max-w-4xl">
            <nav class="flex items-center justify-end gap-4">
                <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                    class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]">
                    Dashboard
                </Link>
                <template v-else>
                    <Link :href="route('login')"
                        class="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]">
                        Log in
                    </Link>
                    <Link :href="route('register')"
                        class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]">
                        Register
                    </Link>
                </template>
            </nav>
        </header>

        <div class="relative w-full h-[500px] overflow-hidden">

            <!-- Slides -->
            <div class="flex transition-transform duration-700" :style="`transform: translateX(-${current * 100}%)`">
                <div v-for="(slide, index) in slides" :key="index"
                    class="w-full flex-shrink-0 h-[500px] bg-cover bg-center"
                    :style="`background-image: url(${slide})`"></div>
            </div>

            <!-- Controls -->
            <button @click="prev" class="absolute left-4 top-1/2 text-white">‹</button>
            <button @click="next" class="absolute right-4 top-1/2 text-white">›</button>
        </div>

        <div class="grid grid-rows-4 gap-4">

            <div v-for="video in videos" :key="video.id" class="w-full max-w-4xl mt-10">

                <div class="border rounded-lg overflow-hidden shadow-md">
                    <iframe width="100%" height="250"
                        :src="`https://www.youtube.com/embed/${video.url.split('watch?v=')[1]}`"
                        title="YouTube video player" frameborder="10"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>

            <!-- <iframe width="100%" height="200" :src="`https://www.youtube.com/embed/${video.url}`"
                    title="YouTube video player" frameborder="10"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe> -->
        </div>



    </div>
</template>

<style scoped>
.hero {
    text-align: center;
    padding: 60px;
    background: #e3f2fd;
}

.video-container {
    width: 100%;
    margin: 40px auto;
}

.services,
.doctors,
.about,
.contact {
    padding: 40px;
}

.grid {
    display: flex;
    gap: 20px;
}

.banner {
    height: 500px;
    background-image: url('/images/doctor1.jpg');
    background-attachment: fixed;
    /* key line */
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
}

.content {
    max-width: 50%;
}

h1 {
    font-size: 40px;
    color: #0d47a1;
}

p {
    margin: 20px 0;
    color: #555;
}

.buttons {
    display: flex;
    gap: 15px;
}

button {
    padding: 12px 20px;
    border: none;
    cursor: pointer;
    border-radius: 6px;
}

.primary {
    background: #1976d2;
    color: white;
}

.secondary {
    background: transparent;
    border: 1px solid #1976d2;
    color: #1976d2;
}

.image img {
    width: 400px;
}
</style>