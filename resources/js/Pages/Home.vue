<template>
    <div class="carousel carousel-center w-full px-10 py-5 gap-x-10">
        <JobCard class="carousel-item" v-for="job in jobs" :job="job"/>
    </div>
</template>

<script setup>
import JobCard from '@/Components/JobCard.vue';
import NavLink from '../Shared/NavLink.vue';

defineProps({
    jobs: Array,
});

let jobs = [
    {
        id: 1,
        name: "Tank",
        color: "bg-blue-600",
    },
    {
        id: 2,
        name: "Healer",
        color: "bg-green-400",
    },
    {
        id: 3,
        name: "DPS",
        color: "bg-red-600",
    }
]

</script>

