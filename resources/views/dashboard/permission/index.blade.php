@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Permissions</div>

            @if($permissions->count() > 0)
                <ul class="list-group">
                    @foreach($permissions as $permission)
                        <li class="list-group-item">
                            {{ $permission->readable_name }}
                            <span class="text-muted pull-right">{{ $permission->name }}</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="panel-body">
                    <div class="placeholder">
                        There are no Permissions yet.
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
