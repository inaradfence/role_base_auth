<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Permissions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <x-message>
           </x-message>

           <table class="w-full">
            <thead class="bg-gray-50">
                <tr class="border-b">
                    <th class="px-4 py-2 text-left">#</th>
                    <th class="px-4 py-2 text-left ">Name</th>
                    <th class="px-4 py-2 text-left ">Created-At</th>
                    <th class="px-4 py-2 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @if ($permissions->isNotEmpty())
              @foreach ($permissions as $permission)
                <tr class="border-b">
                    <td class="px-4 py-2 text-left">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 text-left">{{ $permission->name }}</td>
                    <td class="px-4 py-2 text-left">
                        {{ $permission->created_at->format('d-m-Y') }}
                    </td>
                    <td class="px-4 py-2 text-center">
                        <a href="{{ route('permission.edit', $permission->id) }}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Edit</a>
                        <a href="{{ route('permission.delete', $permission->id) }}" class="bg-red-700 text-sm rounded-md text-white px-3 py-2 hover:bg-red-600">Delete</a>
                    </td>
                </tr>
                  
              @endforeach
                @endif
                
            </tbody >
           </table>
           <div class="my-3">
            {{ $permissions->links() }}

           </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
               
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
