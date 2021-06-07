<template>
    <jet-authentication-card>
        <template #logo>
            <svg height="80pt" viewBox="0 -32 512 512" width="80pt" xmlns="http://www.w3.org/2000/svg"><path d="M298.668 106.668c0 58.91-47.758 106.664-106.668 106.664S85.332 165.578 85.332 106.668C85.332 47.758 133.09 0 192 0s106.668 47.758 106.668 106.668zm0 0M282.668 256H101.332C45.461 256 0 301.46 0 357.332V432c0 8.832 7.168 16 16 16h352c8.832 0 16-7.168 16-16v-74.668C384 301.461 338.54 256 282.668 256zm0 0M506.902 180.266l-74.668-69.332c-3.007-2.797-6.933-4.246-10.879-4.246-10.582 0-16.023 9.003-16.023 15.98v48H320c-11.797 0-21.332 9.555-21.332 21.332s9.535 21.332 21.332 21.332h85.332v48c0 8.875 7.211 16 16 16a16.05 16.05 0 0010.902-4.266l74.668-69.332c3.243-3.03 5.098-7.296 5.098-11.734s-1.855-8.703-5.098-11.734zm0 0"/></svg>
        </template>

        <jet-validation-errors class="mb-4" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Password" />
                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <jet-checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <inertia-link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Forgot your password?
                </inertia-link>

                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetCheckbox from '@/Jetstream/Checkbox'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors
        },

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    }
</script>
