<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register"/>

        <form @submit.prevent="submit"
              class="max-w-lg mx-2 mt-12 p-6 sm:mt-48 sm:mx-auto sm:shadow-md sm:rounded-lg sm:border">
            <div>
                <InputLabel for="name" value="Volledige naam"/>
                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus
                           autocomplete="name"/>
                <InputError class="mt-2" :message="form.errors.name"/>
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email"/>
                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                           autocomplete="username"/>
                <InputError class="mt-2" :message="form.errors.email"/>
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Wachtwoord"/>
                <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                           autocomplete="new-password"/>
                <InputError class="mt-2" :message="form.errors.password"/>
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Herhaal wachtwoord"/>
                <TextInput id="password_confirmation" type="password" class="mt-1 block w-full"
                           v-model="form.password_confirmation" required autocomplete="new-password"/>
                <InputError class="mt-2" :message="form.errors.password_confirmation"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Heb je al een account?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Registreren
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
