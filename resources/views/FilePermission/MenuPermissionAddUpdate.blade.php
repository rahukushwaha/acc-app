@extends('layout2.layout')
@push('css')
@endpush
@section('content')
    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">
            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Add/Update</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">ADD/UPDATE</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Menu Permission</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->
            <!-- ROW-1 OPEN -->
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('postPermissionAddUpdate').$encryptId }}" id="menu_permission_form_id">
                            @csrf   
                            <div class="row">
                                <div class="col-md-10 col-lg-8 col-xl-6 mx-auto d-block">
                                    <div class="card card-body pd-20 pd-md-40 border shadow-none">
                                        {{-- <input type="hidden" id="menu_id" name="menu_id" value="{{ $menuData->id }}" /> --}}
                                        <div class="form-group">
                                            <label class="form-label">Select Menu Type</label>
                                            <div class="col-mb-12">
                                                @php
                                                    if ($menuData->menu_type==0) {
                                                        echo "Direct Link";
                                                    } else if ($menuData->menu_type==1) {
                                                        echo "Menu Name";
                                                    } else if ($menuData->menu_type==2) {
                                                        echo "Menu Link";
                                                    } else if ($menuData->menu_type==3) {
                                                        echo "Sub Menu Name";
                                                    } else if ($menuData->menu_type==4) {
                                                        echo "Sub Menu Link";
                                                    }
                                                @endphp
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="menu_name">Menu Name</label>
                                            {{ $menuData->menu_name }}
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="menu_url">Menu URL</label>
                                            {{ $menuData->menu_url }}
                                        </div>
                                        <div class="form-group menu_icon_hs">
                                            <label class="form-label" for="menu_icon">Menu Icon</label>
                                            {{ ($menuData->menu_icon=="")?"NA":$menuData->menu_icon }}
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="_order">Menu Order</label>
                                            {{ ($menuData->_order=="")?"NA":$menuData->_order }}
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="menu_icon">Select Roles For Menu Permision</label>
                                            <div class="row">
                                                @isset($roleLists)
                                                    @foreach ($roleLists as $roleList)
                                                        @php $isCkecked = false; @endphp
                                                        @foreach ($menuPermissionLists as $menuPermissionList)
                                                            @if ($menuPermissionList->role_id==$roleList->id)
                                                                @php $isCkecked = true; break; @endphp
                                                            @endif
                                                        @endforeach
                                                        <label class="col-md-4 ckbox">
                                                            <input type="checkbox" id="role_id{{ $roleList->id }}" name="role_id[]" value="{{ $roleList->id }}" {{ ($isCkecked==true)?"checked":"" }}>
                                                            <span>{{ $roleList->role_name }}</span>
                                                        </label>     
                                                    @endforeach
                                                @endisset
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-6">
                                                <button type="submit" class="btn btn-primary btn-block"><?=($encryptId=="")?"SUBMIT":"UPDATE";?></button>
                                            </div>
                                            <div class="col-lg-3"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
@push('js')
<script src="{{ asset('assets\js\jquery.validate.js') }}"></script>
<script>
    $(document).ready(function () {
        $("#menu_permission_form_id").validate({
            rules: {
                "role_id[]": {
                    required: true
                },                
            },
        });
    });
</script>    
@endpush