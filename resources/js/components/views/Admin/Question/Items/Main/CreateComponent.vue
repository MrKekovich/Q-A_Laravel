<template>
    <div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title:</label>
            <input type="text" class="form-control" v-model="question" placeholder="Title (required*)" maxlength="255" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Question:</label>
            <textarea class="form-control" v-model="answer" rows="3" placeholder="Question"></textarea>
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
        <button type="button" class="btn btn-primary" @click.prevent="createQuestion">Submit</button>
    </div>
</template>

<script>
export default {
    name: "CreateComponent",
    emits: ["questionCreated"],
    data() {
        return {
            question: null,
            answer: null,
            p_t: 0,
            p_b: 0,
        };
    },
    methods: {
        createQuestion() {
            axios
                .post("/laravel_api/questions", {
                    question: this.question,
                    answer: this.answer,
                    p_t: this.p_t,
                    p_b: this.p_b,
                })
                .then(() => {
                    this.question = null;
                    this.answer = null;
                    this.p_t = 0;
                    this.p_b = 0;
                    this.$emit("questionCreated");
                });
        },
    },
};
</script>

<style scoped></style>
