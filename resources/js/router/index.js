import { createWebHistory, createRouter } from "vue-router";
import Home from "../components/Home.vue";
import About from "../components/About.vue";
import Products from "../components/projects/ListProjects.vue";
import Posts from "../components/posts/ListPosts.vue";
// import ShowPost from '../components/posts/ShowPost.vue';
import AddPost from '../components/posts/AddPost.vue';
// import EditPost from '../components/posts/EditPost.vue';
import Todos from "../components/todos/ListTodos.vue";
import NotFound from "../components/partials/NotFound.vue";
import Login from "../components/auth/Login.vue";
// import Register from "../components/auth/Register.vue";

const routes = [
	{
		path: "/",
		name: "Home",
		component: Home,
	},
	{
		path: "/about",
		name: "About",
		component: About,
	},
	{
		path: "/blog",
		name: "Blog",
		component: Posts,
	},
	{
		path: "/blog/showPost/:id",
		name: "ShowPost",
		// component: ShowPost
	},
	{
		path: "/blog/addPost",
		name: "AddPost",
		component: AddPost,
		meta: {
        	requiresAuth: true
      	}
	},
	{
		path: "/blog/editPost/:id",
		name: "EditPost",
		// component: EditPost
	},
	{
		path: "/todo-list",
		name: "Todos",
		component: Todos,
	},
	{
		path: "/login",
		name: "Login",
		component: Login,
	},
	{
		path: "/register",
		name: "Register",
		// component: Register,
	},
	{
	  	// path: "/:catchAll(.*)",
	  	/*path: "/*",
	  	component: NotFound,*/
	}
];

const router = createRouter({
  	// history: createWebHashHistory(),
  	history: createWebHistory(),
  	routes,
});

/*router.beforeEach((to, from, next) => {
  	if (to.name !== 'Login' && !isAuthenticated) next({ name: 'Login' });
  	else next();
});*/

export default router;