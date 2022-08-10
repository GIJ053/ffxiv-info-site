<template>
    <Link
        class="btn btn-primary"
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
