<template>
    <div class="sticky bottom-0 z-50 bg-white p-4 border-t md:hidden">
        <div class="flex items-center justify-between">
            <PreviousPageLink
                :previous-url="previousUrl"
            />
            <ProjectEditPageLink
                :project="project"
                v-if="belongsToUser"
            />
            <ProjectInvestPageLink
                :project="project"
                v-else
            />
        </div>
    </div>
</template>

<script>
import PreviousPageLink from "@/Components/Links/PreviousPage.vue";
import ProjectEditPageLink from "@/Components/Links/ProjectEditPage.vue";
import ProjectInvestPageLink from "@/Components/Links/ProjectInvestPage.vue";

export default {
    name: "ProjectNavigation",
    components: {
        PreviousPageLink,
        ProjectEditPageLink,
        ProjectInvestPageLink
    },
    props: {
        belongsToUser: {
            type: Boolean,
            required: true
        },
        project: {
            type: Object,
            required: true
        },
        previousUrl: {
            type: String,
            required: true
        }
    }
}
</script>
