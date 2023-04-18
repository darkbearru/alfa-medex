<script setup>
import {Head} from '@inertiajs/inertia-vue3';
import DarkPanel from "@/Components/Darkbear/DarkPanel";
import DarkDirectories from "@/Components/Darkbear/Directories";


defineProps(['versions', 'catalog']);

</script>

<template>
    <Head>
        <title>Каталог товаров</title>
    </Head>

    <!-- Заголовок на странице -->
    <div class="md:flex md:items-center md:justify-between pt-6 md:pt-8 pb-0 md:pb-2 px-8 lg:px-12">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Каталог товаров
        </h2>
    </div>

    <!-- Тело -->
    <DarkPanel>
        <DarkDirectories :catalog="catalog"></DarkDirectories>
    </DarkPanel>

</template>
