<template>
    <div class="container">
        <h1>Q&A Service</h1>
        <!-- Question form -->
        <create-component></create-component>
        <hr>
        <!-- List of questions -->
        <show-component></show-component>
    </div>
</template>

<script>
import CreateComponent from './views/Question/CreateComponent.vue'
import ShowComponent from "./views/Question/ShowComponent.vue";
export default {
    name: "Index",
    components: {
        CreateComponent,
        ShowComponent
    }
}
</script>

<style scoped>

</style>
