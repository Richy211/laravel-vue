require('./bootstrap');

import Vue from 'vue';

import MyThoughtsComponent from './components/MyThoughtsComponent.vue';
import FormComponent from './components/FormComponent.vue';
import ThoughtComponent from './components/ThoughtComponent.vue';

const app = new Vue({
    el: '#app',
    components: {
        'thought-component': ThoughtComponent,
        'form-component': FormComponent,
        'my-thoughts-component': MyThoughtsComponent,
    }
});
