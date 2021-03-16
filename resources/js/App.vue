<template>
	<header-component></header-component>
	<!-- <header-component :user="user" :isLoggedIn="isLoggedIn"></header-component> -->

	<main class="flex min-h-screen bg-gray-50 dark:bg-gray-900 p-8">
		<router-view />
		<!-- <router-view @loggedIn="change"></router-view> -->
	</main>

    <footer-component></footer-component>
</template>

<script>
	import { ref } from 'vue';
	import store from './store/store';
	import HeaderComponent from './components/partials/HeaderComponent.vue';
	import FooterComponent from './components/partials/FooterComponent.vue';

	export default {
		data() {
            return {
                /*user: JSON.parse(localStorage.getItem('auth_user')),
                isLoggedIn: localStorage.getItem('auth_user') != null,*/
                isLoggedIn: store.getters.isLoggedIn
            }
        },
		components: {
			HeaderComponent,
			FooterComponent,
		},
		/*beforeMount() {
            store.commit('setAuthUser', window.localStorage.auth_user);
        }*/
        mounted() {
        	// console.log('connected in app: ', this.isLoggedIn);
        	/*console.log(localStorage.getItem('auth_user')); // ok
    		await this.setDefaults();*/
    	},
    	methods : {
			// setDefaults() {
   //          	console.log('connected in app: ', this.isLoggedIn);
   //  			console.log('user in app: ', this.user);

			// 	// store.dispatch('setDefaults', this.isLoggedIn);
			// 	store.commit('setIsLoggedIn', this.isLoggedIn);
   //              store.commit('setAuthUser', localStorage.getItem('auth_user'));
			// }
		}
	}
</script>

<style>	
</style>