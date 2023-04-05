<template>
    <form id="question-form">
        <div class="form-group">
            <label for="question">Ask a question:</label>
            <input type="text" class="form-control mb-3" id="question" name="question" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>

<script>
export default {
    name: "CreateComponent"
}
</script>

<style scoped>

</style>
