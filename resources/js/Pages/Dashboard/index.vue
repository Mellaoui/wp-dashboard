<template>
    <div v-for="user in wp_users" :key="wp_users.id">
        {{ user.user_email }}
    </div>
        
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
    export default {
        components:{
            AppLayout
        },

        props:{
            wp_users: Object,
        }
    }
</script>