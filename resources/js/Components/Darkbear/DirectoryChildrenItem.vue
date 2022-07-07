<template>
    <li :data-id="child.id" class="directory-item__children-li">
        <button v-if="child.children_count > 0" class="btn__expand" @click="expandDirectoryChildren"></button>
        <div>
            <Link href="">{{ child.name }}</Link>
            <span v-if="child.children_count > 0">/ {{ child.children_count }}</span>
        </div>
        <ul v-if="sub_items">
            <DirectoryChildrenItem v-for="item of sub_items" :child="item" :sub-items="sub_items.children"/>
        </ul>
    </li>
</template>

<script setup>
import {ref} from "vue";
import {Link} from '@inertiajs/inertia-vue3';


defineProps([
    'child'
])

let sub_items = ref(null);

const expandDirectoryChildren = (e) => {
    let parent = e.target.parentNode,
        ul = parent.querySelector('ul');
    parent.classList.toggle('is-expand');
    if (!ul) {
        let id = parent.getAttribute('data-id');
        axios.get('/catalog/directories/' + id)
            .then(response => response.data)
            .then(data => showDirectoryItems(data))
            .catch(error => console.log(error))
    }
}

const showDirectoryItems = (data) => {
    console.log(data);
    sub_items.value = data;
}


</script>

<style lang="postcss">
.directory-item__children-li {
    @apply relative pl-6;
}

.directory-item__children-li span {
    @apply text-gray-600 text-xs pl-2 whitespace-nowrap;
}

.directory-item__children-li > ul {
    @apply mt-1 mb-2 hidden space-y-2;
}

.directory-item__children-li.is-expand > ul {
    @apply block;
}


.btn__expand {
    line-height: 16px;
    @apply absolute inline-block left-0 top-[5px] border border-gray-500 w-[15px] h-[15px] cursor-pointer mr-3 shrink-0;
}

.btn__expand:focus {
    @apply outline-0;
}

.btn__expand::before {
    @apply rotate-0;
}

.btn__expand::after {
    @apply opacity-100 -rotate-90;
}

.btn__expand::before,
.btn__expand::after {
    content: "";
    @apply absolute top-[6px] left-[2px] w-[10px] h-[1px] bg-gray-500 transition-opacity transition-transform;
}

.directory-item__children-li.is-expand > .btn__expand::before {
    @apply rotate-180;
}

.directory-item__children-li.is-expand > .btn__expand::after {
    @apply rotate-90 opacity-0;

}
</style>
