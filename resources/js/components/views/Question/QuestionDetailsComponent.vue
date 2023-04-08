<template>
    <div class="container">
        {{ id }}
    </div>
</template>

<script>
export default {
    name: "QuestionDetailsComponent",
    computed: {
        id() {
            return this.$route.params.id
        }
    },
    data() {
        return {
            loading: true
        }
    }
}
</script>

<style scoped>

</style>
