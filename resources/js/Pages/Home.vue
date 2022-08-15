<template>
    <div class="carousel carousel-center w-full px-10 py-5 gap-x-10 h-3/4 font-wacky text-neutral-content lg:px-16"
        ref="carousel"
        @scroll="onScroll"
    >

        <button class="hidden lg:flex btn btn-circle z-10 absolute top-80 left-2 "
            @click="goDirection('L')"
            :disabled="leftButton"
        >
            <img src="/images/double-arrowhead-pointing-to-left-svgrepo-com.svg" class="h-3/5"/>
        </button>

        <RoleCard class="carousel-item" v-for="role in roles" :role="role" :id="role.id"/>

        <button class="hidden lg:flex btn btn-circle absolute z-10 top-80 right-2"
            @click="goDirection('R')"
            :disabled="rightButton"
        >
            <img src="/images/double-arrowhead-pointing-to-left-svgrepo-com.svg" class="h-3/5 rotate-180"/>
        </button>
    </div>

    <!-- Card Navigation -->

    <div class="hidden lg:flex btn-group self-center gap-x-4 pt-8">
        <div class="tooltip" data-tip="Tanks">
            <img src="https://xivapi.com/cj/misc/bordered_tank.png"
                class="btn btn-square btn-lg rounded-none bg-transparent border-none hover:bg-transparent"
                @click="goToCard(1)"
            />
        </div>

        <div class="tooltip" data-tip="Melee DPS">
            <img src="https://xivapi.com/cj/misc/bordered_dps.png"
                class="btn btn-square btn-lg bg-transparent border-none hover:bg-transparent"
                @click="goToCard(2)"
            />
        </div>

        <div class="tooltip" data-tip="Ranged DPS">
            <img src="https://xivapi.com/cj/misc/bordered_dps_ranged.png"
                class="btn btn-square btn-lg bg-transparent border-none hover:bg-transparent"
                @click="goToCard(3)"
            />
        </div>

        <div class="tooltip" data-tip="Healers">
            <img src="https://xivapi.com/cj/misc/bordered_healer.png"
                class="btn btn-square btn-lg rounded-none bg-transparent border-none hover:bg-transparent"
                @click="goToCard(4)"
            />
        </div>
    </div>
</template>

<script setup>
import RoleCard from '@/Components/RoleCard.vue';
import { ref } from 'vue';

defineProps({
    roles: Array,
});

let carousel = ref();
let leftButton = ref(true);
let rightButton = ref(false);

function goToCard(cardNumber) {
    carousel.value.children[cardNumber].scrollIntoView();
}

function goDirection(direction) {
    let halfWidth = window.innerWidth / 2;
    direction === 'L' ? carousel.value.scrollLeft -= halfWidth : carousel.value.scrollLeft += halfWidth;
}

function onScroll(e) {
    const { scrollLeft, offsetWidth, scrollWidth } = e.target;
    Math.ceil(scrollLeft) + offsetWidth >= scrollWidth ? rightButton.value = true : rightButton.value = false;
    Math.floor(scrollLeft) == 0 ? leftButton.value = true : leftButton.value = false;
}
</script>

<style scoped>

</style>
