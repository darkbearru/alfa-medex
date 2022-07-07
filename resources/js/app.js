import './bootstrap';

import {createApp, h} from 'vue';
import {createInertiaApp} from '@inertiajs/inertia-vue3';
import {InertiaProgress} from '@inertiajs/progress';
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        let page = require(`./Pages/${name}.vue`).default;
        page.layout ??= AuthenticatedLayout;
        return page;
    },
    setup({el, app, props, plugin}) {
        return createApp({render: () => h(app, props)})
            .use(plugin)
            .mixin({methods: {route}})
            .mount(el);
    },
});

InertiaProgress.init({color: '#4B5563'});
