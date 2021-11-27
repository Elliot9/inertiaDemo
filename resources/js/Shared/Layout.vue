<template>
    <Nav />
    <slot />
</template>

<script>
    import Nav from "./Nav";
    export default {
        name: "Layout",
        components: {Nav}
    }
</script>

<style scoped>

</style>
