<template>
    <div>
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg sm:text-xl md:text-2xl font-semibold">{{ title }}</h2>
            <a
                :href="route('projects.index')"
                class="bg-blue-500 text-white px-3 py-1 rounded-full hover:bg-blue-700 duration-100"
            >
                bekijk alles
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
            <ProjectCard
                v-for="project in projects"
                :key="project.id"
                :project="project"
            />
        </div>
    </div>
</template>

<script>
import ProjectCard from "@/Components/Project/ProjectCard.vue";

export default {
    name: "ProjectGrid",
    components: {
        ProjectCard,
    },
    props: {
        projects: {
            type: Object,
            required: true
        },
        title: {
            type: String,
            required: true
        }
    }
}
</script>
