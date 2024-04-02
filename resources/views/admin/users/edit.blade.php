<x-app-layout>

    <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@heroicons/vue@1.0.4/dist/heroicons.min.css" rel="stylesheet">

   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="flex m-2 p-2">
            <a href="{{ url('/users') }}" class=" px-4 py-2 text-white bg-gray-800 hover:bg-gray-600 rounded-xl">
            Back to Users </a>
         </div>
        <div class="m-2 p-4 bg-red-150 rounded-2xl shadow-2xl">
            <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                <form method="POST" action="{{ route('admin.users.update', $user -> id) }}" enctype="multipart/form-data">
                  @csrf 
                  @method('PUT')
                  <div class="sm:col-span-6">
                    <label for="name" class="block text-md font-bold text-gray-700"> Name </label>
                    <div class="mt-1">
                      <input type="text" id="name" name="name" value="{{ $user -> name }}"
                      class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5  @error('name') border-red-500 @enderror " />
                    </div>
                    @error('name')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
                  
                  </div>
                        
                  <div class="sm:col-span-6">
                    <label for="email" class="block text-md font-bold text-gray-700"> Email </label>
                    <div class="mt-1">
                        <input type="email" id="email" name="email" value="{{ $user->email }}"
                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5  @error('email') border-red-500 @enderror" />
                    </div>
                    @error('email')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>

                  <div class="mt-2 p-2">
                    <button type="submit" class="px-4 py-2 text-white bg-gray-800 hover:bg-gray-600 rounded-xl"> 
                        Update </button>
                  </div>
                </form>
              </div>
        </div>
        </div>
    </div>
   
</x-app-layout>
