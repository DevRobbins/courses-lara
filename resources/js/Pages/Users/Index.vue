<template>
    <div>
        <Head>
            <title>Users</title>
        </Head>
        <div class="flex justify-between mb-4">
            <div class="flex items-center">
                <h1 class="text-4xl font-bold ">Users</h1> 
                <Link href="/users/create" class="text-blue-500 text-sm ml-3">Create New</Link>     
            </div>
            
            <!-- <input v-model="search" @keyup="this.searchBar(search)" type="text" class="pl-4 border rounded-lg" placeholder="Search..."> -->
            <input v-model="search" type="text" class="pl-4 border rounded-lg" placeholder="Search...">
        </div>


        <div class="flex flex-col">
            <div class="overflow-x-auto -my-2 sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="user in users.data" :key="user.id">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{user.name}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6">
            <Pagination :links="users.links" />
        </div>

        <div style="margin-top: 2000px; ">
            <p>The current time is {{ time }}.</p>

            <Link href="/users" class="text-blue-500" preserve-scroll>Refresh</Link>
        </div>
    </div>
</template>

<script>
import Layout from '../../Shared/Layout.vue';
import Pagination from '../../Shared/Pagination.vue';
import { Head } from "@inertiajs/vue3";


// npm install lodash
// Debounce triggers after 300ms of no typing. 
// Throttle triggers a search every 300ms.

// import throttle from "lodash/throttle";
import debounce from "lodash/debounce";

export default {
    props: {
        time: String,
        users: Object,
        filters: Object
    }, 
    layout: Layout,
    components: { 
        Head,
        Pagination
    },
    data() {
        return {
            search: this.filters.search
        }        
    },    
    mounted() {
        this.$watch('search', debounce(function() {        
            console.log(this.search); 
            this.$inertia.get('/users', { search: this.search }, {
                preserveState: true,
                replace: true
            });
        }, 300));
    }    
}
</script>