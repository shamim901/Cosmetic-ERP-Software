/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../bootstrap');

require('./admin-lte');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('flash', require('../components/Flash.vue').default);
Vue.component('export-component', require('../components/Export.vue').default);

const mapped = (files) => {
    files.keys().forEach(filename => {
        const componentConfig = files(filename);
        const componentName = filename
            .split('/')
            .pop()
            .replace(/\.\w+$/, '');
        const comp = files(filename).default;
        Vue.component(componentName.toLowerCase(), comp || componentConfig);
    });
};
[
    require.context('../components/base', true, /\.vue$/i),
    require.context('../components/feature', true, /\.vue$/i),
    require.context('../components/page', true, /\.vue$/i),
].map(ctx => mapped(ctx));

// Bootstrap 3 UI
import * as uiv from 'uiv';
Vue.use(uiv, {prefix: 'uiv'});

import Select2 from 'v-select2-component';
Vue.component('Select2', Select2);

// VUE FORMULATE
import VueFormulate from '@braid/vue-formulate';
Vue.use(VueFormulate, {
    library: {
        autocomplete: {
            classification: 'text',
            component: 'autocomplete'
        },
        select2: {
            classification: 'select',
            component: 'fieldselect2'
        }
    }
});

const app = new Vue({
  el: '#app'
});