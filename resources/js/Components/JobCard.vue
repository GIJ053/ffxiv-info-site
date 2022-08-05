<template>
    <div class="card lg:card-side lg:w-11/12 bg-base-100 shadow-xl" :class="job.color">
        <figure><img src="/images/bg.jpg" class="w-full h-60 lg:w-96 lg:h-96 " alt="Album"></figure>
        <div class="card-body">
            <h2 class="card-title">{{ job.name }}</h2>
            <p>Click the button to listen on Spotiwhy app.</p>
            <div class="card-actions justify-end">
                <button class="btn btn-secondary">Listen</button>
            </div>
        </div>
    </div>
</template>

<script setup>
    defineProps({
        job: Object,
    })
</script>
