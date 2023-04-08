import {createRouter, createWebHistory} from 'vue-router';


const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/:pathMatch(.*)*',
            name: 'not-found',
            component: () => import('./components/404.vue')
        },
        {
            path: '/',
            name: 'home',
            component: () => import('./components/views/Question/MainComponent.vue')
        },
        {
            path: '/admin',
            name: 'admin',
            component: () => import('./components/views/Admin/AdminComponent.vue')
        },


        {
            path: '/questions/:id',
            name: 'question.edit',
            component: () => import('./components/views/Admin/Question/AdminQuestionEditComponent.vue')
        }
    ]
})

export default router
