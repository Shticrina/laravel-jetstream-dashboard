<template>
	<header class="text-gray-100 bg-gray-900 body-font shadow w-full">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <nav class="flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto">
                <!-- <a href="/" class="mr-5 text-green-400 hover:text-purple-400 cursor-pointer">Home</a> -->
                <router-link :to="{ name: 'Home' }" class="mr-5 text-green-400 hover:text-purple-400 cursor-pointer">Home</router-link>

                <router-link to="/about" class="mr-5 text-green-400 hover:text-purple-400 cursor-pointer">About</router-link>
                
                <router-link :to="{ name: 'Blog' }" class="mr-5 text-green-400 hover:text-purple-400 cursor-pointer">Blog</router-link>

                <!-- <router-link to="/blog" class="mr-5 text-green-400 hover:text-purple-400 cursor-pointer">Blog</router-link> -->

                <router-link to="/todo-list" class="mr-5 text-green-400 hover:text-purple-400 cursor-pointer">Todos</router-link>
            </nav>

            <a href="/" class="flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center lg:items-center lg:justify-center mb-4 md:mb-0">
                <img src="img/default_user.png" style="height: 40px; margin-top: 10px; margin-bottom: 10px;" alt="logo">
            </a>

            <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
                <template v-if="isLoggedIn && user">
                    <a href="/user/profile" class="mr-4">Welcome <i>{{ user['name'] }}</i>!</a>
                    <a href="/dashboard" class="mr-5 text-purple-400 hover:text-purple-500 cursor-pointer">Dashboard</a>

                    <form action="#" @submit.prevent="handleLogout">
                        <!-- <a href="/logout" class="text-purple-400 hover:text-purple-500 cursor-pointer">Logout</a> -->
                        <button type="submit" class="text-purple-400 hover:text-purple-500 cursor-pointer">Logout</button>
                    </form>
                </template>

                <template v-else>
                    <!-- <a href="/login" class="mr-5 text-purple-400 hover:text-purple-500 cursor-pointer">Login</a> -->
                    <!-- <a href="/register" class="mr-5 text-purple-400 hover:text-purple-500 cursor-pointer">Register</a> -->
                    <router-link :to="{ name: 'Login' }" class="mr-5 text-green-400 hover:text-green-500 cursor-pointer">Login Vue</router-link>
                </template>

                <!-- <router-link to="/register" class="mr-5 text-purple-400 hover:text-purple-500 cursor-pointer">Register</router-link> -->
            </div>
        </div>
    </header>
</template>

<script>
	import { ref } from 'vue';
    import store from '../../store/store';

	export default {
		// props: ['user', 'isLoggedIn'],
		/*data() {
            return {
                user: JSON.parse(localStorage.getItem('auth_user')),
                isLoggedIn: false,
            }
        },*/
        computed: {
            isLoggedIn: function() { return store.getters.isLoggedIn },
            user: function() { return store.getters.user }
        },
        mounted() {
            // this.isLoggedIn = this.user != null;
            console.log('user in header: ', this.user);
            console.log('connected in header: ', this.isLoggedIn); // true, ok        
        },
        methods: {
            handleLogout() {
                // axios.get('/sanctum/csrf-cookie').then(response => {
                    // axios.post('/logout')
                    store.dispatch('logout')
                    .then(response => {
                        this.$router.push({name: 'Login'});
                        // update header & states in store
                        // this.isLoggedIn = false;
                        /*localStorage.setItem('auth_user', null);
                        store.commit('setAuthUser', null);
                        store.commit('setIsLoggedIn', false);*/
                        // store.dispatch('setDefaults', this.isLoggedIn);

                        // console.log(localStorage.getItem('auth_user')); // ok   
                    })
                    .catch(error => console.log(error));
                // });
            }
        }
	}
</script>