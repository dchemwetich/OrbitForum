<script setup>
import FrontendLayout from '@/Layouts/FrontendLayout.vue';
import { Head } from '@inertiajs/vue3';


import Discussion from '@/Components/Frontend/Discussion.vue';
import Select from '@/Components/Select.vue';
import TextInput from '@/Components/TextInput.vue';
import Pagination from '@/Components/Pagination.vue';




const props = defineProps({
    discussions: Object,
    query: Object
})

</script>

<template>

    <!-- handled in the frontend  -->


    <Head title="DreamHacks Forum" />

    <FrontendLayout>
        <div class="space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex items-center space-x-3">
                    <div class="flex-grow">
                        <InputLabel for="search" value="Search" class="sr-only" />
                        <TextInput type="search" id="search" class="w-full" v-model="searchQuery" placeholder="Search discussions..." />
                    </div>
                    <div>
                        <InputLabel for="topic" value="Topic" class="sr-only" />
                        <Select id="topic" v-on:change="filterTopic">
                            <option value="">All topics</option>
                            <option
                                :value="topic.slug"
                                v-for="topic in $page.props.topics"
                                :key="topic.id"

                            >
                                {{ topic.title }}
                            </option>
                        </Select>
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                    <!-- <Discussion  /> -->

                    <Discussion v-for="discussion in discussions.data" :key="discussion.id" :discussion="discussion" />
                    <Pagination class="!mt-6" :pagination="discussions.meta" />

            </div>
        </div>



        <template #side>
            <PrimaryButton v-on:click="showCreateDiscussionForm" class="w-full flex justify-center h-10" v-if="$page.props.auth.user">
                Start a discussion
            </PrimaryButton>
            <Navigation :query="query" />
        </template>

    </FrontendLayout>
</template>
