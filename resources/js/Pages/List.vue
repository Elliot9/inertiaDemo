<template>
    <Layout>
        <Link v-for="blog of blogs" :href="'/blog/Read/'+blog.id" class="form-control">{{blog.title}}</Link>
    </Layout>
</template>

<script>
    import Layout from "../Shared/Layout";
    import { Link } from '@inertiajs/inertia-vue3'
    export default {
        name: "List",
        props: {
            blogs: Array
        },
        components: {
            Layout,
            Link
        }
    }
</script>

<style scoped>

</style>
