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
                        {{ question.question }}
                    </button>
                </h5>
            </div>

            <div :id="`question-details-${question.id}`" class="collapse" :aria-labelledby="`heading-${question.id}`"
                 :data-parent="`#question-list-${question.id}`" :class="{'show': showQuestion}">
                <div class="card-body">
                    <p>{{ question.answer }}</p>
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
            showQuestion: false
        }
    },
    computed: {
        id() {
            return this.question.id
        },
    },
    methods: {
        toggleQuestion() {
            this.showQuestion = !this.showQuestion;
        },
    },
}
</script>
<style scoped>
</style>
