<template>
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Roles
                    <a href="#" @click.prevent="openNewRoleModal()" class="pull-right bubble-hover bubble-danger">
                        <i class="ti ti-plus"></i>
                    </a>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4 col-xs-6" v-for="role in roles">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    {{ role.name }}
                                    
                                    <div class="pull-right">
                                        <span class="edit-btns parent-hover expand">
                                            <a href="#" class="bubble-hover"><i class="ti ti-pencil"></i></a>
                                            <a href="#" class="bubble-hover"><i class="ti ti-trash"></i></a>
                                        </span>
                                    </div>
                                </div>
                                <div class="list-group permission-sort" :data-id="role.id" style="min-height: 20px">
                                    <div class="list-group-item" v-for="permission in role.permissions" :data-id="permission.id">
                                        {{ permission.name }}
                                        <a href="#" @click.prevent="detachPermission(permission, role)" class="btn btn-xs btn-link pull-right"><i class="ti-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Permissions</div>
                <div class="list-group permission-sort" data-main="true">
                    <div class="list-group-item" :data-id="permission.id" v-for="permission in permissions">
                        {{ permission.name }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- New Role Modal Modal -->
    <div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create a Role</h4>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="saveRole" id="newRoleForm" method="post">
                        <!-- Name Form Field -->
                        <fieldset class="form-group">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" v-model="newRoleReadableName" class="form-control" name="name" id="name">
                        </fieldset>
                        
                        <button type="submit" class="btn btn-success btn-block">Create</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    let Sortable = require('sortablejs');
    export default {
        data(){
            return {
                newRoleReadableName: null,
                roles : [],
                permissions : []
            };
        },
        methods: {
            openNewRoleModal(){
                $('#newRoleModal').modal('show');
            },
            closeNewRoleModal(){
                $('#newRoleModal').modal('hide');
            },
            getRoles(){
                this.$http.get('/api/v1/role').then(r => {
                    this.roles = r.data;
                    this.$nextTick(function(){
                        this.createSortableAreas();
                    });
                });
            },
            getPermissions(){
                this.$http.get('/api/v1/permission').then(r => {
                    this.permissions = r.data;
                    this.$nextTick(function(){
                        this.createSortableAreas();
                    });
                });
            },
            detachPermission(permission, role){
                this.$http.delete('/api/v1/role/' + role.id + '/permission', { permission: permission.id })
                    .then(r => {
                        role.permissions.$remove(permission);
                        toastr.success('Permission detached.');
                    })
                    .catch(e => {
                        console.log(e.statusText, e.request.url);
                        toastr.error(e.statusText, e.request.url);
                        // alert(e);
                    });
            },
            saveRole(e){
                let data = new FormData(e.srcElement);
                this.$http.post('/api/v1/role', data)
                    .then(r => {
                        this.roles.push(r.data);
                        this.closeNewRoleModal();
                        this.$nextTick(function(){
                            this.createSortableAreas();
                        });
                    })
                    .catch(e => {
                        console.log(e.statusText, e.request.url);
                        toastr.error(e.statusText, e.request.url);
                        // alert(e);
                    });
            },
            listen(){
                let vm = this;
                $('#newRoleModal').on('hidden.bs.modal', function(){
                    vm.newRoleReadableName = null;
                });
            },
            createSortableAreas(){
                let vm = this;
                const areas = document.getElementsByClassName('permission-sort');
                for(var i = 0; i < areas.length; i++){
                    let item = areas[i];

                    if(item.getAttribute('data-main') == 'true'){
                        let sortable = new Sortable(item, {
                            animation: 150,
                            sort: false,
                            id: "data-id",
                            group: {
                                name: 'permissions',
                                pull: 'clone',
                                put: false
                            }
                        });
                    } else{
                        let sortable = new Sortable(item, {
                            animation: 150,
                            sort: false,
                            chosenClass: "bg-danger",
                            group: {
                                name: 'permissions',
                                pull: false,
                            },
                            onAdd(e){
                                let item = e.item;
                                let permission = getItemById(vm.permissions, item.getAttribute('data-id'));
                                let role = getItemById(vm.roles, e.to.getAttribute('data-id'));
                                console.log('you drop me', permission, role);
                                vm.$http.patch('/api/v1/role/' + role.id + '/attach-permission', { permission: permission.id })
                                    .then(r => {
                                        toastr.success('Role Updates');

                                        vm.$nextTick(function(){
                                            item.remove();
                                            // role.permissions = [];
                                            role.permissions = r.data;
                                        });
                                    })
                                    .catch(e => {
                                        toastr.error(e.statusText, e.request.url);
                                    });
                            }
                        });
                        console.log(sortable);
                    }
                }
            }
        },
        ready(){
            this.getRoles();
            this.getPermissions();
            this.listen();
        }
    }

    function getItemById(object, id){
        for(let item of object){
            if (item.id == id){
                return item;
            }
        }
        return false;
    }
</script>
