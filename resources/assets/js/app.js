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

const i18n = new VueI18n({ locale: 'en', fallbackLocale: 'en', messages });

routes.beforeEnter = (to, from, next) => {
    const lang = to.params.lang;
    if(!['en', 'pt'].includes(lang)) return next('en');
    window.localStorage.setItem('lang', lang);
    if(i18n.locale !== lang) i18n.locale = lang;
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
