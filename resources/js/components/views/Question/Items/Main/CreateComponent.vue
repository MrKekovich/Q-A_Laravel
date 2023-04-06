<template>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title:</label>
        <input type="text" class="form-control" v-model="title" placeholder="Title (required*)"
               maxlength="255" required>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Question:</label>
        <textarea class="form-control" v-model="body" rows="3" placeholder="Question"></textarea>
    </div>
    <button type="button" class="btn btn-primary" @click.prevent="createQuestion">Submit</button>
</template>

<script>
export default {
    name: "CreateComponent",
    emits: ['questionCreated'],
    data() {
        return {
            title: null,
            body: null,
            question: null
        }
    },
    methods: {
        createQuestion() {
            axios.post('/laravel_api/questions', {
                title: this.title,
                body: this.body
            })
                .then(response => {
                    this.question = response.data
                    this.$emit('questionCreated');
                })
        }
    }
}
</script>

<style scoped>

</style>
