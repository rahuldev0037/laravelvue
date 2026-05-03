<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

const services = [
    'General Checkup',
    'Cardiology',
    'Dental Care',
    'Pediatrics'
]

const doctors = [
    { name: 'Dr. Sharma', specialization: 'Cardiologist' },
    { name: 'Dr. Verma', specialization: 'Dentist' }
]
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

        <section class="banner">
            <div class="content">
                <h1>Your Health, Our Priority</h1>
                <p>Trusted medical care with experienced doctors and modern facilities.</p>

                <div class="buttons">
                    <button class="primary">Book Appointment</button>
                    <button class="secondary">Learn More</button>
                </div>
            </div>

            <div class="image">
                <img src="/images/doctor1.jpg" alt="Doctor" class="w-full">
            </div>
        </section>

        <section class="hero">
            <h1>Welcome to CarePlus Clinic</h1>
            <p>Your health is our priority</p>
            <button>Book Appointment</button>
        </section>

        <!-- SERVICES -->
        <section class="services">
            <h2>Our Services</h2>
            <div class="grid">
                <div v-for="service in services" :key="service">
                    <h3>{{ service }}</h3>
                </div>
            </div>
        </section>

        <!-- DOCTORS -->
        <section class="doctors">
            <h2>Our Doctors</h2>
            <div v-for="doc in doctors" :key="doc.name">
                <h3>{{ doc.name }}</h3>
                <p>{{ doc.specialization }}</p>
            </div>
        </section>

        <!-- ABOUT -->
        <section class="about">
            <h2>About Us</h2>
            <p>We provide high-quality healthcare with modern facilities.</p>
        </section>

        <!-- CONTACT -->
        <section class="contact">
            <h2>Contact</h2>
            <p>📍 Delhi | 📞 +91-XXXXXXXXXX</p>
        </section>
    </div>
</template>

<style scoped>
.hero {
    text-align: center;
    padding: 60px;
    background: #e3f2fd;
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