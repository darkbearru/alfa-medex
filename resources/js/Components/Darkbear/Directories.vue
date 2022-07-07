<template>

    <div class="directory-item">
        <DirectoryItem v-for="item of catalog">
            <template #header>
                <Link href="">{{ item.name }}</Link>
            </template>
            {{ item.description }}
            <template v-if="item.children_count > 0" #children>
                <ul class="directory-item__children">
                    <DirectoryChildrenItem v-for="child of item.children" :child="child"/>
                </ul>
            </template>
        </DirectoryItem>
    </div>

</template>

<script>
import DirectoryItem from "@/Components/Darkbear/DirectoryItem";
import {Link} from '@inertiajs/inertia-vue3';
import DirectoryChildrenItem from "@/Components/Darkbear/DirectoryChildrenItem";
//import {showDirectoryItems} from "@/Darkbear/Catalog.js";


export default {
    props: [
        'catalog',
    ],
    components: {
        DirectoryChildrenItem,
        DirectoryItem, Link
    },
    setup() {
        //const nodes = ref({});

        const expandDirectoryChildren = (e) => {
            let parent = e.target.parentNode,
                ul = parent.querySelector('ul');
            parent.classList.toggle('is-expand');
            if (ul.children.length === 0) {
                let id = ul.getAttribute('data-id');
                axios.get('/catalog/directories/' + id)
                    .then(response => response.data)
                    .then(data => showDirectoryItems(data, id))
                    .catch(error => console.log(error))
            }
        }

        const showDirectoryItems = (data, id) => {
            console.log(data);
            nodes.value[id] = '<h2>test</h2>';
            console.log(nodes);
        }


        return {
            //nodes,
            expandDirectoryChildren
        }
    }
}
</script>

<style lang="postcss">
.directory-item {
    @apply grid text-left sm:gap-8 lg:gap-16 sm:grid-cols-2 lg:grid-cols-3;
}

.directory-item__children {
    @apply mt-6 space-y-3;
}

.directory-item__children > li {
    @apply ml-2
}

</style>
