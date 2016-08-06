<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            Sign Ups
            <span class="pull-right">{{ signUps.length }}</span>
        </div>
        <div class="list-group">
            <a v-for="signUp in signUps" v-link="'sign-ups/' + signUp.id" class="list-group-item">
                {{ signUp.first_name }} {{ signUp.last_name }}
                <span class="pull-right text-muted">{{ signUp.email }}</span>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                signUps: []
            };
        },
        methods: {
            getSignUps(){
                this.$http.get('/api/v1/signup')
                    .then(r => {
                        this.signUps = r.data;
                    })
                    .catch(e => {
                        console.error(e);
                    });
            }
        },
        ready(){
            this.getSignUps();
        }
    }
</script>
