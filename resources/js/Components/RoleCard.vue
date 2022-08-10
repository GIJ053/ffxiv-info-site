<template>
    <div class="card w-11/12 lg:card-side shadow-xl"
        :class="findColor(role.id)[0]"
        ref="roleCard"
    >
        <div class="grid items-center gap-y-1 gap-x-1 p-1
            h-2/3 grid-flow-row grid-cols-2 auto-rows-fr
            lg:h-full lg:w-4/5 lg:grid-rows-2 lg:grid-flow-col lg:auto-cols-fr"
        >
            <JobCard v-for="job in role.jobs"
                :job="job"
                :slug="job.slug"
                :color="findColor(role.id)"
            />
        </div>

        <div class="card-body text-white">
            <h2 class="card-title">{{ role.name }}</h2>

            <p>Hello</p>

            <div class="card-actions justify-end">
                <button class="btn border-0" :class="findColor(role.id)[2] + ' ' + findColor(role.id)[3]">More Info</button>
            </div>
        </div>
    </div>
</template>

<script setup>
import JobCard from './JobCard.vue';
import { ref } from 'vue';

    defineProps({
        role: Object,
    });

    let roleCard = ref(null);

    defineExpose({
        roleCard
    })

    function findColor(id) {
        let color = [];
        switch (id) {
            case 1:
                color = ["bg-indigo-500", "bg-indigo-600", "bg-indigo-700", "hover:bg-indigo-900"];
                break;
            case 2:
                color = ["bg-red-600", "bg-red-700", "bg-red-800", "hover:bg-red-900"];
                break;
            case 3:
                color = ["bg-purple-500", "bg-purple-700", "bg-purple-800", "hover:bg-purple-900"];
                break;
            case 4:
                color = ["bg-emerald-400", "bg-emerald-500", "bg-emerald-700", "hover:bg-emerald-900"];
                break;
            default:
                break;
        }
        return color;
    }
</script>

