<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <nav class="sticky top-0 z-50 bg-blue-500">
                <div class="bg-white border-b border-gray-200 shadow">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-16 items-center">
                            <div class="flex">
                                <div class="shrink-0 flex items-center">
                                    <Link :href="route('home')">
                                        <h1 class="text-xl font-bold text-gray-800">Horeca Crowdfunding</h1>
                                    </Link>
                                </div>
                            </div>

                            <div class="hidden sm:relative sm:space-x-6 md:flex">
                                <Link :href="route('home')"
                                      class="text-slate-800 hover:border-b-2"
                                      :class="{'border-b-2 border-blue-500': route().current('home')}">
                                    Home
                                </Link>
                                <Link :href="route('profile')"
                                      class="text-slate-800 hover:border-b-2"
                                      :class="{'border-b-2 border-blue-500': route().current('profile')}">
                                    Profiel
                                </Link>
                                <Link :href="route('profile.projects')"
                                      class="text-slate-800 hover:border-b-2"
                                      :class="{'border-b-2 border-blue-500': route().current('profile.projects')}">
                                    Mijn projecten
                                </Link>
                                <Link :href="route('profile.investments')"
                                      class="text-slate-800 hover:border-b-2"
                                      :class="{'border-b-2 border-blue-500': route().current('profile.investments')}">
                                    Mijn investeringen
                                </Link>
                            </div>

                            <div class="hidden md:flex sm:items-center sm:ml-6">
                                <div class="ml-3 relative">
                                    <div class="ml-3 relative">
                                        <Dropdown align="right" width="48">
                                            <template #trigger>
                                                <span class="inline-flex rounded-md">
                                                    <button type="button"
                                                            class="inline-flex items-center px-3 py-2 border border-transparent leading-4 font-medium rounded-md bg-white focus:outline-none transition ease-in-out duration-150">

                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                             viewBox="0 0 24 24"
                                                             stroke-width="1.5" stroke="currentColor"
                                                             class="w-6 h-6 text-slate-800">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </template>

                                            <template #content>
                                                <DropdownLink :href="route('logout')" method="post" as="button"
                                                              class="text-red-500 flex items-center space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/>
                                                    </svg>
                                                    <span>Uitloggen</span>
                                                </DropdownLink>
                                            </template>
                                        </Dropdown>
                                    </div>
                                </div>
                            </div>

                            <div class="md:hidden">
                                <!--             Hamburger button               -->
                                <button type="button"
                                        @click="toggleMenu"
                                        class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-400">
                                    <span class="sr-only">Open main menu</span>
                                    <svg v-if="!showMenu" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 6h16M4 12h16M4 18h16"/>
                                    </svg>
                                    <svg v-if="showMenu" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--        Hamburger menu        -->
                <div v-if="showMenu" class="absolute shadow w-full border-b border-gray-200 z-50 bg-white md:hidden">
                    <div>
                        <div class="flex flex-col">
                            <Link :href="route('home')"
                                  class="p-3 text-slate-800 border-r-4 font-semibold flex space-x-3"
                                  :class="{'border-blue-400': route().current('home')}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                                </svg>
                                <span>Home</span>
                            </Link>
                            <Link :href="route('profile.projects')"
                                  class="p-3 text-slate-800 border-r-4 font-semibold flex space-x-3"
                                  :class="{'border-blue-400': route().current('profile.projects')}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122"/>
                                </svg>
                                <span>Mijn projecten</span>
                            </Link>
                            <Link :href="route('profile.investments')"
                                  class="p-3 text-slate-800 border-r-4 font-semibold flex space-x-3"
                                  :class="{'border-blue-400': route().current('profile.investments')}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"/>
                                </svg>
                                <span>Mijn investeringen</span>
                            </Link>
                            <Link :href="route('profile')"
                                  class="p-3 flex border-r-4 text-slate-800 space-x-3 font-semibold"
                                  :class="{'border-blue-400': route().current('profile')}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>Profiel</span>
                            </Link>
                            <Link :href="route('logout')" method="post"
                                  class="p-3 flex border-r-4 text-red-400 space-x-3 font-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/>
                                </svg>
                                <span>Uitloggen</span>
                            </Link>
                        </div>
                    </div>
                </div>
            </nav>

            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header"/>
                </div>
            </header>

            <main class="max-w-7xl mx-auto px-4 lg:px-8">
                <slot/>
            </main>
        </div>
    </div>
</template>

<script>
import {ref} from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import {Link} from '@inertiajs/inertia-vue3';

export default {
    props: ['auth'],
    components: {Dropdown, DropdownLink, Link},
    data() {
        return {
            showMenu: false
        }
    },
    methods: {
        toggleMenu() {
            this.showMenu = !this.showMenu;
        }
    },
    setup() {
        const showingNavigationDropdown = ref(false);
    }
}
</script>
