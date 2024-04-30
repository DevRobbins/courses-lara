<template>
        <Component 
            :is="link.url ? 'Link' : 'span'"
            v-for="link in links" 
            :href="link.url" 
            v-html="link.label" 
            class="px-1"
            :class="
                link.url ? 'hover:text-indigo-600' : 'text-gray-500 cursor-not-allowed', 
                link.active ? 'text-indigo-600' : ''
                "
        />
</template>

<script>
export default {
    props: {
        links: Array,
    }
}
</script>