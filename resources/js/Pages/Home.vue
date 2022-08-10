<template>
    <div class="carousel carousel-center w-full px-10 py-5 gap-x-10 h-3/4 font-wacky"
        ref="carousel"
        >
        <button class="hidden lg:flex btn btn-circle z-10 absolute top-80 left-2 "
            @click="goToCard('L')"
            :disabled="currentCard == 0"
            >
            <img src="/images/double-arrowhead-pointing-to-left-svgrepo-com.svg" class="h-3/5"/>
        </button>

        <RoleCard class="carousel-item" v-for="role in roles" :role="role" :id="role.id" ref="roleCard"/>

        <button class="hidden lg:flex btn btn-circle absolute z-10 top-80 right-2"
            @click="goToCard('R')"
            :disabled="currentCard == 3"
            >
            <img src="/images/double-arrowhead-pointing-to-left-svgrepo-com.svg" class="h-3/5 rotate-180"/>
        </button>
    </div>
</template>

<script setup>
import RoleCard from '@/Components/RoleCard.vue';
import { ref } from 'vue';

defineProps({
    roles: Array,
});

let roleCard = ref([]);
let currentCard = ref(0);
let carousel = ref(0);

function goToCard(direction) {
    direction === 'L' ? currentCard.value-- : currentCard.value++;

    roleCard.value[currentCard.value].roleCard.scrollIntoView({
        block: 'nearest'
    })
}
</script>
