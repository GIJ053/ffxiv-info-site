<template>
    <div class="w-full overflow-x-clip text-sm lg:text-2xl">
        <table class="table w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th class="text-xl">Action</th>
                    <th class="text-xl">Description</th>
                    <th class="text-center text-xl">Cooldown</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="action in actions">
                    <td class="whitespace-normal px-2 py-6">
                        <div class="flex items-center space-x-3 p-x-8">
                            <div class="avatar">
                                <div class="rounded-xl w-10 h-10 lg:w-16 lg:h-16">
                                    <img :src="'https://xivapi.com' + action.hd_icon_url"
                                        alt="Avatar Tailwind CSS Component" />
                                </div>
                            </div>

                            <div>
                                <div class="font-bold">{{ action.name }}</div>

                                <div class="text-sm opacity-50">Learned at level {{ action.level }}</div>
                            </div>
                        </div>
                    </td>

                    <td v-html="action.description" class="whitespace-normal" id="actionDescription">
                    </td>

                    <td class="text-center">{{ action.cooldown + " seconds" }} </td>
                </tr>
            </tbody>
        </table>
    </div>

</template>

<script setup>
defineProps({
    job: Object,
    actions: Array,
})

const success = 'hsl(var(--su))';
const info = 'hsl(var(--in))';
const warning = 'hsl(var(--wa))';

</script>

<style>
#actionDescription > span[style*="color:#ffff66"] {
    color: v-bind('success') !important;
    text-decoration: underline;
    font-weight: bold;
}

#actionDescription > span[style*="color:#00cc22"] {
    color: v-bind('info') !important;
    font-weight: bold;
}

#actionDescription > span[style*="#ff7b1a"] {
    color: v-bind('warning') !important;
    font-weight: bold;
    font-style: italic;
}
</style>
