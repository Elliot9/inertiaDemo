<template>
    <nav class="navbar navbar-light bg-light">
        <Link href="/blog" class="nav-item">Home</Link>
        <Link href="/blog/Create" class="nav-item">Create Blog</Link>
        <a href="/blog/logout" class="nav-item">Logout</a>
    </nav>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3'
    export default {
        name: "Nav",
        components: {
            Link
        }
    }
</script>

<style scoped>

</style>
