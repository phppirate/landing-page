@extends('layouts.admin')

@section('content')
<input type="hidden" id="csrf-token" value="{{ csrf_token() }}">
<div class="row" id="role">
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                Roles
                <a href="/dashboard/role/create" @click.prevent="openNewRoleModal()" class="pull-right bubble-hover bubble-danger">
                    <i class="ti ti-plus"></i>
                </a>
            </div>

            @if($roles->count() > 0)
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4" v-for="role in roles">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    @{{ role.readable_name }}
                                    <div class="pull-right">
                                        <span class="edit-btns parent-hover expand">
                                            <a href="#" class="bubble-hover"><i class="ti ti-pencil"></i></a>
                                            <a href="#" class="bubble-hover"><i class="ti ti-trash"></i></a>
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="list-group permission-sort" style="min-height: 20px"></div>

                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="panel-body">
                    <div class="placeholder">
                        There are no Roles yet.
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">Permissions</div>
            <div class="list-group permission-sort" data-main="true">
                <div class="list-group-item" :data-id="permission.id" v-for="permission in permissions">
                    @{{ permission.readable_name }}
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
                        <!-- Readable Name Form Field -->
                        <fieldset class="form-group">
                            <label for="readable_name" class="control-label">Readable Name</label>
                            <input type="text" v-model="newRoleReadableName" class="form-control" name="readable_name" id="readable_name">
                        </fieldset>

                        <!-- Name Form Field -->
                        <fieldset class="form-group">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" v-model="newRoleName" class="form-control" name="name" id="name">
                        </fieldset>
                        
                        <button type="submit" class="btn btn-success btn-block">Create</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="/js/role.js"></script>
@stop
