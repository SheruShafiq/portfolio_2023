<template>
    <Head title="New project"></Head>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Start een nieuw project
            </h2>
        </template>
        <div>
            <div class="md:grid md:grid-cols-3 md:gap-6 mt-4">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Project informatie</h3>
                        <p class="mt-1 text-sm text-gray-600">Deze informatie kan niet meer veranderd worden vanaf de
                            funding fase van dit project.</p>
                    </div>
                </div>
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="project_name" class="block text-sm font-medium text-gray-700">Project
                                        naam</label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input
                                            type="text"
                                            name="project_name"
                                            id="project_name"
                                            class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="Jouw project naam"
                                            v-model="form.name"
                                            @input="form.validate('name')"
                                        />
                                    </div>
                                    <InputError class="mt-2" :message="form.errors.name"/>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="amount" class="block text-sm font-medium text-gray-700">Gevraagd
                                        bedrag</label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <span
                                            class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">€</span>
                                        <input
                                            type="text"
                                            name="amount"
                                            id="amount"
                                            class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="100000"
                                            autocomplete="off"
                                            v-model="form.amount"
                                            @input="form.validate('amount')"
                                            @change="calculateContributions()"
                                        />
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">Graag het bedrag invullen zonder punten en
                                        komma's. Het bedrag moet een honderdtal zijn.</p>
                                    <InputError class="mt-2" :message="form.errors.amount"/>
                                </div>
                            </div>
                            <div
                                v-show="own_contribution > 0 && !form.errors.amount"
                                class="grid grid-cols-3 gap-6"
                            >
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="own_contribution" class="block text-sm font-medium text-gray-700">Eigen
                                        bijdrage</label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <span
                                            class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">€</span>
                                        <input
                                            type="text"
                                            name="own_contribution"
                                            id="own_contribution"
                                            class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            :value="own_contribution"
                                            disabled
                                        />
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">Dit is het bedrag dat u zelf zou moeten
                                        investeren om dit project op te starten.</p>
                                </div>
                            </div>
                            <div
                                v-show="external_contribution > 0 && !form.errors.amount"
                                class="grid grid-cols-3 gap-6"
                            >
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="extern_contribution" class="block text-sm font-medium text-gray-700">Bijgelegd
                                        bedrag</label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <span
                                            class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">€</span>
                                        <input
                                            type="text"
                                            name="extern_contribution"
                                            id="extern_contribution"
                                            class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            :value="external_contribution"
                                            disabled
                                        />
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">Dit is het bedrag dat zal worden bijgelegd
                                        door externe investeerders.</p>
                                </div>
                            </div>
                            <div
                                v-show="crowdfunding_contribution > 0 && !form.errors.amount"
                                class="grid grid-cols-3 gap-6"
                            >
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="crowdfunding_contribution"
                                           class="block text-sm font-medium text-gray-700">Crowdfunding bedrag</label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <span
                                            class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">€</span>
                                        <input
                                            type="text"
                                            name="crowdfunding_contribution"
                                            id="crowdfunding_contribution"
                                            class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            :value="crowdfunding_contribution"
                                            disabled
                                        />
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">Dit is het bedrag dat uiteindelijk gevraagd
                                        zal worden op het crowdfunding platform.</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="interest" class="block text-sm font-medium text-gray-700">Rente</label>
                                    <div class="mt-1 flex">
                                        <div class="col-span-6 sm:col-span-3">
                                            <input
                                                type="text"
                                                name="interest"
                                                id="interest"
                                                class="block flex-1 rounded-none border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                                value="6"
                                                disabled
                                            />
                                        </div>
                                        <span
                                            class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="duration" class="block text-sm font-medium text-gray-700">Duur</label>
                                    <div class="mt-1 flex">
                                        <div class="col-span-6 sm:col-span-3">
                                            <input
                                                type="text"
                                                name="duration"
                                                id="duration"
                                                class="block flex-1 rounded-none border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                                value="60"
                                                disabled
                                            />
                                        </div>
                                        <span
                                            class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">maanden</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:grid md:grid-cols-3 md:gap-6 mt-4">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <p class="mt-1 text-sm text-gray-600">Bankgegevens</p>
                    </div>
                </div>
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="iban" class="block text-sm font-medium text-gray-700">IBAN</label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input
                                            type="text"
                                            name="iban"
                                            id="iban"
                                            class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="NL00RABO0000000000"
                                            v-model="form.iban"
                                            @input="form.validate('iban')"
                                        />
                                    </div>
                                    <InputError class="mt-2" :message="form.errors.iban"/>
                                    <div class="mt-1 flex rounded-md items-center">

                                        <input
                                            type="text"
                                            name="iban_name"
                                            class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="IBAN Tenaamstelling"
                                            v-model="form.iban_name"
                                            @input="form.validate('iban_name')"
                                        />
                                    </div>
                                    <InputError class="mt-2" :message="form.errors.iban_name"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:grid md:grid-cols-3 md:gap-6 mt-4">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <p class="mt-1 text-sm text-gray-600">Documenten.</p>
                    </div>
                </div>
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700">
                                        Business plan
                                    </label>
                                    <div
                                        class=" mt-1 flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                                 stroke="currentColor" viewBox="0 0 24 24"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG</p>
                                        </div>
                                        <input id="dropzone-file" type="file" class="hidden"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:grid md:grid-cols-3 md:gap-6 mt-4">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <p class="mt-1 text-sm text-gray-600">Deze informatie kan in de funding fase worden
                            aangepast.</p>
                    </div>
                </div>
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="location" class="block text-sm font-medium text-gray-700">Project
                                        locatie</label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input
                                            type="text"
                                            name="location"
                                            id="location"
                                            class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="Een mooie locatie"
                                            v-model="form.location"
                                            @input="form.validate('location')"
                                        />
                                    </div>
                                    <InputError class="mt-2" :message="form.errors.location"/>
                                </div>
                            </div>
                            <div class="sm:col-span-6">
                                <label for="about" class="block text-sm font-medium text-gray-700">Alles over jouw
                                    project</label>
                                <div class="mt-1">
                                    <textarea
                                        id="about" name="about" rows="15"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        v-model="form.description"
                                        @input="form.validate('description')"
                                    />

                                </div>
                                <InputError class="mt-2" :message="form.errors.description"/>
                            </div>
                        </div>
                    </div>
                    <button
                        type="submit"
                        @click.prevent="submit"
                        class="my-4 inline-flex py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Opslaan
                    </button>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm} from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import {usePrecognitiveForm} from "laravel-precognition-vue";

export default {
    name: "New",
    components: {
        AuthenticatedLayout,
        Head,
        InputError,
    },
    props: {
        user: Object,
    },
    data() {
        return {
            own_contribution: 0,
            external_contribution: 0,
            crowdfunding_contribution: 0,
        }
    },
    setup(props) {
        const form = usePrecognitiveForm('post', route('projects.store'), useForm(
            {
                name: '',
                description: '',
                amount: '',
                iban: props.user.iban,
                iban_name: props.user.iban_name,
                location: '',
            }));

        return {form}
    },
    methods: {
        submit() {
            this.form.post(route('projects.store'));
        },
        calculateContributions() {
            if (this.form.amount && this.form.amount > 0) {
                this.own_contribution = this.form.amount * 0.1;
                this.external_contribution = this.form.amount * 0.3;
                this.crowdfunding_contribution = this.form.amount * 0.6;
            } else {
                this.own_contribution = 0;
                this.external_contribution = 0;
                this.crowdfunding_contribution = 0;
            }
        }
    }
}
</script>
