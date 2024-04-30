<template>
    <div>
        <Head>
            <title>Home</title>
            <meta type="description" content="Information about my homepage" head-key="description">
        </Head>
        <h1 class="text-4xl font-bold">Home</h1>
        <h2 class="text-4xl font-bold">Hello, {{name}}</h2>
        <p>In this series, we will use the following frameworks:</p>
        <ul>
            <li v-for="framework of frameworks" v-text="framework"></li>
        </ul>
    </div>
</template>

<script>
import Layout from '../Shared/Layout.vue';
import { Head } from "@inertiajs/vue3";

export default {
    props: {
        name: String, 
        frameworks: Array
    }, 
    layout: Layout,
    components: { Head }    
}
</script>