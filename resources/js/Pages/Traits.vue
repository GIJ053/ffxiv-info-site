<template>
    <div class="w-full overflow-x-clip text-2xs lg:text-xl">
        <table class="table w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th class="lg:w-2/12">Trait</th>
                    <th class="lg:w-3/5">Description</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                <tr v-for="action in actions">
                    <td class="whitespace-normal">
                        <div class="flex items-center space-x-3">
                            <div class="avatar">
                                <div class="mask mask-squircle w-12 h-12">
                                    <!-- <img :src="" -->
                                        <!-- alt="Avatar Tailwind CSS Component" /> -->
                                </div>
                            </div>
                            <div>
                                <div class="font-bold">{{ }}</div>
                                <div class="text-sm opacity-50">Learned at level {{  }}</div>
                            </div>
                        </div>
                    </td>

                    <td v-html="traitInfo.description" class="whitespace-normal">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</template>

<script setup>

defineProps({
    job: Object,
    id: Number,
})

</script>

