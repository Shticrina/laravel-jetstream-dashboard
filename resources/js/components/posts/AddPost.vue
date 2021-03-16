<template>
    <div class="container mx-auto">
        <div class="max-w-3xl mx-auto my-10 bg-white p-5 shadow-xl">
            <div class="text-center">
                <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">Create new post</h1>
            </div>

            <div class="m-7">
                <form @submit.prevent="addPost">
                    <div class="mb-6">
                        <label for="title" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Title</label>
                        <input type="text" name="title" v-model="post.title" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required />
                    </div>

                    <div class="mb-6">
                        <label for="body" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Body</label>
                        <textarea rows="5" name="body" v-model="post.body" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required></textarea>
                    </div>

                    <div class="mb-6">
                        <button type="submit" class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">Add post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                post: {}
            }
        },
        methods: {
            addPost() {
                axios.post('api/posts/', this.post)
                .then(response => {
                    // console.log(response);

                    if (response.success) {
                        // show success message in toastr
                        this.$router.push({name: 'Blog'});
                    }
                })
                .catch(error => console.log(error))
                .finally(() => this.loading = false);
            }
        }
    }
</script>