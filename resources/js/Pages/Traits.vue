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
                <tr v-for="trait in traits">
                    <td class="whitespace-normal">
                        <div class="flex items-center space-x-3">
                            <div class="avatar">
                                <div class="mask mask-squircle w-12 h-12">
                                    <img :src="'https://xivapi.com' + trait.hd_icon_url"
                                        alt="Avatar Tailwind CSS Component" />
                                </div>
                            </div>
                            <div>
                                <div class="font-bold">{{ trait.name }}</div>
                                <div class="text-sm opacity-50">Learned at level {{ trait.level }}</div>
                            </div>
                        </div>
                    </td>

                    <td v-html="trait.description" class="whitespace-normal" id="traitDescription">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</template>

<script setup>

defineProps({
    job: Object,
    traits: Array,
})

const success = 'hsl(var(--su))';
const info = 'hsl(var(--in))';
const warning = 'hsl(var(--wa))';

</script>

<style>
#traitDescription > span[style*="color:#ffff66"] {
    color: v-bind('success') !important;
    text-decoration: underline;
    font-weight: bold;
}

#traitDescription > span[style*="color:#00cc22"] {
    color: v-bind('info') !important;
    font-weight: bold;
}

#traitDescription > span[style*="#ff7b1a"] {
    color: v-bind('warning') !important;
    font-weight: bold;
    font-style: italic;
}
</style>

