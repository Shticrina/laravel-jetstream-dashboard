<template>
	<header-component title="rrry"></header-component>

	<main class="p-6">
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