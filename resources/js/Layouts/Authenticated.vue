<script setup>
import {onMounted, ref} from 'vue';
import AlfaMedexLogo from '@/Components/ApplicationLogo.vue';
import DarkSideBar from "@/Layouts/Darkbear/DarkSideBar";
import Navigation from "@/Layouts/Darkbear/Navigation";
import DarkFooter from "@/Layouts/Darkbear/DarkFooter";

const showingNavigationDropdown = ref(false);

defineProps({
    'versions': Object
});

onMounted(() => {
    document.addEventListener('scroll', () => {
        document.body.classList.toggle('sticky-header', window.scrollY > 0);
    });

});
</script>

<template>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-800">

        <!-- Заголовок и навигация -->
        <header class="z-30 header">
            <nav
                class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">

                    <AlfaMedexLogo class="header__logo w-64 fill-current transition-height duration-500"/>

                    <div class="flex items-center lg:order-2">
                        <form id="search-form" class="hidden mr-3 w-full lg:inline-block">
                            <label class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300"
                                   for="search-bar">Search</label>
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                         stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"></path>
                                    </svg>
                                </div>
                                <input id="search-bar"
                                       class="block py-2 px-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                       placeholder="Search"
                                       required type="search">
                            </div>
                        </form>
                        <button aria-controls="mobile-menu-search" aria-expanded="false"
                                class="lg:hidden inline-flex mr-2 lg:mr-0 items-center text-gray-800 dark:text-gray-400 hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-2.5 lg:px-5 py-2.5 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800"
                                data-collapse-toggle="mobile-menu-search"
                                type="button">
                            <svg class="w-5 h-5 lg:mr-2" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd"
                                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                      fill-rule="evenodd"></path>
                            </svg>
                        </button>
                        <span class="hidden mx-2 w-px h-5 bg-gray-200 lg:inline lg:mx-3"></span>
                        <button
                            class="inline-flex items-center text-gray-800 dark:text-gray-300 hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-2.5 lg:px-5 py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800"
                            data-dropdown-toggle="language-dropdown"
                            type="button">

                            UserName
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"></path>
                            </svg>
                        </button>
                        <!-- Dropdown -->
                        <div
                            id="language-dropdown"
                            class="hidden z-50 my-4 w-48 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                            <ul class="py-1" role="none">
                                <li>
                                    <a class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                       href="#"
                                       role="menuitem">
                                        <div class="inline-flex items-center">
                                            UserName
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                       href="#"
                                       role="menuitem">
                                        <div class="inline-flex items-center">
                                            Выйти
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <button aria-controls="mobile-menu-search" aria-expanded="false"
                                class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                data-collapse-toggle="mobile-menu-search" type="button">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd"
                                      d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                      fill-rule="evenodd"></path>
                            </svg>
                            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div id="mobile-menu-search"
                         class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1">
                        <form class="flex items-center mt-4 lg:hidden">
                            <label class="sr-only" for="search-mobile">Search</label>
                            <div class="relative w-full">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path clip-rule="evenodd"
                                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                              fill-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input id="search-mobile"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                       placeholder="Search for anything..."
                                       required type="search">
                            </div>
                            <button
                                class="inline-flex items-center p-2.5 ml-2 text-sm font-medium text-white bg-primary-700 rounded-lg border border-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                type="submit">
                                <svg class="mr-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"></path>
                                </svg>
                                Search
                            </button>
                        </form>
                        <Navigation/>
                    </div>
                </div>
            </nav>
        </header>

        <div class="flex overflow-hidden bg-gray-50 dark:bg-gray-900 with-sidebar flex-wrap">
            <!-- Боковая панель под фильтры -->
            <DarkSideBar/>

            <!-- Тело страницы -->
            <main class="relative w-full h-full overflow-y-auto bg-gray-50 dark:bg-gray-900 transition-ml duration-500">
                <slot/>
            </main>

            <DarkFooter>
                <div class="col-span-4"></div>
                <div class="col-span-2 text-xs text-gray-600">
                    <b>APP:</b> {{ versions['appVersion'] }},
                    <b>PHP:</b> {{ versions['phpVersion'] }},
                    <b>Laravel:</b> {{ versions['laravelVersion'] }}
                </div>
            </DarkFooter>

        </div>
    </div>
</template>

<style lang="postcss">

.sticky-header .header {
    @apply sticky top-0;
}

.sticky-header .header__logo {
    @apply h-14;
}

.with-sidebar > aside {
    @apply flex w-[20%];
}

.with-sidebar > main,
.with-sidebar > footer {
    @apply lg:ml-[20%];
}

.hide-sidebar > aside {
    @apply -translate-x-[100%];
}

.hide-sidebar > main,
.hide-sidebar > footer {
    @apply lg:ml-0;
}
</style>
