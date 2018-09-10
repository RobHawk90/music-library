import './bootstrap';

import Vue from 'vue';
import Vuetify from 'vuetify';
import VueI18n from 'vue-i18n';
import VueRouter from 'vue-router';

import messages from './vue-i18n-locales.generated';
import routes from './routes';
import Login from './components/Login';
import Dashboard from './components/Dashboard';

Vue.use(Vuetify);
Vue.use(VueI18n);
Vue.use(VueRouter);

let locale = window.localStorage.getItem('locale');
if(!locale) {
    window.localStorage.setItem('locale', 'en');
    locale = 'en';
}
const i18n = new VueI18n({ locale, fallbackLocale: 'en', messages });

routes.beforeEnter = (to, from, next) => {
    const lang = to.params.locale;

    if(!['en', 'pt-BR'].includes(lang)) return next(locale);

    if(i18n.locale !== lang) {
        window.localStorage.setItem('locale', lang);
        i18n.locale = lang;
    }

    next();
};

const router = new VueRouter({
    mode: 'history',
    routes: [routes],
});

const app = new Vue({
    el: '#app',
    router,
    i18n,
    components: { Login, Dashboard },
});
