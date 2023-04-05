<template>
    <div class="accordion" id="question-list">
        <div class="card" v-for="question in questions" :key="question.id">
            <div class="card-header" :id="'heading-' + question.id">
                <button class="btn btn-link" type="button" data-toggle="collapse"
                        :data-target="'#question-details-' + question.id" aria-expanded="false"
                        :aria-controls="'question-details-' + question.id">
                    {{ question.title }}
                </button>
            </div>
            <div :id="'question-details-' + question.id" class="collapse" :aria-labelledby="'heading-' + question.id"
                 data-parent="#question-list">
                <div class="card-body">
                    <p>{{ question.body }}</p>
                    <div v-if="question.answers.length">
                        <div class="accordion" id="'answer-list-' + question.id">
                            <div class="card" v-for="answer in question.answers" :key="answer.id">
                                <div class="card-header" :id="'heading-' + answer.id">
                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                            :data-target="'#answer-details-' + answer.id" aria-expanded="false"
                                            :aria-controls="'answer-details-' + answer.id">
                                        {{ answer.body }}
                                    </button>
                                </div>
                                <div :id="'answer-details-' + answer.id" class="collapse"
                                     :aria-labelledby="'heading-' + answer.id"
                                     data-parent="'#answer-list-' + question.id">
                                    <div class="card-body">
                                        <p>{{ answer.body }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" @click="loadAnswers(question.id)">Load answers</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ShowComponent",
    data() {
        return {
            questions: [],
            loading: false
        }
    },
    methods: {
        loadAnswers(id) {
            this.loading = true
            axios.get('/laravel_api/questions/' + id + '/answers')
        }
    }
}
</script>

<style scoped>

</style>
