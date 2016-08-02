let Vue = require('vue');
let Sortable = require('sortablejs');
Vue.use(require('vue-resource'));
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#csrf-token').getAttribute('value');

new Vue({
    el: "#role",
    data: {
        newRoleReadableName: null,
        newRoleName: null,
        roles : [],
        permissions : []
    },
    methods: {
        openNewRoleModal(){
            $('#newRoleModal').modal('show');
        },
        closeNewRoleModal(){
            $('#newRoleModal').modal('hide');
        },
        saveRole(e){
            let data = new FormData(e.srcElement);
            console.log(data);
            this.$http.post('/dashboard/role', data)
                        .then(r => {
                            console.log(r.data);
                            this.roles.push(r.data);
                            this.closeNewRoleModal();
                        })
                        .catch(e => {
                            alert(e);
                        });
        },
        getRoles(){
            this.$http.get('/dashboard/role/get')
                        .then(r => {
                            console.log(r.data);
                            this.roles = r.data;
                            this.$nextTick(function(){
                                createSortableAreas();
                            });

                        })
                        .catch(e => {
                            alert(e);
                        });
        },
        getPermissions(){
            this.$http.get('/dashboard/permission/get')
                        .then(r => {
                            console.log(r.data);
                            this.permissions = r.data;
                        })
                        .catch(e => {
                            alert(e);
                        });
        },
        listen(){
            let vm = this;
            $('#newRoleModal').on('hidden.bs.modal', function(){
                vm.newRoleName = null;
                vm.newRoleReadableName = null;
            });
        }
    },
    ready(){
        this.getRoles();
        this.getPermissions();
        this.listen();
    }
});


function createSortableAreas(){
    const areas = document.getElementsByClassName('permission-sort');
    console.log(areas, areas.length);
    for(var i = 0; i < areas.length; i++){
        console.log(i);
        let item = areas[i];

        if(item.getAttribute('data-main') == 'true'){
            console.log('This is A Main', item);
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
                }
            });
        }
    }
}
