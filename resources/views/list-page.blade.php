@extends('layouts.app')

@section('content')
<script type="text/x-template" id="modal-template">
      <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-container">

              <div class="modal-header">
                <slot name="header">
                  default header
                </slot>
              </div>

              <div class="modal-body">
                <slot name="body">
                    
                </slot>
              </div>

              <div class="modal-footer">
                <slot name="footer">
                  
                  
                </slot>
              </div>
            </div>
          </div>
        </div>
      </transition>
</script>
<div id="wrapper">
    <sidebar></sidebar>
    <div id="main-wrapper" class="col-md-10 pull-right">
        <div id="main" class="py-4">
          
           <table-component></table-component>
        </div>
    </div>
</div>


  
@endsection
