<template>
    <div
        class="overflow-hidden rounded-lg border bg-white shadow-md"
    >
        <ul role="list" class="divide-y divide-gray-200">
            <li v-if="investments.length > 0"
                v-for="investment in investments"
                class="px-6 py-4 text-center flex justify-between">
                <span>&euro;{{ investment.amount }}</span>
                <span class="text-slate-500">{{ investment.invested_at }}</span>
            </li>
            <li v-else-if="project.is_pending"
                class="px-6 py-4 text-center">
                <span>Publiceer je project om investeringen te ontvangen.</span>
            </li>
            <li v-else class="px-6 py-4 text-center">
                <span>
                    Er zijn nog geen investeringen gedaan, wees de eerste door
                    <a
                        class="text-blue-400 underline"
                        :href="route('investments.create', project.id)"
                    >
                        nu te investeren
                    </a>
                    !
                </span>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "ProjectInvestments",
    props: {
        investments: {
            type: Object,
            required: true
        },
        project: {
            type: Object,
            required: true
        },
    }
}
</script>
