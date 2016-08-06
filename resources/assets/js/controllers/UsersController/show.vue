<template>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ user.name }} 
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#editUser">
                        Edit User
                    </button>
                </div>
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
    
    <!-- Edit Modal -->
    <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit User</h4>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="saveUser" action="/api/v1/user/{{ user.id }}" class="form-horizontal clearfix" method="post">
                        <input type="hidden" name="_method" value="PATCH">
                        <!-- Name Form Field -->
                        <fieldset class="form-group">
                            <label for="name" class="control-label col-md-4">Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" id="name" :value="user.name">
                            </div>
                        </fieldset>

                        <!-- Email Form Field -->
                        <fieldset class="form-group">
                            <label for="email" class="control-label col-md-4">Email</label>
                            <div class="col-md-8">
                                <input type="email" class="form-control" name="email" id="email" :value="user.email">
                            </div>
                        </fieldset>
                        
                        <div class="col-md-8 col-md-offset-4">
                            <h4>Roles</h4>
                            <label v-for="role in roles" class="form-control">
                                <input type="checkbox" name="roles[]" :value="role.id">
                                {{ role.name }}
                            </label>
                        </div>

                        <div class="col-md-8 col-md-offset-4">
                            <br>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                user: {},
                roles: []
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
            },
            getRoles(){
                this.$http.get('/api/v1/role/')
                    .then(r => {
                        this.roles = r.data;
                    })
                    .catch(e => {
                        console.error(e);
                    });
            },
            saveUser(e){
                let form = e.srcElement;
                let data = new FormData(form);
                form.reset();
                $('#editUser').modal('hide');
                this.$http.post('/api/v1/user/' + this.$route.params.userId, data)
                    .then(r => {
                        this.user = r.data;
                    })
                    .catch(e => {
                        console.error(e);
                    })
            }
        },
        ready(){
            this.getUser();
            this.getRoles();
        }
    }
</script>
