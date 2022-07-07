<template>
    <footer class="w-full py-12 bg-gray-50 xl:py-24 dark:bg-gray-800 transition-ml duration-500">
        <div class="container px-4 mx-auto lg:px-0">
            <div class="grid gap-12 xl:grid-cols-6 xl:gap-24">
                <slot/>
            </div>
            <hr class="my-8 border-gray-200 lg:my-12 dark:border-gray-700">
            <span class="block text-center text-gray-600 dark:text-gray-400 text-xs">© 2022-<span
                id="currentYear">2022</span> <a
                href="http://darkbear.ru" rel="noreferrer" target="_blank">Алексей Абраменко</a>.
        </span>
        </div>
    </footer>
</template>

<script setup>
</script>

<style lang="postcss" scoped>
</style>
