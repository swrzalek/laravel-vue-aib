@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <sidebar></sidebar>
               <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Dashboard</h1>
                    <task-form></task-form>
                     <card-component></card-component>
               </div>
    </div>
</div>


  
@endsection
