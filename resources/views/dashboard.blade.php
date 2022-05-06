<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Welcome to {{ Auth()->user()->name }} {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="ml-4 px-2">
            @hasanyrole('admin|faculty')
            <div class="flex justify-end p-2">
                <a class="px-7 py-2 bg-green-500 text-white hover:bg-green-700 rounded-md" href="#">Add New</a>
            </div>
            @endhasanyrole
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                      <table class="min-w-full">
                        <thead class=" bg-white dark:bg-gray-700 border-b">
                          <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 dark:text-gray-200 px-6 py-4 text-left">
                              #
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 dark:text-gray-200 px-6 py-4 text-left">
                              Title
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 dark:text-gray-200 px-6 py-4 text-left">
                              Created At
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 dark:text-gray-200 px-6 py-4 text-left">

                            </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Models\Post::all() as $post)
                            <tr class="bg-white dark:bg-slate-600 border-b">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">{{ $post->id }}</td>
                                <td class="text-sm text-gray-900 dark:text-gray-200 font-light px-6 py-4 whitespace-nowrap">
                                  {{ $post->title }}
                                </td>
                                <td class="text-sm text-gray-900 dark:text-gray-200 font-light px-6 py-4 whitespace-nowrap">
                                  {{ $post->created_at }}
                                </td>
                                <td class="text-sm text-right text-gray-900 dark:text-gray-200 font-light px-6 py-4 whitespace-nowrap">
                                   @hasanyrole('admin|assistant')
                                    <a href="#" class="m-2 p-2 bg-orange-400 rounded">Edit</a>
                                    @endhasanyrole
                                    @hasanyrole('admin|faculty')
                                    <a href="#" class="m-2 p-2 bg-blue-400 rounded">Publish</a>
                                    @endhasanyrole
                                    @role('admin')
                                    <a href="#" class="m-2 p-2 bg-red-400 rounded">Delete</a>
                                    @endrole
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</x-app-layout>
