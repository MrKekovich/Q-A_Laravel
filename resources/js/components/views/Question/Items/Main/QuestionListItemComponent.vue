<template>
    <div class="accordion" :id="'question-list-' + question.id">
        <div class="card">
            <div class="card-header" :id="'heading-' + question.id">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse"
                            :data-target="'#question-details-' + question.id"
                            aria-expanded="false" :aria-controls="'question-details-' + question.id"
                            @click="toggleQuestion">
                        <i class="fa" :class="{'fa-angle-down': !showQuestion, 'fa-angle-up': showQuestion}"></i>
                        {{ question.title }}
                    </button>
                </h5>
            </div>

            <div :id="`question-details-${question.id}`" class="collapse" :aria-labelledby="`heading-${question.id}`"
                 :data-parent="`#question-list-${question.id}`" :class="{'show': showQuestion}">
                <div class="card-body">
                    <p>{{ question.body }}</p>
                    <hr>
                    <div class="answer-list">
                        <div v-if="loading">Loading...</div>
                        <div v-else-if="answers.length === 0">No answers yet!</div>
                        <div v-else>
                            <answer-list-component :answers="answers"></answer-list-component>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import AnswerListComponent from "../Answer/AnswerListComponent.vue";

export default {
    name: "QuestionItemComponent",
    components: {AnswerListComponent},
    props: {
        question: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            loading: false,
            answers: [],
            showQuestion: false
        }
    },
    computed: {
        id() {
            return this.question.id
        },
    },
    methods: {
        loadAnswers(id) {
            this.loading = true
            axios.get(`/laravel_api/questions/${id}`)
                .then(response => {
                    this.answers = response.data.answers.map(answer => ({...answer, showFull: false}));
                })
                .catch(error => {
                    console.log(error)
                })
                .finally(() => {
                    this.loading = false
                })
        },
        toggleQuestion() {
            this.showQuestion = !this.showQuestion;
        },
        toggleAnswer(answer) {
            answer.showFull = !answer.showFull;
        }
    },
    mounted() {
        this.loadAnswers(this.id)
    }
}
</script>
<style scoped>
</style>
