<template>
    <div id=jobCard class="w-full h-full flex">
        <div class="flex-1 bg-slate-700 rounded-l-lg flex flex-col items-center justify-around">
            <p class="text-white
                text-2xs
                md:text-xl
                lg:text-2xl"
            >
                {{ job.name }}
            </p>

            <img :src="'https://xivapi.com/cj/1/' + slug + '.png'"
                class="h-16 w-16
                    md:h-24 md:w-24
                    lg:h-32 lg:w-32"
            />
        </div>

        <div class="flex-1 btn-group btn-group-vertical">
            <button class="btn btn-xs flex-1 rounded-l-none rounded-r-lg
                md:btn-sm
                lg:btn-lg"
            >
                Skills
            </button>

            <button class="btn btn-xs flex-1 rounded-l-none rounded-r-lg
                md:mtn-sm
                lg:btn-lg"
            >
                Traits
            </button>
        </div>
    </div>
</template>

<script setup>

let props = defineProps({
    job: Object,
    slug: String,
});



</script>

