<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Permission') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('permission.store') }}" method="POST" class="mx-auto w-1/2" enctype="multipart/form-data">
                    @csrf                      

                   <div class="my-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="border-2  rounded-md w-full text-black mb-4"placeholder="Enter your Name" style="color: black;">

                    @error('name')
                      <p class="text-red-500">{{ $message }}</p>                        
                    @enderror
                   </div>
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600" style="background: blue;">Submit</button>
                 
                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
