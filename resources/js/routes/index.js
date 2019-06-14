import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import CompaniesIndex from '../components/CompaniesIndex'
import CompaniesCreate from '../components/CompaniesCreate'
import CompaniesEdit from '../components/CompaniesEdit'


export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: CompaniesIndex,
            name: 'companiesIndex',
        },
        {
            path: '/companies/create',
            component: CompaniesCreate,
            name: 'companiesCreate',
        },
        {
            path: '/companies/edit/:id',
            component: CompaniesEdit,
            name: 'editCompany',
        },
    ],
});
