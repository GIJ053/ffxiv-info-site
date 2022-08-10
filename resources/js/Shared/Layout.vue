<template>
    <Head>
        <title>FFXIV Job Site</title>

        <meta
            type="description"
            content="Site to provide info on skills and combos for Jobs in FFXIV"
            head-key="description"
        >
    </Head>

    <Nav>
        <slot />
    </Nav>

</template>

<script setup>
    import Nav from './Nav.vue';
    import { Head } from '@inertiajs/inertia-vue3';

    defineProps({
        username: String,
    });
</script>
