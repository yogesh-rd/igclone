<template>
    <div>
        <span class="pl-3"><button class="btn btn-light btn-outline-dark" @click="followUser" v-text="buttonText"></button></span>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'follows'],
        mounted() {
            console.log('Component mounted.')
        },

        data: function () {
            return {
                status: this.follows,
            }
        },

        methods : {
            followUser() {
                axios.post('/follow/' + this.userId).then(response => {
                    this.status = !this.status;
                }).catch(errors => {
                   if (errors.response.status == 401) {
                       window.location = "/login";
                   }
                });
            }
        },

        computed: {
            buttonText() {
                return this.status ? 'Unfollow' : 'Follow'
            }
        }
    }
</script>
