/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({
    data() {
        return {
            hideTermsModal: true,
        }
    },

    beforeMount() {
        if(!localStorage.getItem('terms')) {
            this.hideTermsModal = false
        }
    },

    methods: {
        closeTermsModal: function () {
            location.href = "https://google.com.ua"
        },

        acceptTermsModal: function () {
            localStorage.setItem('terms', true)

            this.hideTermsModal = !this.hideTermsModal
        },
    }
});

import ExampleComponent from './components/ExampleComponent.vue';
import ImageComponent from "./components/ImageComponent.vue";
import CannabinoidComponent from "./components/form/CannabinoidComponent.vue";
import TerpeneComponent from "./components/form/TerpeneComponent.vue";
import EffectComponent from "./components/form/EffectComponent.vue";
import FormSubscribeComponent from "./components/form/SubscribeComponent.vue";
import EditorComponent from "./components/form/EditorComponent.vue";

app.component('example-component', ExampleComponent);
app.component('image-component', ImageComponent)
app.component('cannabinoid-component', CannabinoidComponent);
app.component('terpene-component', TerpeneComponent);
app.component('effect-component', EffectComponent);
app.component('form-subscribe-component', FormSubscribeComponent);
app.component('editor-component', EditorComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');
