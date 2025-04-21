<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('roles.update', $role->id) }}" method="POST" class="mx-auto w-1/2" enctype="multipart/form-data">
                    @csrf                      

                   <div class="my-3">
                    <label for="">Name</label>
                    <input type="text" value="{{ $role->name }}" name="name" class="border-2  rounded-md w-full text-black mb-4"placeholder="Enter Name" style="color: black;">

                    @error('name')
                      <p class="text-red-500">{{ $message }}</p>                        
                    @enderror
                   </div>
                   <div class="grid grid-cols-4">
                    @if ($permissions->isNotEmpty())
                    @foreach ($permissions as $permission)
                    <div class="my-3">
                        <input {{ $role->permissions->contains('name', $permission->name) ? 'checked' : '' }} type="checkbox" class="rounded" name="permission[]" value="{{ $permission->name }}" id="permission-{{ $permission->id }}">
                        <label for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                    </div>
                    @endforeach
                    @endif
                   </div>
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600" >Submit</button>
                 
                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
