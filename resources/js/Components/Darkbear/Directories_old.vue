<template>

    <div class="directory__item">
        <DirectoryItem v-for="item of catalog">
            <template #header>
                <Link href="">{{ item.name }}</Link>
            </template>
            {{ item.description }}
            <template v-if="item.children_count > 0" #children>
                <ul class="directory__item__children">
                    <li v-for="child of item.children">
                        <button class="btn__expand" @click="expandDirectoryChildren"></button>
                        <div>
                            <Link href="">{{ child.name }}</Link>
                            <span>/ {{ child.children_count }}</span>
                        </div>
                        <ul v-if="child.children_count > 0" :ref="`children` + child.id" :data-id="child.id">
                        </ul>
                    </li>
                </ul>
            </template>
        </DirectoryItem>
    </div>

</template>

<script>
import DirectoryItem from "@/Components/Darkbear/DirectoryItem";
import {Link} from '@inertiajs/inertia-vue3';


export default {
    props: [
        'catalog'
    ],
    components: {
        DirectoryItem, Link
    },
    setup(props) {
        console.log(props.catalog);

        /*
        const children6 = ref(null);
        console.log('Call');

        onMounted(() => {
            // the DOM element will be assigned to the ref after initial render
            console.log(children6.value) // <div>Welcome to ProgramEasily </div>
        });
                 */

        const expandDirectoryChildren = (e) => {
            let parent = e.target.parentNode,
                ul = parent.querySelector('ul');
            parent.classList.toggle('is-expand');
            if (ul.children.length === 0) {
                let id = ul.getAttribute('data-id');
                fetch('/catalog/directories/' + id)
                    .then(response => response.json())
                    .then(data => showDirectoryItems(data, `catalog` + id));
            }

        }

        const showDirectoryItems = (data, name) => {
            console.log(data);
        }

        // function expandDirectoryChildren(e) {
        // }


        return {
            expandDirectoryChildren
        }
    }
}
</script>

<style lang="postcss">
.directory__item {
    @apply grid text-left sm:gap-8 lg:gap-16 sm:grid-cols-2 lg:grid-cols-3;
}

.directory__item__children {
    @apply mt-6 space-y-3;
}

.directory__item__children > li {
    @apply relative ml-3 flex items-center;
}

.directory__item__children > li span {
    @apply text-gray-600 text-xs pl-2 whitespace-nowrap;
}

.directory__item__children > li > ul {
    @apply ml-1 hidden;
}

.directory__item__children > li.is-expand > ul {
    @apply block;
}


.btn__expand {
    line-height: 16px;
    @apply border border-gray-500 relative w-[15px] h-[15px] cursor-pointer mr-3 shrink-0;
}

.btn_expand:focus {
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

.directory__item__children > li.is-expand .btn__expand::before {
    @apply rotate-180;
}

.directory__item__children > li.is-expand .btn__expand::after {
    @apply rotate-90 opacity-0;

}
</style>
