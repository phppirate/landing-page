<template>
    <div class="panel panel-default">
        <div class="panel-heading">Permissions</div>
        <ul class="list-group">
            <li class="list-group-item" v-for="permission in permissions">
                {{ permission.name }}
                <div class="pull-right">
                    <div class="label label-info" style="font-weight: 200">{{ permission.slug }}</div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                permissions: []
            };
        },
        methods: {
            getPermissions(){
                this.$http.get("/api/v1/permission").then(r => {
                    this.permissions = r.data;
                })
            }
        },
        ready(){
            this.getPermissions();
        }
    }
</script>
