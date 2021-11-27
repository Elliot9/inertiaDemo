<template>
    <Layout>
        <form @submit.prevent="submit">
            Create Page
            <input type="text" v-model="form.title">
            <input type="text" v-model="form.content">
            <button>Submit</button>
        </form>
    </Layout>
</template>

<script>
    import Layout from "../Shared/Layout";
    import { Inertia } from '@inertiajs/inertia'
    import { reactive } from 'vue'

    export default {
        setup () {
            const form = reactive({
                title: null,
                content: null,
            })

            function submit() {
                Inertia.post('/blog/Create', form)
            }

            return { form, submit }
        },
        components: {
            Layout
        }
    }
</script>

<style scoped>

</style>
