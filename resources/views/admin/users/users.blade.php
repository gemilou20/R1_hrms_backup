<x-app-layout>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@heroicons/vue@1.0.4/dist/heroicons.min.css" rel="stylesheet">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       

<div class="relative overflow-x-auto">
    <table class="w-full text-md text-left rtl:text-right text-gray-500 dark:text-gray-800">
        <thead class="text-md text-black uppercase bg-red-900 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 font-bold ">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 font-bold ">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 font-bold text-blue-500">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $data)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
        
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $data->name }}
                </td>
        
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $data->email }}
                </td>
        
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="flex space-x-2">
                        <form action="{{ route('delete.user', $data->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4  bg-red-500 hover:bg-red-700 rounded-lg text-white">Remove</button>
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
