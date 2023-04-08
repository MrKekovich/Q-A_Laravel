<template>
    <div class="container">
        <!-- List of questions -->
        <div v-if="loading">
            <h2>Loading...</h2>
        </div>
        <div v-else>
            <div v-for="question in questions" :key="question.id" class="mb-0">
                <div :style="setStyle(question)">
                    <QuestionItemComponent :question="question"></QuestionItemComponent>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import QuestionItemComponent from "./Items/Main/QuestionListItemComponent.vue";

export default {
    name: "Index",
    data() {
        return {
            questions: [],
            loading: true
        }
    },
    methods: {
        getQuestions() {
            axios.get('/laravel_api/questions')
                .then(response => {
                    this.questions = response.data
                    this.loading = false
                })
                .catch(error => {
                    console.log(error)
                })
        },
        setStyle(question) {
            return `
            padding-bottom: ${question.p_b}px;
            padding-top: ${question.p_t}px;
            `
        }
    },
    mounted() {
        this.getQuestions()
    },
    components: {
        QuestionItemComponent
    }
}
</script>

<style scoped>

</style>
