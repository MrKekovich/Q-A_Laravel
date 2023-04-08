<template>
    <div v-for="answer in answers" :key="answer.id">
        <AnswerListItemComponent :answer="answer"/>
        <hr/>
    </div>
</template>

<script>
import AnswerListItemComponent from "./Items/AnswerListItemComponent.vue";

export default {
    name: "AnswerListComponent",
    components: {
        AnswerListItemComponent
    },
    props: {
        answers: {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            loading: false
        };
    },
    methods: {}
};
</script>
