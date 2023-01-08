import './bootstrap';
import '../css/app.css';

import Vue from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue';
import VModal from 'vue-js-modal';

createInertiaApp({
    resolve: name => import(`./Pages/${name}.vue`),
    setup({ el, App, props, plugin }) {
        Vue.use(plugin)
        Vue.use(VModal, { componentName: 'modal' })

        new Vue({
            render: h => h(App, props),
        }).$mount(el)
    },
})
