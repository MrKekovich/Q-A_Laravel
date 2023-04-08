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
                <div class="btn-group float-right">
                    <button type="button" class="btn btn-sm btn-outline-secondary"
                            @click="editQuestion">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-secondary"
                            @click="deleteQuestion">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
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
    emits: ['questionDeleted'],
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
        editQuestion() {
            this.$router.push({name: 'question.edit', params: {id: this.id}})
        },
        deleteQuestion() {
            axios.delete(`laravel_api/questions/${this.question.id}`)
                .then(() => {
                    this.$emit("questionDeleted")
                })
                .catch(error =>{
                    console.log(error);
                })
        },
    },
}
</script>

<style scoped>
</style>
