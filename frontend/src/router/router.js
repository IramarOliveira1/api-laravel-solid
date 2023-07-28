import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: '/marca', component: () => import('../components/brand/brand.vue')
    },
    {
        path: '/produto', component: () => import('../components/product/product.vue')
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
