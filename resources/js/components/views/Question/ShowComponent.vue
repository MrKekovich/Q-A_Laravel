<template>
    <div id="question-list">
        <!-- Question card -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Question Title</h5>
                <p class="card-text">Question Content</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">Author Name - Date</small>
                    <a href="#" class="btn btn-link" data-toggle="collapse" data-target="#answer-1" aria-expanded="false" aria-controls="answer-1"><i class="fas fa-chevron-down"></i></a>
                </div>
                <div class="collapse" id="answer-1">
                    <div class="card card-body">
                        <p>Short answer...</p>
                        <p class="d-none">Full answer...</p>
                        <a href="#" class="btn btn-link reveal-answer"><i class="fas fa-eye"></i> Show full answer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ShowComponent"
}
</script>

<style scoped>

</style>
