@if (Session::has('success'))
<div class="bg-green-500 text-white p-4 rounded-md mb-4">
    {{ Session::get('success') }}
</div> 
@endif
@if (Session::has('error'))
<div class="bg-green-500 text-white p-4 rounded-md mb-4">
    {{ Session::get('error') }}
</div> 
@endif