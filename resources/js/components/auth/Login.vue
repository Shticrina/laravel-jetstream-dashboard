<template>
    <div class="container mx-auto">
        <div class="max-w-xl mx-auto flex justify-center items-center mt-10">
        	<router-link :to="{name: 'Home'}" class="px-3">
        		<img src="/img/logo.svg" class="" width="60" alt="logo">
        	</router-link>
            <!-- <h1 class="text-2xl uppercase text-gray-700 px-3">Login</h1> -->
        </div>

        <div class="max-w-xl mx-auto my-4 bg-white p-5 shadow-xl">
            <form action="#" @submit.prevent="handleLogin">
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Email</label>
                    <input type="email" name="email" v-model="formData.email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required />
                </div>

                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Password</label>
                    <input type="password" name="password" v-model="formData.password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required />
                </div>

                <div class="mb-6">
                	<label for="remember_me" class="flex items-center">
	                    <input type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="remember_me" name="remember">
	                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
	                </label>
                </div>

            	<div class="flex items-center justify-end my-6">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/forgot-password">
                        Forgot your password?
                    </a>
                
                	<button type="submit" class="inline-flex items-center px-4 py-2 bg-purple-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 active:bg-purple-900 focus:outline-none focus:border-purple-900 focus:shadow-outline-purple disabled:opacity-25 transition ease-in-out duration-150 ml-4">
    					Log in
					</button>
            	</div>
            </form>
        </div>
    </div>
</template>

<script>
	import store from '../../store/store';

    export default {
        data() {
            return {
                formData: {
                	email: '',
                	password: ''
                }
            }
        },
        methods: {
            handleLogin() {
                axios.get('/sanctum/csrf-cookie').then(response => {
	                // axios.post('/login', this.formData)
	                store.dispatch('login', this.formData)
	                .then(response => {
	                    // console.log(response);
	                    // store.dispatch('setDefaults', true);
	                    /*store.commit('setIsLoggedIn', true);
	                    store.commit('setAuthUser', window.localStorage.auth_user);

	                    console.log(localStorage.getItem('auth_user'));
*/
	                    this.$router.push({name: 'Blog'});
	                })
	                .catch(error => console.log(error));
				});
            }
        }
    }
</script>