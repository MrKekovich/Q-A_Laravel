<template>
    <div class="container">
        <router-link :to="{name: 'home'}">Home</router-link>
        <h1>Q&A Service</h1>
    </div>
    <router-view></router-view>
</template>

<script>

import MainComponent from "./views/Question/MainComponent.vue";

export default {
    name: "Index",
    components: {
        MainComponent
    }
}
</script>

<style scoped>

</style>
