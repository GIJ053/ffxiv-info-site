<template>
    <Link
        class="btn"
        :class="{'btn-disabled': active}"
    >
        <slot />
    </Link>
</template>

<script setup>
    import { Link } from '@inertiajs/inertia-vue3';

    defineProps({
        active: Boolean,
    });
</script>
