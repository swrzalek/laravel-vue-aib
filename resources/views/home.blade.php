@extends('layouts.app')

@section('content')

<div id="wrapper">
    <sidebar></sidebar>
    <div id="main-wrapper" class="col-md-10 pull-right">
        <div id="main">
            <!--<div class="page-header">-->
            <!--<h3>Admin</h3>-->
            <!--</div>-->
            <div class="row">
            
                <div class="modal-body row">
                   <task-form></task-form>
                    <translate-component></translate-component>
                </div>
                      <card-component></card-component>
            </div>
        </div>
    </div>
</div>
                 




  
@endsection
