
<script setup>
import FrontendLayout from '@/Layouts/FrontendLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, router } from '@inertiajs/vue3';

import Post from '@/Components/Frontend/Post.vue';



const props = defineProps({
    discussion: Object,
    posts: Object,
    query: Object,
    postId: Number
})

</script>

<template>
    <Head :title="discussion.title" />

    <FrontendLayout>
        <div class="space-y-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <span class="inline-flex items-center rounded-lg bg-gray-100 px-3 py-0.5 text-sm text-gray-600">
                            {{ discussion.topic.title }}
                        </span>
                        <h1 class="text-lg font-medium">
                            <template v-if="discussion.is_pinned">
                                [Pinned]
                            </template>
                            {{ discussion.title }}
                        </h1>
                        <ul>

                        </ul>
                    </div>

                </div>
            </div>


                <Post v-for="post in posts.data" :key="post.id" :post="post"  />
        </div>

        <template #side>
            <PrimaryButton  class="w-full flex justify-center h-10" >
                Reply to discussion
            </PrimaryButton>
        </template>
    </FrontendLayout>
</template>
