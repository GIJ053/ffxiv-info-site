<template>
    <div id=jobCard class="w-full h-full flex">
        <div class="flex-1 rounded-l-lg flex flex-col items-center justify-around py-4" :class="color[2]">
            <p class="text-center
                text-[8px]
                sm:text-xs
                md:text-lg
                lg:text-2xl"
            >
                {{ job.name }}
            </p>

            <img :src="'https://xivapi.com/cj/1/' + job.slug + '.png'"
                class="h-14 w-14
                    lg:h-28 lg:w-28"
            />
        </div>

        <div class="flex-1 btn-group btn-group-vertical">
            <Link class="btn btn-xs flex-1 rounded-l-none rounded-r-lg border-0
                md:btn-sm
                lg:btn-md
                xl:btn-lg"
                :href="'/jobs/' + job.slug + '/actions'"
                :class="color[2] + ' ' + color[3]"
            >
                Actions
            </Link>

            <Link class="btn btn-xs flex-1 rounded-l-none rounded-r-lg border-0
                md:btn-sm
                lg:btn-md
                xl:btn-lg"
                :href="'/jobs/' + job.slug + '/traits'"
                :class="color[2] + ' ' + color[3]"
            >
                Traits
            </Link>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";

let props = defineProps({
    job: Object,
    color: Array,
});
</script>

