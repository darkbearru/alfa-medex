<template>
    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
        <li>
            <a aria-current="page" class="header__menu-item header__menu-item__selected" href="/catalog">Каталог</a>
        </li>
        <li>
            <a class="header__menu-item" href="/catalog/compare/">Сравнение</a>
        </li>
        <li>
            <a class="header__menu-item" href="/users">Пользователи</a>
        </li>
    </ul>
</template>
<script setup>

</script>

<style lang="postcss" scoped>
.header__menu-item {
    @apply block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-white lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700;
}

.header__menu-item__selected {
    @apply text-primary-700 dark:hover:bg-gray-700 hover:bg-gray-50 text-white rounded lg:text-primary-700 dark:text-white
}
</style>
