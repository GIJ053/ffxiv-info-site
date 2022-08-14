<template>
    <div class="drawer bg-base-200 font-ostrich">
        <input type="checkbox" id="site-drawer" class="drawer-toggle" v-model="toggle"/>
        <div class="drawer-content flex flex-col">
            <!-- Navbar -->
            <nav class="w-full navbar bg-base-300">

                <!-- MOBILE SIDEBAR BUTTON -->
                <div class="flex-none lg:hidden">
                    <label for="site-drawer" class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            class="inline-block w-6 h-6 stroke-current"
                        >
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16">
                            </path>
                        </svg>
                    </label>
                </div>

                <div class="flex-1 px-2 mx-2 text-4xl">FFXIV Site</div>
                <img src="/images/light-mode-icon.svg"
                    class="h-8 self-center"
                    :class="checked ? 'invert' : 'invert-0'"
                    />
                    <input type="checkbox"
                        class="toggle toggle-lg self-center"
                        data-toggle-theme="garden,luxury"
                        data-act-class="ACTIVECLASS"
                        v-model="checked"
                    />
                    <img src="/images/dark-mode-icon.svg"
                        class="h-8 self-center"
                        :class="checked ? 'invert' : 'invert-0'"
                    />

                <!-- DESKTOP MENU -->
                <div class="flex-none hidden lg:block">

                    <ul class="menu menu-horizontal">
                        <NavLink href="/" :active="$page.component === 'Home'" >Home</NavLink>
                        <NavLink href="/settings" :active="$page.component === 'Settings'" >Settings</NavLink>
                    </ul>
                </div>
            </nav>

            <!-- content -->
            <slot />
        </div>

        <!-- SIDEBAR MENU -->
        <div class="drawer-side">
            <label for="site-drawer" class="drawer-overlay"></label>
            <ul class="menu p-4 overflow-y-auto w-80 bg-base-100 space-y-4">
                <button class="btn btn-error mb-6"
                @click="toggle = false"
                >
                    CLOSE
                </button>

                <NavLink href="/" :active="$page.component === 'Home'" @click="toggle = false">Home</NavLink>

                <NavLink href="/settings" :active="$page.component === 'Settings'" @click="toggle = false">Settings</NavLink>
            </ul>
        </div>
    </div>
</template>

<script setup>
    import NavLink from './NavLink.vue';
    import { themeChange } from 'theme-change';
    import { ref, onMounted } from 'vue';

    let checked = ref(localStorage.getItem('theme') == 'luxury');
    let toggle = ref(false);

    onMounted(() => {
        themeChange(false);
    })
</script>
