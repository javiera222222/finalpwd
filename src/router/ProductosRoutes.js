export const ProductosRoutes = [
    {
        path: "/productos",
        component: () => import("../views/ProductosView.vue"),

        name: "Productos",

    },
    {
        path: "/productos/editable",
        component: () => import("../views/EditableView.vue"),

        name: "ProductosEditable",

    },
];