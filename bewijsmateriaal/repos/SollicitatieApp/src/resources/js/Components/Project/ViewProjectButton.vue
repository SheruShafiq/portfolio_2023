<template>
    <div class="pt-4 mb-4">
        <a :href="route('projects.show', projectSlug)"
           class="w-full block rounded py-2 text-center text-white bg-blue-400 hover:bg-blue-500 duration-100"
        >
            Bekijken
        </a>
    </div>
</template>

<script>
export default {
    name: "ViewProjectButton",
    props: {
        projectSlug: {
            type: String,
            required: true
        }
    }
}
</script>
