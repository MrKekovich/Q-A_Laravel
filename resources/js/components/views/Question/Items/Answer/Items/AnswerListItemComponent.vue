<template>
    <div class="card">
        <div class="card-header" :id="'answer-heading-' + answer.id">
            <h6 class="mb-0">
                <button class="btn btn-link" type="button" @click="toggleShowFull" :aria-expanded="showFull"
                        :aria-controls="'answer-details-' + answer.id">
                    <i class="fa" :class="{'fa-angle-down': !showFull, 'fa-angle-up': showFull}"></i>
                    {{ showFull ? answer.body : answer.body.slice(0, 50) + '...' }}
                </button>
            </h6>
        </div>

        <div :id="'answer-details-' + answer.id" class="collapse" :class="{'show': showFull}"
             :aria-labelledby="'answer-heading-' + answer.id" data-parent="'#answer-list'">
            <div class="card-body">
                <p>{{ answer.body }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AnswerListItemComponent",
    props: {
        answer: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            showFull: false,
            loading: false
        };
    },
    mounted() {
    },
    methods: {
        toggleShowFull() {
            if (!this.showFull) {
                this.loading = true;
                // Simulate API request
                setTimeout(() => {
                    this.showFull = true;
                    this.loading = false;
                }, 1000);
            } else {
                this.showFull = false;
            }
        }
    }
};
</script>
