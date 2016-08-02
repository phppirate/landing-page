const Vue = require('vue');
const VueRouter = require('vue-router');
const VueResource = require('vue-resource');
Vue.use(VueRouter);
Vue.use(VueResource);
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#csrf-token').getAttribute('value');

import Router from "laravuejs-router";
import Routes from "./routes";
Router.router._linkActiveClass = 'active';

Router.setRoutes(Routes);

Router.start("#dashboard");
