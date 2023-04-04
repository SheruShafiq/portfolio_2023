<template>
    <Head title="Projecten"/>

    <GuestLayout>
        <div class="max-w-6xl mx-6 mt-10 lg:mx-auto">
            <ProjectGrid :projects="newestProjects" title="Meest recente projecten"/>

            <ProjectGrid :projects="highestFundedProjects" title="Populaire projecten"/>
        </div>
    </GuestLayout>
</template>

<script>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
import ProjectGrid from "@/Components/Project/ProjectGrid.vue";


export default {
    components: {
        ProjectGrid,
        GuestLayout,
        Head,
    },
    props: {
        highestFundedProjects: {
            type: Object,
            required: true
        },
        newestProjects: {
            type: Object,
            required: true
        },
    }
};
</script>
