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
                <img src="https://pazly.dev/logo.png" style="height: 40px; margin-top: 10px; margin-bottom: 10px;" alt="logo">
            </a>

            <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
                <a href="/dashboard" class="mr-5 text-green-400 hover:text-purple-400 cursor-pointer">Dashboard</a>
                <a href="/login" class="mr-5 text-green-400 hover:text-purple-400 cursor-pointer">Login</a>
                <a href="/register" class="mr-5 text-green-400 hover:text-purple-400 cursor-pointer">Register</a>

                <!-- <router-link to="/login" class="mr-5 text-green-400 hover:text-purple-400 cursor-pointer">Login</router-link> -->
                <!-- <router-link to="/register" class="mr-5 text-green-400 hover:text-purple-400 cursor-pointer">Register</router-link> -->
            </div>
        </div>
    </header>

	<!-- <div class="mt-4">Header component, {{ mess }}</div> -->
	<!-- <div class="mb-5">Title: {{ title }}...</div> -->
</template>

<script>
	import { ref } from 'vue';

	export default {
		props: ['title'],
		setup() {
			const mess = ref('hello there page!');

			return {
				mess
			}
		}
	}
</script>

<style>
	
</style>