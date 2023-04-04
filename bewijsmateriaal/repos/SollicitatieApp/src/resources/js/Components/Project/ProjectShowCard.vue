<template>
    <div
        class="bg-white max-w-2xl rounded-lg shadow-md border overflow-hidden w-full">
        <div class="flex justify-between">
            <div class="px-6 pt-6">
                <dl class="flex items-center space-x-2">
                    <dt>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor"
                             class="text-slate-500 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                        </svg>
                        <span class="sr-only">ondernemer</span>
                    </dt>
                    <dd>
                        <span>{{ project.user }}</span>
                    </dd>
                </dl>
                <dl class="flex items-center space-x-2">
                    <dt>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             class="text-slate-500 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"/>
                        </svg>
                        <span class="sr-only">opgehaald</span>
                    </dt>
                    <dd>
                        <span>{{ project.funding_progress }}% opgehaald</span>
                    </dd>
                </dl>
                <dl class="flex items-center space-x-2">
                    <dt>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor"
                             class="text-slate-500 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z"/>
                        </svg>
                        <span class="sr-only">duur</span>
                    </dt>
                    <dd>
                        <span>{{ project.duration }} maanden</span>
                    </dd>
                </dl>
                <dl class="flex items-center space-x-2">
                    <dt>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24"
                             stroke-width="1.5"
                             stroke="currentColor" class="text-slate-500 h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z"/>
                        </svg>
                        <span class="sr-only">rente</span>
                    </dt>
                    <dd>
                        <span>{{ project.interest_rate }}%</span>
                    </dd>
                </dl>
            </div>
            <div class="hidden md:block p-6" v-if="belongsToUser">
                <a :href="route('profile.projects.edit', project)" target="_blank"
                   class="w-full block rounded-lg p-3 text-center text-white bg-blue-400">Aanpassen</a>
            </div>
            <div class="hidden md:block p-6" v-else>
                <a :href="route('investments.create', project)"
                   class="w-full block rounded-lg p-3 text-center text-white bg-blue-400">Investeren</a>
            </div>
        </div>
        <div>
            <div class="p-6">
                <p>Totale investeering: &euro;{{ project.formatted_total_amount }}
                </p>
                <p>Eigen inbreng: &euro;{{ project.formatted_own_contribution }}
                    (10%)</p>
                <p>Externe inbreng: &euro;{{ project.formatted_external_contribution }}
                    (30%)</p>
                <p>Crowdfunding: &euro;{{
                        project.formatted_crowdfunding_contribution
                    }}
                    (60%)</p>
            </div>
            <div class="space-y-2">
                <h2 class="text-center text-lg md:text-xl font-semibold">
                    <span>&euro;{{ project.total_invested }}</span> van de
                    <span>&euro;{{
                            project.formatted_crowdfunding_contribution
                        }} ({{ project.funding_progress }}%)</span>
                    opgehaald.
                </h2>
                <!-- Progress bar -->
                <div class="w-full bg-gray-200 dark:bg-gray-700">
                    <div
                        class="font-medium text-white font-bold text-center p-1.5 leading-none"
                        :class="{'bg-blue-400': project.funding_progress!== '0'}"
                        :style="'width:' + project.funding_progress + '%'">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ProjectShowCard",
    props: {
        project: {
            type: Object,
            required: true,
        },
        belongsToUser: {
            type: Boolean,
            required: true,
        },
    },
}
</script>
