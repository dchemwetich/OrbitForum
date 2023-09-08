<template>
    <div
       :id="`post-${post.id}`"
        class="relative bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 flex items-start space-x-3 border-2"


    >

        <div class="w-7 flex-shrink-0">
            <img :src="post.user?.avatar_url" class="w-7 h-7 rounded-full" v-if="post.user">
        </div>
        <div class="w-full">
            <div>
                <div>{{ post.user?.username || '[user deleted]' }}</div>
                <div class="text-sm text-gray-500">Posted <time :datetime="post.created_at.datetime" :title="post.created_at.datetime">{{ post.created_at.human }}</time></div>
            </div>
            <div class="mt-3">
                <!-- {{ post.body }} -->
                <form >


                    <div class="flex items-center space-x-3 mt-2">
                        <PrimaryButton>
                            Edit
                        </PrimaryButton>
                        <button  class="text-sm">Cancel</button>
                    </div>
                </form>
                <div  v-html="post.body_markdown" class="markdown"></div>
            </div>

            <ul class="flex items-center space-x-3 mt-6">
                <li>
                    <button class="text-indigo-500 text-sm">Reply</button>
                </li>
                <li >
                    <button  class="text-indigo-500 text-sm">Edit</button>
                </li>
                <li >
                    <button  class="text-indigo-500 text-sm">Delete</button>
                </li>
                <li>
                    <button
                        class="text-indigo-500 text-sm">

                    </button>
                </li>
            </ul>
        </div>

        <div class="absolute right-0 top-0 bg-gray-800 text-gray-100 px-3 py-1 text-xs uppercase tracking-wide font-semibold rounded-bl shadow-sm" >Best answer</div>
    </div>
</template>

<script setup>

const props = defineProps({
    post: Object,
})

</script>
