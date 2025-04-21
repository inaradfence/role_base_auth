<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('roles') }}
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
                @if ($roles->isNotEmpty())
              @foreach ($roles as $role)
                <tr class="border-b">
                    <td class="px-4 py-2 text-left">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 text-left">{{ $role->name }}</td>
                    <td class="px-4 py-2 text-left">
                        {{ $role->created_at->format('d-m-Y') }}
                    </td>
                    <td class="px-4 py-2 text-center">
                        <a href="{{ route('roles.edit', $role->id) }}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Edit</a>
                        <a href="{{ route('roles.delete', $role->id) }}" class="bg-red-700 text-sm rounded-md text-white px-3 py-2 hover:bg-red-600">Delete</a>
                    </td>
                </tr>
                  
              @endforeach
                @endif
                
            </tbody >
           </table>
           <div class="my-3">
            {{-- {{ $roles->links() }} --}}

           </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
               
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
