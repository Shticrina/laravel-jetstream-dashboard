<template>
	<div class="w-full px-6 py-8">
        <div class="flex justify-between container mx-auto">
            <div class="w-full lg:w-8/12 px-8">
                <!-- <h1 class="text-xl font-bold text-purple-500 md:text-2xl py-4">{{ dee }}</h1> -->

                <div class="flex items-center justify-between">
                    <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Posts</h1>

                    <div class="flex items-center justify-end w-2/4">
                        <router-link :to="{name: 'AddPost'}" class="px-3 py-2 bg-purple-600 text-gray-100 rounded hover:bg-purple-700 mr-4">Add new Post</router-link>

                        <select class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option>Latest</option>
                            <option>Last Week</option>
                        </select>
                    </div>
                </div>

                <div class="mt-6" v-if="posts.length" v-for="post in posts" :key="post.id">
                    <div class="px-10 py-6 bg-white rounded-lg shadow-md">
                        <div class="flex justify-between items-center">
                        	<span class="font-light text-gray-600">{{ post.created_at }}</span>
                        	<a href="#" class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500">Laravel</a>
                        </div>

                        <div class="mt-2">
                            <router-link :to="{name: 'ShowPost', params: { id: post.id }}" class="text-2xl text-gray-700 font-bold hover:underline">{{ post.title }}</router-link>
                            <p class="mt-2 text-gray-600">{{ post.body }}</p>
                        </div>

                        <div class="flex justify-between items-center mt-4"><a href="#"
                                class="text-blue-500 hover:underline">Read more</a>
                            <div>
                            	<a href="#" class="flex items-center">
                            		<img src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                        alt="avatar" class="mx-4 w-10 h-10 object-cover rounded-full hidden sm:block">
                                    <h1 class="text-gray-700 font-bold hover:underline">{{ post.user.name }}</h1>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8">
                    <div class="flex">
                        <a href="#" class="mx-1 px-3 py-2 bg-white text-gray-500 font-medium rounded-md cursor-not-allowed">
                            previous
                        </a>
                    
                        <a href="#" class="mx-1 px-3 py-2 bg-white text-gray-700 font-medium hover:bg-blue-500 hover:text-white rounded-md">
                            1
                        </a>
                    
                        <a href="#" class="mx-1 px-3 py-2 bg-white text-gray-700 font-medium hover:bg-blue-500 hover:text-white rounded-md">
                            2
                        </a>
                    
                        <a href="#" class="mx-1 px-3 py-2 bg-white text-gray-700 font-medium hover:bg-blue-500 hover:text-white rounded-md">
                            3
                        </a>
                    
                        <a href="#" class="mx-1 px-3 py-2 bg-white text-gray-700 font-medium hover:bg-blue-500 hover:text-white rounded-md">
                            Next
                        </a>
                    </div>
                </div>
            </div>

            <div class="-mx-8 w-4/12 hidden lg:block">
                <div class="px-8">
                    <h1 class="mb-4 text-xl font-bold text-gray-700">Authors</h1>

                    <div class="flex flex-col bg-white max-w-sm px-6 py-4 rounded-lg shadow-md">
                        <ul class="-mx-4">
                            <li class="flex items-center mb-6" v-for="user in users" :key="user.id">
                            	<img src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                    alt="avatar" class="w-10 h-10 object-cover rounded-full mx-4">

                                <p>
                                	<a href="#" class="text-gray-700 font-bold mx-1 hover:underline">{{ user.name }}</a><span class="text-gray-700 text-sm font-light">Created {{ user.posts.length }} Posts</span>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-10 px-8">
                    <h1 class="mb-4 text-xl font-bold text-gray-700">Categories</h1>

                    <div class="flex flex-col bg-white px-4 py-6 max-w-sm rounded-lg shadow-md">
                        <ul>
                            <li><a href="#" class="text-gray-700 font-bold mx-1 hover:text-gray-600 hover:underline">-
                                    AWS</a></li>
                            <li class="mt-2"><a href="#"
                                    class="text-gray-700 font-bold mx-1 hover:text-gray-600 hover:underline">-
                                    Laravel</a></li>
                            <li class="mt-2"><a href="#"
                                    class="text-gray-700 font-bold mx-1 hover:text-gray-600 hover:underline">- Vue</a>
                            </li>
                            <li class="mt-2"><a href="#"
                                    class="text-gray-700 font-bold mx-1 hover:text-gray-600 hover:underline">-
                                    Design</a></li>
                            <li class="flex items-center mt-2"><a href="#"
                                    class="text-gray-700 font-bold mx-1 hover:text-gray-600 hover:underline">-
                                    Django</a></li>
                            <li class="flex items-center mt-2"><a href="#"
                                    class="text-gray-700 font-bold mx-1 hover:text-gray-600 hover:underline">- PHP</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-10 px-8">
                    <h1 class="mb-4 text-xl font-bold text-gray-700">Recent Posts</h1>

                    <div class="flex flex-col bg-white px-8 py-6 max-w-sm rounded-lg shadow-md">
                        <div class="flex justify-center items-center"><a href="#"
                                class="px-2 py-1 bg-gray-600 text-sm text-green-100 rounded hover:bg-gray-500">Laravel</a>
                        </div>

                        <div class="mt-4"><a href="#" class="text-lg text-gray-700 font-medium hover:underline">Build
                                Your New Idea with Laravel Freamwork.</a></div>
                        <div class="flex justify-between items-center mt-4">
                            <div class="flex items-center">
                            	<img
                                    src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                    alt="avatar" class="w-8 h-8 object-cover rounded-full">
                                    <a href="#" class="text-gray-700 text-sm mx-3 hover:underline">Alex John</a>
                            </div>

                            <span class="font-light text-sm text-gray-600">Jun 1, 2020</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
	import { ref } from 'vue';

	export default {
		// props: ['apple'],
		// components: {
			
		// },
		data() {
		    return {
		      	dee: 'Hello Vue.js!',
		      	posts: [],
		      	users: []
		    }
  		},
  		mounted() {
  			this.getAllPosts();
        },
		/*async setup() {
			const { posts } = await getAllPosts();
			const { users } = await getUsersWithPosts();

			return { posts, users };
		},*/
		methods: {
		    async getAllPosts() {
                console.log(axios.defaults.baseURL); // http://localhost:8000/
                // console.log(window.location.pathname);
                // console.log(this.$router.currentRoute.value.path); // /blog

		      	// await axios.get('http://localhost:8000/api/posts/')
                await axios.get('api/posts/')
	            .then(response => {
	                this.posts = response.data.posts;
	                this.users = response.data.users;
	                console.log(response.data);
	            });
	    	},
  		},
	}
</script>