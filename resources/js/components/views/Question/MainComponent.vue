<template>
    <div class="container">
        <!-- Question form -->
        <create-component></create-component>
        <hr>
        <!-- List of questions -->
        <div v-if="loading">
            <h2>Loading...</h2>
        </div>
        <div v-else>
            <div v-for="question in questions" :key="question.id">
                <QuestionItemComponent :question="question"></QuestionItemComponent>
            </div>
        </div>
    </div>
</template>

<script>
import CreateComponent from './Items/Main/CreateComponent.vue'
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
        }
    },
    mounted() {
        this.getQuestions()
    },
    components: {
        CreateComponent,
        QuestionItemComponent
    }
}
</script>

<style scoped>

</style>
