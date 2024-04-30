<template>
    <main class="flex items-center justify-center min-h-screen">
        <section class="bg-white p-8 rounded max-w-md mx-auto min-w-96 border">
            <h1 class="text-4xl font-bold">Login</h1>
            <form @submit.prevent="this.formSubmit()" class="mt-8">
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Email
                    </label>
                    <input 
                        type="email" 
                        name="email" 
                        v-model="form.email"
                        id="email" 
                        class="border rounded p-2 w-full"
                        placeholder="Email"
                        required
                    >
                    <div v-if="$page.props.errors.email" v-text="$page.props.errors.email" class="text-red-500 text-xs mt-1"></div>
                </div>

                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Password
                    </label>        
                    <div class="password_input_container">
                        <input 
                            type="password" 
                            name="password" 
                            v-model="form.password"
                            id="password" 
                            class="border rounded p-2 w-full"
                            placeholder="Password"
                            required
                        >
                        <div id="toggle_button" class="toggle_button" @click="this.togglePassword()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="15" height="15">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                    </div>
                    <div v-if="$page.props.errors.password" v-text="$page.props.errors.password" class="text-red-500 text-xs mt-1"></div>
                </div>

                <div class="mb-6  flex items-center">
                    <button type="submit" :disabled="this.processing"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-2">
                        Login
                    </button>
                    <Spinner v-if="this.processing" />
                </div>

            </form>
        </section>
    </main>
</template>

<script>
import { Head } from "@inertiajs/vue3";
import Spinner from '../../Shared/Spinner.vue';

export default {        
    layout: null,
    components: { 
        Head,
        Spinner
    },
    data() {
        return {
            form: {
                email: '',
                password: ''
            },
            processing: false
        }
    }, 
    methods: {
        togglePassword() {
            let toggle_button = document.getElementById('toggle_button')
            let password_input = document.getElementById('password')

            if (password_input.type === 'password') {
                password_input.type = 'text'
                toggle_button.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="15" height="15">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                </svg>`
            } else {
                password_input.type = 'password'
                toggle_button.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="15" height="15">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>`
            }
        },
        formSubmit() {
            
            this.$inertia.post('/login', this.form, {
                onStart: () => { 
                    this.processing = true; 
                },
                onFinish: () => {
                    this.processing = false; 
                }
            });
        }
    }    
}
</script>

<style scoped>
.password_input_container { position: relative; }
.password_input_container .toggle_button {
    cursor: pointer;
    position: absolute;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    top: 0;
    right: 10px;
    background-color: transparent;
    border: none;
    color: #777;
}
    
/* Focus or containing value (placeholder not shown) */
.password_input_container input:focus + label,
.password_input_container input:not(:placeholder-shown) + label {
    top: 0;
    font-size: 8px;
    z-index: 1;
}
/* Only when focused */
.password_input_container input:focus + label {
    color: rgb(15, 156, 116);
    font-size: 8px;
}
.password_input_container input:focus {
    border-color: rgb(15, 156, 116);
}
</style>