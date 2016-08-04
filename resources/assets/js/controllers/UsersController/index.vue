<template>
    <div class="panel panel-default">
        <h1 class="panel-heading">Users</h1>
        <div class="list-group">
            <a v-link="'users/' + user.id" class="list-group-item" v-for="user in users">
                {{ user.name }}
                <span class="pull-right text-muted">
                    {{ user.email }}
                </span>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                users: []
            };
        },
        methods: {
            getUsers(){
                this.$http.get('api/v1/user')
                    .then(r => {
                        this.users = r.data;
                    })
                    .catch(e => {
                        console.error(e);
                    })
            }
        },
        ready(){
            this.getUsers();
        }
    }
</script>
