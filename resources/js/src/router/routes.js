
const routes = [
    {
        path: '/',
        name: 'books.list',
        component: () => import('../pages/BookListPage.vue'),
        // component: () => import('../pages/BookFormPage.vue'),
    },
    {
        path: '/new-book',
        name: 'books.create',
        component: () => import('../pages/BookFormPage.vue'),
        // component: () => import('../pages/BookListPage.vue'),
    }
    // {
    //     path: '/companies/:id/edit',
    //     name: 'companies.edit',
    //     component: CompaniesEdit,
    //     props: true
    // }
    // {
    //     path: '/:catchAll(.*)*',
    //     component: () => import('../error/Error404.vue'),
    // },
];

export default routes;
