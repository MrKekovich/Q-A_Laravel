<template>
    <div class="container">
        <div>
            <div class="card mb-3">
                <div class="card-header">Edit Question</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="questionTitleInput" class="form-label">Title:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="questionTitleInput"
                            v-model="question"
                            placeholder="Title (required*)"
                            maxlength="255"
                            required
                        />
                    </div>
                    <div class="mb-3">
                        <label for="questionTextInput" class="form-label">Question:</label>
                        <textarea
                            class="form-control"
                            id="questionTextInput"
                            v-model="answer"
                            rows="3"
                            placeholder="Question"
                        ></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Padding top:</label>
                        <select v-model="p_t" class="form-select">
                            <option value="0">0px</option>
                            <option value="1">1px</option>
                            <option value="2">2px</option>
                            <option value="3">3px</option>
                            <option value="4">4px</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Padding bottom:</label>
                        <select v-model="p_b" class="form-select">
                            <option value="0">0px</option>
                            <option value="1">1px</option>
                            <option value="2">2px</option>
                            <option value="3">3px</option>
                            <option value="4">4px</option>
                        </select>
                    </div>
                    <div class="btn-group">
                        <button
                            type="button"
                            class="btn btn-primary"
                            @click.prevent="updateQuestion"
                        >
                            Update
                        </button>
                        <router-link
                            :to="{ name: 'admin' }"
                            class="btn btn-outline-secondary ml-3"
                        >
                            Cancel
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "AdminEditComponent",
    data() {
        return {
            question: 'Loading...',
            answer: 'Loading...',
            p_t: 'Loading...',
            p_b: 'Loading...',
        };
    },
    computed: {
        id() {
            return this.$route.params.id
        }
    },
    mounted() {
        this.getQuestion()
    },
    methods: {
        getQuestion() {
            axios
                .get(`/laravel_api/questions/${this.id}`)
                .then((response) => {
                    this.question = response.data.question;
                    this.answer = response.data.answer;
                    this.p_t = response.data.p_t;
                    this.p_b = response.data.p_b;
                })
                .catch((error) => {
                    console.log(error);
                    this.question = 'Something went wrong. Please try again later';
                    this.answer = 'Something went wrong. Please try again later';
                    this.p_t = 'Something went wrong. Please try again later';
                    this.p_b = 'Something went wrong. Please try again later';
                });
        },
        updateQuestion() {
            axios
                .put(`/laravel_api/questions/${this.$route.params.id}`, {
                    question: this.question,
                    answer: this.answer,
                    p_t: this.p_t,
                    p_b: this.p_b,
                })
                .then(() => {
                    this.$router.push({name: "admin"});
                })
                .catch(() => {
                    alert('something went wrong!')
                });
        },
    },
};
</script>

<style scoped></style>
