<template>
    <div v-if="links.length > 3" class="mt-16 flex justify-center">
        <div class="flex-wrap hidden lg:flex">
            <template v-for="(link, k) in links" :key="k">
                <div v-if="link.url === null"
                     class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 shadow-md rounded"
                     v-html="link.label"/>
                <inertia-link v-else
                              class="mr-1 mb-1 px-4 py-3 text-sm leading-4 shadow-md rounded"
                              :class="{ 'bg-blue-400 text-white': link.active }" :href="link.url" v-html="link.label"/>
            </template>
        </div>
        <div class="flex justify-between w-full lg:hidden">
            <inertia-link class="mr-1 mb-1 px-4 py-3 text-sm leading-4 shadow-md rounded"
                          :class="{'text-slate-500': links[0].url === null}"
                          :href="links[0].url" v-html="links[0].label"/>
            <div class="mr-1 mb-1 px-4 py-3 text-sm leading-4">{{ meta.current_page }} van de {{ meta.last_page }}</div>
            <inertia-link class="mr-1 mb-1 px-4 py-3 text-sm leading-4 shadow-md rounded"
                          :class="{'text-slate-500': links[links.length - 1].url === null}"
                          :href="links[links.length - 1].url" v-html="links[links.length - 1].label"/>
        </div>
    </div>
</template>

<script setup>
import {InertiaLink} from '@inertiajs/inertia-vue3';
</script>

<script>
export default {
    props: {
        links: Array,
        meta: Object,
    },
}
</script>
