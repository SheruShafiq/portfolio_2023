<template>
    <Head title="Projecten"/>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Projecten
                </h2>
                <button class="text-blue-400 hover:text-blue-500 focus:text-blue-500 md:hidden"
                        @click.prevent="createProject">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </button>
            </div>
        </template>

        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    <button
                        class="overflow-hidden hidden md:block rounded-md m-2 flex  border-dashed border-2 border-gray-300 items-center text-gray-300"
                        type="submit"
                        @click.prevent="createProject"
                    >

                        <span class="block w-full flex flex-wrap justify-center py-14">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-20 h-20">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        <span class="font-bold block w-full">Start een nieuw project</span>
                        </span>
                    </button>
                    <div v-for="project in user.projects"
                         class="overflow-hidden rounded-md shadow-xl m-2 flex flex-col justify-between">
                        <div>
                            <img
                                src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80"
                                class="h-auto w-full" alt="Restaurant"
                            />
                            <h2 class="text-lg font-medium leading-none text-slate-500 mb-4 px-4 py-5">
                                {{ project.name }}
                                <span class="block text-sm text-slate-400">{{ project.location }}</span>
                            </h2>
                        </div>
                        <div>
                            <div class="px-4 py-5">
                                <dl class="flex items-center space-x-2">
                                    <dt>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5"
                                             stroke="currentColor" class="text-slate-500 h-4 w-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"/>
                                        </svg>
                                        <span class="sr-only">investering</span>
                                    </dt>
                                    <dd>
                                        <span>€ {{ project.formatted_crowdfunding_contribution }}</span>
                                    </dd>
                                </dl>
                                <dl class="flex space-x-2 items-center">
                                    <dt>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5"
                                             stroke="currentColor" class="text-slate-500 h-4 w-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z"/>
                                        </svg>
                                        <span class="sr-only">looptijd</span>
                                    </dt>
                                    <dd>
                                        <span>{{ project.duration }} maanden</span>
                                    </dd>
                                </dl>
                                <dl class="flex space-x-2 items-center">
                                    <dt>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5"
                                             stroke="currentColor" class="text-slate-500 h-4 w-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z"/>
                                        </svg>
                                        <span class="sr-only">Rendament</span>
                                    </dt>
                                    <dd>
                                    <span>
                                        {{ project.interest_rate }}% rente
                                    </span>
                                    </dd>
                                </dl>
                                <view-project-button :project-slug="project"/>
                                <div class="flex justify-between items-center">
                                    <button
                                        type="submit"
                                        @click.prevent="editProject(project)"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                                        </svg>
                                    </button>
                                    <span
                                        class="px-2 rounded-full text-sm font-bold block"
                                        :class="statusColor[project.status]"
                                    >
                                        {{ project.translated_status }}
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
import ViewProjectButton from "@/Components/Project/ViewProjectButton.vue";

export default {
    name: "Index",
    components: {
        AuthenticatedLayout,
        Head,
        ViewProjectButton
    },
    props: {
        user: Object,
    },
    data() {
        return {
            statusColor: {
                'funding': 'bg-green-500 text-green-100',
                'completed': 'bg-green-100 text-green-600',
                'cancelled': 'bg-red-500 text-red-100',
                'pending': 'bg-yellow-500 text-yellow-100',
                'repayment': 'bg-blue-500 text-blue-100',
            },
        }
    },
    methods: {
        editProject(project) {
            this.$inertia.get(route('profile.projects.edit', project))

        },
        createProject() {
            this.$inertia.get(route('projects.create'));
        }
    }
}
</script>
