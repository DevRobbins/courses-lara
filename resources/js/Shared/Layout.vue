<template> 
<head>
    <title>My App</title>
</head>
<section class="p-6 bg-gray-200">
    <header class="flex items-center justify-between">
        <div class="flex items-end">
            <h1 class="font-bold text-lg">My App</h1>
            <p class="ml-4 text-base">Welcome Back, {{$page.props.auth.user.username}} </p>
        </div>
        <Nav />
    </header>  
</section> 
<section class="p-6">
    <slot />
</section>
</template>

<script>
import Nav from './Nav.vue';
import { Head } from "@inertiajs/vue3";

export default {    
    components: { 
        Nav,
        Head
    }    
}
</script>