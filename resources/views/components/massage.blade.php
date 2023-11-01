@if ( Session::has('success') )
  <div class="p-3 mt-3">
    <div class="alert alert-success">
      {{ Session::get('success') }}
    </div>
  </div>            
@endif

@if ($errors->any())
   <div class="mt-3 p-3">
        <div class="mb-1 alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif


