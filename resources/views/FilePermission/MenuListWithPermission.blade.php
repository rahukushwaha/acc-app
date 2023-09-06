@extends('layout2.layout')
@push('css')
@endpush
@section('content')
    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div class="mt-4">
                        <!-- <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Menu Permission</li>
                        </ol> -->
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <!-- ROW-1 OPEN -->
                <div class="row">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h3 class="card-title">Menu List</h3>
                            <div class="card-options">
                                <a href="{{ route('getMenuAddUpdate') }}" class="btn btn-primary"><i class="fe fe-plus"></i> ADD</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive export-table">
                                <table id="data-table-id" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Menu Type</th>
                                            <th>Menu Name</th>
                                            <th>Menu URL</th>
                                            <th>Role Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($menuPermissionLists as $key => $menuPermissionList)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>
                                                {{ $menuPermissionList->menu_type }}
                                                @if ($menuPermissionList->parent_menu_name!="")
                                                    <div class="tags">
                                                        <span class="tag tag-indigo">{{ $menuPermissionList->parent_menu_name }}</span>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>{{ $menuPermissionList->menu_name }}</td>
                                            <td>{{ $menuPermissionList->menu_url }}</td>
                                            <td>{{ $menuPermissionList->role_name }}</td>
                                            <td>
                                                <a href="{{ route('getMenuAddUpdate')."/".Crypt::encrypt($menuPermissionList->id) }}" class="btn btn-icon btn-success"><i class="fe fe-edit"></i> Menu</a>
                                                <a href="{{ route('getPermissionAddUpdate')."/".Crypt::encrypt($menuPermissionList->id) }}" class="btn btn-icon btn-success"><i class="fe fe-edit"></i> Permission</a>
                                                <a href="{{ route('getMenuDelete')."/".Crypt::encrypt($menuPermissionList->id) }}" class="btn btn-icon btn-danger"><i class="fe fe-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
@push('js')
<script>
    $(document).ready(function () {
        var table = $('#data-table-id').DataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
            dom: 'Bfrtip',
            buttons: [
                { extend: 'pageLength', className: 'btn btn-dark' },
                { extend: 'excel', className: 'btn btn-dark' },
                { extend: 'csv', className: 'btn btn-dark' },
                {
                    text: "<i class=\"fe fe-plus\"></i> Add Menu",
                    className: "btn btn-primary",
                    action: function ( e, dt, node, config ) {
                        window.location = "{{ route('getMenuAddUpdate') }}";
                    }
                }
            ],
        });
    });
</script>    
@endpush