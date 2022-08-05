<template>
    <div class="card w-11/12 lg:card-side bg-base-100 shadow-xl">
        <div class="grid items-center gap-y-1 gap-x-1 p-1
            h-2/3 grid-flow-row grid-cols-2 auto-rows-fr
            lg:h-full lg:w-2/3 lg:grid-rows-2 lg:grid-flow-col lg:auto-cols-fr"
        >
            <JobCard v-for="job in role.jobs" :job="job" :slug="job.slug"/>
        </div>

        <div class="card-body">
            <h2 class="card-title">{{ role.name }}</h2>

            <p>Hello</p>

            <div class="card-actions justify-end">
                <button class="btn btn-secondary">More Info</button>
            </div>
        </div>
    </div>
</template>

<script setup>
import JobCard from './JobCard.vue';

    defineProps({
        role: Object,
    });

</script>

