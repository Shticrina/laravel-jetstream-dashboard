import { createWebHistory, createRouter } from "vue-router";
import Home from "../components/Home.vue";
import About from "../components/About.vue";
import Products from "../components/Products.vue";
import Posts from "../components/Posts.vue";
import Todos from "../components/Todos.vue";
import NotFound from "../components/partials/NotFound.vue";

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
	/*{
		path: "/products",
		name: "Products",
		component: Products,
	},
	{
		path: "/products/edit/:id",
		name: "ProductEdit",
		// component: Products,
	},*/
	{
		path: "/blog",
		name: "Blog",
		component: Posts,
	},
	{
		path: "/todo-list",
		name: "Todos",
		component: Todos,
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

export default router;