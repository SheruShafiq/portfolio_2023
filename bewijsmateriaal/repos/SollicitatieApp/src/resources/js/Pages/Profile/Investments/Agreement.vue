<template>
    <GuestLayout>
        <div class="max-w-6xl mx-4 lg:mx-auto mt-12 space-y-4">
            <h1 class="text-center text-2xl font-bold mb-8">
                Overeenkomst
            </h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam at ex at risus faucibus porttitor. Proin
                luctus
                pellentesque urna, quis interdum dui vestibulum nec. Maecenas cursus convallis magna, eu blandit elit
                scelerisque
                in. In pharetra quam et quam ultricies, vitae dapibus turpis iaculis. Integer vitae velit dolor. Nulla
                rhoncus felis
                sit amet consectetur condimentum. Mauris tristique ullamcorper libero in egestas. Etiam et odio
                ullamcorper,
                faucibus sapien a, malesuada eros. Vestibulum scelerisque felis quis nulla varius, sit amet malesuada
                ligula
                congue.
                Integer ut finibus ante.
            </p>

            <p>
                Cras nec molestie odio. Vivamus sem nibh, ultricies tristique sodales id, ornare vel metus. Fusce
                sodales
                dui a
                pretium varius. Vivamus vel convallis augue. Sed facilisis enim felis, eu consectetur eros placerat ac.
                Aliquam at
                cursus nibh. Donec velit eros, volutpat vitae laoreet non, pulvinar vitae metus. Suspendisse venenatis
                id
                metus sed
                volutpat. Aliquam bibendum id urna ut dapibus. Donec ultricies lorem odio, a imperdiet dui porta ac.
                Fusce
                non
                suscipit augue. Maecenas pretium enim ultrices metus imperdiet, ut tincidunt tortor consequat. Nam massa
                odio,
                sagittis vitae porta id, placerat ut nisl. Aliquam a erat at turpis molestie pulvinar. Aenean blandit
                elit
                vitae
                gravida lobortis.
            </p>

            <p>
                Donec lobortis turpis risus, eu auctor elit faucibus sed. Pellentesque rhoncus tristique faucibus. Etiam
                vel
                sapien
                vel augue dignissim suscipit. Nam tempus urna eu egestas ornare. Morbi quis sapien faucibus, facilisis
                mauris ut,
                consectetur lacus. Duis laoreet nunc dignissim est feugiat volutpat. Donec rutrum lectus eu placerat
                pretium. Ut
                convallis eu risus quis pulvinar. Quisque sed tortor pellentesque, luctus dui vel, elementum ante.
                Curabitur id elit aliquet, tincidunt metus nec, luctus dolor. Nullam interdum odio in magna tincidunt,
                quis
                finibus
                dolor cursus. Nam ut nibh eros. Cras venenatis, lorem eu tincidunt feugiat, metus velit pretium dolor,
                finibus
                pulvinar lorem velit posuere mauris. Integer sed luctus arcu. Donec enim mi, ultricies nec ultrices ut,
                consectetur
                sed lorem. Duis urna neque, tristique eu erat a, varius porta lacus.
            </p>

            <p>
                Suspendisse neque risus, volutpat quis justo blandit, placerat feugiat nisi. Nam egestas aliquet tortor
                a
                laoreet.
                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce
                tempor
                nibh a
                rutrum tempor. Fusce ultricies molestie interdum. Curabitur eleifend commodo nisi et dapibus. Aliquam
                molestie metus
                in lorem vehicula placerat. Proin tincidunt fermentum nisl, non maximus orci ullamcorper non. Nullam sit
                amet nulla
                purus. Aliquam porttitor, massa vitae sagittis iaculis, eros turpis sagittis nisi, id cursus justo leo
                non
                risus.
                Integer dapibus ac magna sed sollicitudin. Duis et justo velit. Curabitur nec pellentesque tellus, nec
                tristique
                augue. Ut ut faucibus mi. Cras feugiat ullamcorper nibh malesuada egestas. Suspendisse vehicula magna ut
                massa
                semper, in consectetur sem aliquet. Nulla facilisi.
            </p>

            <div class="flex justify-center space-x-6 py-10">
                <a class="bg-red-400 hover:bg-red-500 text-white font-bold py-2 px-4 rounded"
                   :href="$page.props.previousUrl">
                    Annuleren
                </a>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="submit">
                    Ik ga akkoord
                </button>
            </div>
        </div>
    </GuestLayout>
</template>

<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import {useForm} from "@inertiajs/inertia-vue3";

export default {
    name: "Agreement",
    components: {GuestLayout},
    props: {
        investment: Object,
    },
    setup(props) {
        const form = useForm();

        function submit() {
            form.post(route('investments.agreement.store', {investment: props.investment}));
        }

        return {
            form,
            submit
        };
    },
}
</script>
