@extends('layout2/layout')
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
                        <li class="breadcrumb-item active" aria-current="page">Menu</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->
            <!-- ROW-1 OPEN -->
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('postMenuAddUpdate').$encryptId }}" id="menu_form_id">
                            @csrf   
                            <div class="row">
                                <div class="col-md-10 col-lg-8 col-xl-6 mx-auto d-block">
                                    <div class="card card-body pd-20 pd-md-40 border shadow-none">
                                        <div class="form-group">
                                            <label class="form-label">Select Menu Type</label>
                                            <div class="col-mb-12">
                                                <select class="form-control" id="menu_type" name="menu_type">
                                                    <option value="">-- select --</option>
                                                    <option value="0" <?=isset($menuData->menu_type)?($menuData->menu_type=="0")?'selected':"":"";?>>Direct Link</option>
                                                    <option value="1" <?=isset($menuData->menu_type)?($menuData->menu_type=="1")?'selected':"":"";?>>Menu Name</option>
                                                    <option value="2" <?=isset($menuData->menu_type)?($menuData->menu_type=="2")?'selected':"":"";?>>Menu Link</option>
                                                    <option value="3" <?=isset($menuData->menu_type)?($menuData->menu_type=="3")?'selected':"":"";?>>Sub Menu Name</option>
                                                    <option value="4" <?=isset($menuData->menu_type)?($menuData->menu_type=="4")?'selected':"":"";?>>Sub Menu Link</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="menu_name">Menu Name</label>
                                            <input type="text" class="form-control" id="menu_name" name="menu_name" value="{{ isset($menuData)?$menuData->menu_name:"" }}" placeholder="Enter Menu Name">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="menu_url">Menu URL</label>
                                            <input type="text" class="form-control" id="menu_url" name="menu_url" value="{{ isset($menuData)?$menuData->menu_url:"" }}" placeholder="Enter Menu URL">
                                            <input type="hidden" id="menu_url_old" name="menu_url_old" value="{{ isset($menuData)?$menuData->menu_url:"" }}">
                                        </div>
                                        <div class="form-group menu_icon_hs">
                                            <label class="form-label" for="menu_icon">Menu Icon</label>
                                            <input type="text" class="form-control" id="menu_icon" name="menu_icon" value="{{ isset($menuData)?$menuData->menu_icon:"" }}" placeholder="Enter Menu Icon">
                                        </div>
                                        <div class="form-group parent_menu_id_hs">
                                            <label class="form-label" for="parent_menu_id">Select Parent Menu</label>
                                            <select class="form-control" id="parent_menu_id" name="parent_menu_id">
                                                <option value="">-- select --</option>
                                                @if (isset($parenMmenuLists))
                                                    @foreach ($parenMmenuLists as $parenMmenuList)
                                                        <option value="{{ $parenMmenuList->id }}" <?=isset($menuData)?($menuData->parent_menu_id==$parenMmenuList->id)?"selected":"":"";?>>{{ $parenMmenuList->menu_name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="_order">Menu Order</label>
                                            <input type="text" class="form-control" id="_order" name="_order" value="{{ isset($menuData)?$menuData->_order:"" }}" placeholder="Enter Menu Order">
                                        </div>
                                        <div class="form-group">
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
    $("#menu_type").change(function() {
        var menuType = $("#menu_type").val();
        var menu_url_old = $("#menu_url_old").val();
        //parent_menu_id_hs
        $("#menu_url").val(menu_url_old);
        $("#menu_url").removeAttr('readonly');
        $(".menu_icon_hs").hide();
        $(".parent_menu_id_hs").hide();
        if (menuType==1 || menuType==3) {
            $("#menu_url").val("#");
            $("#menu_url").attr('readonly','readonly');
        }
        if (menuType==0 || menuType==1) {
            $(".menu_icon_hs").show();
        }
        if (menuType==3 || menuType==4) {
            $(".parent_menu_id_hs").show();
        }
    });
    $(document).ready(function () {
        $("#menu_type").trigger("change");

        jQuery.validator.addMethod('val_menu_url', function (value, element) {
            if($("#menu_type").val()==0 || $("#menu_type").val()==2 || $("#menu_type").val()==4) {
                if (value=="#") {
                    return false;
                }
                return true;
            }
            return true;
        }, "This field is required, (Don't mension #).");
        $("#menu_form_id").validate({
            rules: {
                "menu_type": {
                    required: true,
                    range: [0, 4],
                },
                "menu_name": {
                    required: true,
                },    
                "menu_url": {
                    required: true,
                    val_menu_url: true,
                },
                "_order": {
                    number: true,
                    min: 0,
                }, 
            },
        });
    });
</script>    
@endpush