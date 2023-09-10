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
                <!-- <form >


                    <div class="flex items-center space-x-3 mt-2">
                        <PrimaryButton>
                            Edit
                        </PrimaryButton>
                        <button  class="text-sm">Cancel</button>
                    </div>


                </form> -->

                <div  v-html="post.body_markdown" class="markdown"></div>
            </div>

            <ul class="flex items-center space-x-3 mt-6">


                <li v-if="post.discussion.user_can.reply">
                    <button v-on:click="showCreatePostForm(post.discussion, post.user)" class="text-indigo-500 text-sm">Reply</button>
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
import useCreatePost from '@/Trigers/useCreatePost';
// import { useForm } from '@inertiajs/vue3'
// import Textarea from '../Textarea.vue';
// import InputLabel from '../InputLabel.vue';
// import InputError from '../InputError.vue';
// import PrimaryButton from '../PrimaryButton.vue';
// import { ref } from 'vue'
// import { router } from '@inertiajs/vue3'

const props = defineProps({
    post: Object,
    isSolution: Boolean
})

const { showCreatePostForm } = useCreatePost()

// const editing = ref(false)
// const editForm = useForm({
//     body: props.post.body
// })

// const editPost = () => {
//     editForm.patch(route('posts.patch', props.post), {
//         preserveScroll: true,
//         onSuccess: () => { editing.value = false }
//     })
// }

// const deletePost = () => {
//     if (window.confirm('Are you sure?')) {
//         router.delete(route('posts.destroy', props.post), {
//             preserveScroll: true
//         })
//     }
// }
</script>
