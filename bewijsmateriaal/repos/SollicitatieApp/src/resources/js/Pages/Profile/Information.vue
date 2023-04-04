<template>
    <Head title="Profiel"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Profiel van {{ $page.props.auth.user.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div v-if="$page.props.flash.message"
                     class="bg-green-500 text-white py-2 px-4 pr-0 rounded font-bold mb-4 shadow-lg">
                    {{ $page.props.flash.message }}
                </div>
                <div v-if="form.hasErrors">
                    <div class="bg-red-500 text-white py-2 px-4 pr-0 rounded font-bold mb-4 shadow-lg">
                        <ul>
                            <li v-for="error in form.errors" :key="error">
                                {{ error }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form class="space-y-8 divide-y divide-gray-200">
                            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                                <div class="space-y-6 pt-8 sm:space-y-5 sm:pt-10">
                                    <div>
                                        <h3 class="text-lg font-medium leading-6 text-gray-900">Persoonlijke
                                            Informatie</h3>
                                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Gebruik een permanent
                                            E-mailadres waarop je mail wilt ontvangen.</p>
                                    </div>
                                    <div class="space-y-6 sm:space-y-5">
                                        <div
                                            class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="name"
                                                   class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Naam</label>
                                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                                <input
                                                    type="text"
                                                    name="name"
                                                    id="name"
                                                    autocomplete
                                                    class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:max-w-xs sm:text-sm"
                                                    v-model="form.name"
                                                />
                                            </div>
                                        </div>

                                        <div
                                            class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="email"
                                                   class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">E-mailadres</label>
                                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                                <input
                                                    type="email"
                                                    name="email"
                                                    id="email"
                                                    autocomplete="email"
                                                    class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                                    v-model="form.email"
                                                />
                                            </div>
                                        </div>

                                        <div
                                            class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="iban"
                                                   class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">IBAN</label>
                                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                                <input
                                                    type="text"
                                                    name="iban"
                                                    id="iban"
                                                    class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                                    v-model="form.iban"
                                                />
                                            </div>
                                        </div>

                                        <div
                                            class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="iban_name"
                                                   class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">IBAN
                                                Tenaamstelling</label>
                                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                                <input
                                                    type="text"
                                                    name="iban_name"
                                                    id="iban_name"
                                                    autocomplete
                                                    class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:max-w-xs sm:text-sm"
                                                    v-model="form.iban_name"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-5">
                                <div class="flex justify-end">
                                    <button
                                        @click.prevent="saveChanges"
                                        type="submit"
                                        name="submit"
                                        class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-blue-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                    >
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
import {useForm} from "@inertiajs/inertia-vue3";


export default {
    name: "Information",
    components: {
        AuthenticatedLayout,
        Head,
    },
    props: {
        user: Object,
    },
    setup(props) {
        let values = props.user;

        const form = useForm(
            values,
        );

        return {form}
    },
    methods: {
        saveChanges() {
            this.form.post(route('profile.update'), {
                preserveScroll: true,
            });
        }
    }
}
</script>
