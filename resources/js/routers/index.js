
import { createRouter, createWebHistory } from "vue-router";

/** router define */
const routes = [{
    path: '/',
    component: () => import('../views/Layout.vue'),

    children: [

        { path: '/', name: 'customer.index', component: () => import('../views/customer/Index.vue') },
        { path: '/customer/create', name: 'customer.create', component: () => import('../views/customer/Create.vue') },
        { path: '/customer/:id/edit', name: 'customer.edit', component: () => import('../views/customer/Edit.vue') },
    ]
}
]

/** router initial */
const router = createRouter({
    history: createWebHistory(import.meta.env.VITE_VUE_ROUTER_BASE),
    scrollBehavior() {
        window.scrollTo(0, 0);
    },
    linkExactActiveClass: "active",

    routes
});


export default router;