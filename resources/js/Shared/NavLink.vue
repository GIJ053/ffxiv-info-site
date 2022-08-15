<template>
    <Link
        class="btn btn-primary self-center"
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
