
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
        props: (route) => ({ bookToUpdate: route.params }),
        // props: (route) => {
        //     console.log(route);
        // },
        // component: () => import('../pages/BookListPage.vue'),
    }
];

export default routes;
