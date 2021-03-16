<template>
	<header-component title="rrry"></header-component>

	<main class="flex min-h-screen bg-gray-50 dark:bg-gray-900 p-8">
		<router-view />
		<!-- <router-view @loggedIn="change"></router-view> -->
	</main>

    <footer-component></footer-component>
</template>

<script>
	import { ref } from 'vue';
	import HeaderComponent from './components/partials/HeaderComponent.vue';
	import FooterComponent from './components/partials/FooterComponent.vue';

	export default {
		// props: ['title'],
		components: {
			HeaderComponent,
			FooterComponent,
		},
		setup() {
			
		}
	}
</script>

<style>	
</style>