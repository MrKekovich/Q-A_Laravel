<template>
    <div class="accordion" :id="'question-list-' + question.id">
        <div class="card">
            <div class="card-header" :id="'heading-' + question.id">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse"
                            :data-target="'#question-details-' + question.id"
                            aria-expanded="false" :aria-controls="'question-details-' + question.id">
                        {{ question.title }}
                    </button>
                </h5>
            </div>

            <div :id="'question-details-' + question.id" class="collapse" :aria-labelledby="'heading-' + question.id"
                 data-parent="'#question-list-' + question.id">
                <div class="card-body">
                    <p>{{ question.body }}</p>
                    <hr>

                    <div v-for="answer in answers" :key="answer.id">
                        <div class="card">
                            <div class="card-header" :id="'answer-heading-' + answer.id">
                                <h6 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                            :data-target="'#answer-details-' + answer.id"
                                            aria-expanded="false" :aria-controls="'answer-details-' + answer.id">
                                        {{ answer.body }}
                                    </button>
                                </h6>
                            </div>

                            <div :id="'answer-details-' + answer.id" class="collapse"
                                 :aria-labelledby="'answer-heading-' + answer.id"
                                 data-parent="'#question-details-' + question.id">
                                <div class="card-body">
                                    <p>{{ answer.body }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <button class="btn btn-primary" @click="loadAnswers(question.id)">Load answers</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "QuestionItemComponent",
    props: {
        question: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            loading: false,
            answers: []
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
                    this.answers = response.data.answers
                })
                .catch(error => {
                    console.log(error)
                })
        }
    },
    mounted() {
        this.loadAnswers(this.id)
    }
}
</script>

<style scoped>
.card-header button[aria-expanded="false"]::before {
    content: '\f078';
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    margin-right: 0.5rem;
}

.card-header button[aria-expanded="true"]::before {
    content: '\f077';
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    margin-right: 0.5rem;
}
</style>
