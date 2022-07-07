<script setup>
import DarkButton from '@/Components/Darkbear/Button.vue';
import DarkCheckbox from '@/Components/Darkbear/Checkbox.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';
import FloatLabel from "@/Components/Darkbear/FloatLabel";
import FloatInput from "@/Components/Darkbear/FloatInput";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};

</script>
<script>
export default {
    layout: ""
};
</script>

<template>
    <BreezeGuestLayout>
        <Head title="Авторизация"/>

        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Авторизация
        </h1>

        <BreezeValidationErrors class="mb-4"/>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form class="space-y-4 md:space-y-6" @submit.prevent="submit">

            <div class="relative">
                <FloatInput id="email" v-model="form.email" autocomplete="username" autofocus
                            required type="email"/>
                <FloatLabel for="email">Email</FloatLabel>
            </div>

            <div class="relative">
                <FloatInput id="password" v-model="form.password" autocomplete="current-password"
                            required type="password"/>
                <FloatLabel for="password">Пароль</FloatLabel>
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <DarkCheckbox v-model:checked="form.remember" name="remember" required/>
                    </div>
                    <div class="ml-3 text-sm">
                        <label class="text-gray-500 dark:text-gray-300" for="remember">Запомнить меня</label>
                    </div>
                </div>
                <Link v-if="canResetPassword" :href="route('password.request')"
                      class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">
                    Забыли пароль?
                </Link>
            </div>
            <DarkButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" type="submit">Войти
            </DarkButton>

        </form>
    </BreezeGuestLayout>
</template>
