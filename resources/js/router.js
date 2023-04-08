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
            path: '/questions/:id',
            name: 'question.show',
            component: () => import('./components/views/Question/QuestionDetailsComponent.vue')
        }
    ]
})

export default router
