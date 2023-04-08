<template>
    <AdminMainComponent></AdminMainComponent>
</template>

<script>
import CreateComponent from "./Question/Items/Main/CreateComponent.vue";
import AdminMainComponent from "./Question/AdminMainComponent.vue";

export default {
    name: "Admin",
    components: {CreateComponent, AdminMainComponent}
}
</script>

<style scoped>

</style>
