<x-app-layout>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@heroicons/vue@1.0.4/dist/heroicons.min.css" rel="stylesheet">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="flex justify-end m-2 p-2">
            <a href="{{ route('admin.tables.create') }}" class=" px-4 py-2 text-white bg-gray-800 hover:bg-gray-600 rounded-xl">
            Create New Table</a>
         </div>
    

<div class="relative overflow-x-auto">
    <table class="w-full divide-y text-md text-left rtl:text-right text-gray-500 dark:text-gray-800">
        <thead class="text-sm text-black uppercase bg-red-900 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 font-bold ">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 font-bold ">
                    Guest Per-Table
                </th>
                <th scope="col" class="px-6 py-3 font-bold ">
                    Price
                </th>
                <th scope="col" class="px-6 py-3 font-bold ">
                    Status
                </th>
                <th scope="col" class="px-6 py-3 font-bold text-blue-500">
                    Action
                </th>

            </tr>
        </thead>

        <tbody>
            @foreach ($tables as $table)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td
                        class="py-4 px-6 text-md text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $table->name }}
                    </td>

                    <td
                        class="py-4 px-6 text-md text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $table->guest_number}}
                    </td>

                    <td
                        class="py-4 px-6 text-md  text-green-600 whitespace-nowrap">
                        ₱ {{ $table->price }}
                    </td>

                    <td
                    class="py-4 px-6 text-md  text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $table->status }}
                     </td>

                    <td
                        class="py-4 px-6 text-md font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.tables.edit', $table->id) }}"
                                class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg  text-white">Edit</a>
                            <form
                                class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                method="POST"
                                action="{{ route('admin.tables.destroy', $table->id) }}"
                                onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Remove</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
               
      
    </table>
</div>

        </div>
    </div>

</x-app-layout>
