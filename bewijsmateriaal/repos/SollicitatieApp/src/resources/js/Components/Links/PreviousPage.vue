<template>
    <div>
        <a :href="previousUrl">
            <dl class="flex items-center space-x-2 text-blue-500">
                <dt>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75"/>
                    </svg>
                    <span class="sr-only">goback</span>
                </dt>
                <dd>
                    <span>Terug</span>
                </dd>
            </dl>
        </a>
    </div>
</template>

<script>
export default {
    name: "PreviousPage",
    props: {
        previousUrl: {
            type: String,
        }
    }
}
</script>
