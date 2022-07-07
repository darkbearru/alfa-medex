<template>
    <div class="mb-10">
        <h3>
            <slot name="header"/>
        </h3>
        <p>
            <slot/>
        </p>
        <slot name="children"/>
    </div>
</template>
<script setup>
</script>

<style lang="postcss" scoped>
h3 {
    @apply mb-4 text-lg font-medium text-gray-900 dark:text-white;
}

p {
    @apply text-gray-500 dark:text-gray-400;
}
</style>
