<template>
    <li>
        <Link class="text-black hover:underline" :href="href" :class="pageComponent ? 'font-bold underline' : ''">{{label}}</Link>
    </li>
</template>

<script>

export default {
    props: {
        label: String,
        href: String,
        pageComponent: Boolean
    }
}
</script>