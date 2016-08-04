<template>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">{{ user.name }}</div>
                <div class="panel-body">
                    <dl>
                        <dt>Email</dt>
                        <dd>{{ user.email }}</dd>
                        <dt>Roles</dt>
                        <dd>
                            <ul>
                                <li v-for="role in user.roles">{{ role.slug }}</li>
                            </ul>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Activities</div>
                <div class="list-group">
                    <div class="list-group-item">
                        <span class="activity-date text-muted">4 hours ago</span> Activity Name
                        <span class="pull-right label label-primary">activity entity</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                user: {}
            };
        },
        methods: {
            getUser(){
                this.$http.get('/api/v1/user/' + this.$route.params.userId)
                    .then(r => {
                        this.user = r.data;
                    })
                    .catch(e => {
                        console.error(e);
                    });
            }
        },
        ready(){
            this.getUser();
        }
    }
</script>
