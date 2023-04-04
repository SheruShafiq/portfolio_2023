<template>
    <div class="my-10 grid grid-cols-6 gap-4">
        <div class="relative mt-1 flex items-center col-span-6 sm:col-span-4">
            <input
                v-model="form.search"
                @input="search"
                type="text" name="search" id="search"
                placeholder="Zoek een project"
                class="block w-full rounded-md border-gray-300 pr-12 shadow-sm focus:border-blue-400 focus:ring-blue-400 sm:text-sm">
            <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6 text-slate-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                </svg>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-2">
            <select id="sort" name="sort"
                    v-model="form.sort"
                    @change="search"
                    class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                <option disabled>Datum</option>
                <option value="newest">Nieuwste eerst</option>
                <option value="oldest">Oudste eerst</option>
                <option disabled>Funding</option>
                <option value="highest">Hoogste eerst</option>
                <option value="lowest">Laagste eerst</option>
            </select>
        </div>
    </div>
</template>

<script>
import {useForm} from "@inertiajs/inertia-vue3";

export default {
    name: "ProjectSearch",
    props: {
        projects: {
            type: Object,
            required: true
        },
        search: {
            required: true
        },
        sorting: {
            required: true
        }
    },
    setup(props) {
        const form = useForm({
            search: props.search || '',
            sort: props.sorting || 'oldest',
        });

        const search = () => {
            form.get(route('projects.index'), {
                preserveState: true,
                onSuccess: (page) => {
                    props.projects = page.props.projects;
                },
            });
        };

        return {
            form,
            search,
        };
    }
}
</script>
