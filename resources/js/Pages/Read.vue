<template>
    <Layout>
        <form>
            <input type="text" v-model="form.title" class="form-control">
            <input type="text" v-model="form.content" class="form-control">
            <button class="btn btn-info" @click="submit">Submit</button>
            <Link method="delete" as="button" type="button" class="btn btn-alert" :href="'/blog/Delete/'+form.id">Delete</Link>
        </form>
    </Layout>
</template>

<script>
    import Layout from "../Shared/Layout";
    import { Inertia } from '@inertiajs/inertia';
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        name: "Read",
        components: { Layout,Link },
        data() {
            return {
                form: {
                    id: this.blog.id,
                    title: this.blog.title,
                    content: this.blog.content
                }
            }
        },
        props: {
            blog: Object
        },
        methods: {
            submit() {
                Inertia.post('/blog/Update', this.form)
            }
        }
    }

</script>

<style scoped>

</style>
