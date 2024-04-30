<template>
    <nav class="ml-6">
        <ul class="flex space-x-6">            
            <NavLink href="/" label="Home" :pageComponent="$page.component === 'Home'"/>            
            <NavLink href="/users" label="Users" :pageComponent="$page.component === 'Users'"/>            
            <NavLink href="/settings" label="Settings" :pageComponent="$page.component === 'Settings'"/>                        
            <li>
                <Link class="text-black hover:underline" :data="{ foo: 'bar' }" href="/logout" method="post" as="button">Log Out</Link>
            </li>
        </ul>
    </nav>
</template>

<script>
import NavLink from './NavLink.vue';

export default {
    components: { 
        NavLink
    }    
}
</script>