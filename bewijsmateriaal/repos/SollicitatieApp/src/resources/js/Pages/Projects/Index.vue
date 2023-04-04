<template>

    <Head title="Projecten"/>

    <GuestLayout>
        <div class="max-w-6xl mx-6 mt-10 lg:mx-auto">
            <ProjectSearch :projects="projects" :search="search" :sorting="sorting"/>

            <div v-if="projects.data.length > 0"
                 class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
                <ProjectCard v-for="project in projects.data" :key="project.id" :project="project"/>
            </div>

            <div v-else class="w-full mx-auto">
                <h1 class="text-center text-2xl font-bold py-4">Oeps!</h1>
                <p class="text-center text-lg">Wij hebben geen projecten kunnen vinden.</p>
            </div>

            <pagination :links="projects.meta.links" :meta="projects.meta" class="mb-8"/>
        </div>
    </GuestLayout>
</template>

<script>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';
import Pagination from "@/Components/Pagination.vue";
import ProjectCard from "@/Components/Project/ProjectCard.vue";
import ProjectSearch from "@/Components/Project/ProjectSearch.vue";

export default {
    components: {
        ProjectSearch,
        ProjectCard,
        GuestLayout,
        Head,
        Link,
        Pagination,
        useForm,
    },
    props: {
        projects: Object,
        sorting: String,
        search: String,
    },
};
</script>
