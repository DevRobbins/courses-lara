<template>
    <div>
        <Head>
            <title>Settings</title>
        </Head>

        <h1 class="text-4xl font-bold">Settings</h1>
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
    components: { 
        Head
    }    
}
</script>