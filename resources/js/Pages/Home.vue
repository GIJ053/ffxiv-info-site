<template>
    <div class="carousel carousel-center w-full px-10 py-5 gap-x-10 h-2/3">
        <RoleCard class="carousel-item" v-for="role in roles" :role="role"/>
    </div>
</template>

<script setup>
import RoleCard from '@/Components/RoleCard.vue';

defineProps({
    roles: Array,
});



</script>

