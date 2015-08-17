@if(Session::has('message'))
           <div class="alert alert-success alert-dismissable">
                      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                      <b>Success</b> {{ Session::get('message') }}
           </div>
@endif
@if(Session::has('error'))
           <div class="alert alert-danger alert-dismissable">
                     <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                     <b>Error</b> {{ Session::get('error') }}
           </div>
@endif