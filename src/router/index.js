import { createRouter, createWebHistory } from "vue-router";
import { ProductosRoutes } from "./ProductosRoutes";
import { InicioRoutes } from "./InicioRoutes";
import { UserRoutes } from "./UserRoutes";
import { NosotrosRoutes } from "./NosotrosRoutes";




const routes = [

    ...ProductosRoutes,
    ...InicioRoutes,
    ...UserRoutes,
    ...NosotrosRoutes,
    {
        path: "/",
        redirect: "/inicio",
    },

    {
        path: "/:pathMatch(.*)*",
        name: "NotFound",
        component: () => import("../views/PaginaNoEncontrada.vue"),
    },
];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});

export default router;

