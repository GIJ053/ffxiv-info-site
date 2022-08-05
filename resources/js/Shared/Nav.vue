<template>
    <div class="drawer bg-base-200">
        <input type="checkbox" id="site-drawer" class="drawer-toggle"/>
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

                <div class="flex-1 px-2 mx-2">FFXIV Site</div>

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
                <NavLink href="/" :active="$page.component === 'Home'">Home</NavLink>
                <NavLink href="/settings" :active="$page.component === 'Settings'" >Settings</NavLink>
            </ul>
        </div>
    </div>
</template>

<script setup>
    import NavLink from './NavLink.vue';
</script>
