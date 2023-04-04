<template>
    <GuestLayout>
        <img src="https://picsum.photos/800/200" class="object-cover h-48 w-full" alt="">
        <div class="md:py-12">
            <div class="max-w-7xl mx-auto md:px-6 lg:px-8">
                <div class="space-y-4">
                    <FlashSuccessMessage
                        class="rounded-md bg-green-50 p-4"
                        v-if="flash.success"
                        :message="flash.success"
                    />

                    <PreviousPageLink
                        class="hidden md:block"
                        :previous-url="previousUrl"
                    />
                </div>
                <div class="overflow-hidden sm:rounded-lg">
                    <div class="p-6 space-y-2">
                        <div class="space-y-12 lg:flex lg:justify-between">
                            <div class="w-full">
                                <div class="mb-4">
                                    <h1 class="text-3xl font-bold">{{ project.name }}</h1>
                                    <dl class="flex items-center space-x-2 text-slate-400">
                                        <dt>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                                            </svg>
                                            <span class="sr-only">locatie</span>
                                        </dt>
                                        <dd>
                                            <span>{{ project.location }}</span>
                                        </dd>
                                    </dl>
                                </div>
                                <ProjectShowCard
                                    :project="project"
                                    :belongs-to-user="belongsToUser"
                                />
                                <ProjectDescription
                                    :description="project.description"
                                />
                            </div>
                            <ProjectInvestments
                                class="w-full lg:w-72"
                                :investments="project.investments"
                                :project="project"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <MobileProjectNavigation
            :project="project"
            :belongs-to-user="belongsToUser"
            :previous-url="previousUrl"
        />
    </GuestLayout>
</template>

<script>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import FlashSuccessMessage from "@/Components/FlashSuccessMessage.vue";
import PreviousPageLink from "@/Components/Links/PreviousPage.vue";
import ProjectInvestments from "@/Components/Project/ProjectInvestments.vue";
import ProjectEditPageLink from "@/Components/Links/ProjectEditPage.vue";
import ProjectInvestPageLink from "@/Components/Links/ProjectInvestPage.vue";
import ProjectShowCard from "@/Components/Project/ProjectShowCard.vue";
import ProjectDescription from "@/Components/Project/ProjectDescription.vue";
import MobileProjectNavigation from "@/Components/Mobile/ProjectNavigation.vue";


export default {
    name: 'Project',
    components: {
        MobileProjectNavigation,
        ProjectDescription,
        ProjectShowCard,
        ProjectEditPageLink,
        ProjectInvestments,
        PreviousPageLink,
        FlashSuccessMessage,
        GuestLayout,
        ProjectInvestPageLink
    },
    props: {
        project: Object,
        flash: Object,
        previousUrl: String,
        belongsToUser: Boolean
    },
};
</script>
