<x-app-layout>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@heroicons/vue@1.0.4/dist/heroicons.min.css" rel="stylesheet">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="flex m-2 p-2">
            <a href="{{ route('admin.menus.index') }}" class=" px-4 py-2 text-white bg-gray-800 hover:bg-gray-600 rounded-xl">
            Back to Menus</a>
         </div>
    
         <div class="m-2 p-4 dark:bg-gray-800 rounded-2xl shadow-2xl">
          <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
              <form method="POST" action="{{ route('admin.menus.update', $menu->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="sm:col-span-6">
                      <label for="name" class="block text-md font-bold dark:text-gray-300"> Name </label>
                      <div class="mt-1">
                          <input type="text" id="name" name="name" value="{{ $menu->name }}"
                          class="block w-full appearance-none text-black bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-500 @enderror" />
                      </div>
                      @error('name')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                      @enderror
                  </div>
      
                  <div class="sm:col-span-6">
                      <label for="image" class="block text-md font-bold dark:text-gray-300"> Image </label>
                      <div>
                        <img class="w-32 h-32" src="{{ Storage::url($menu->image) }}">
                    </div>
                      <div class="mt-1">
                          <input type="file" id="image" name="image" 
                          class="block w-full appearance-none text-black bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('image') border-red-500 @enderror" />
                      </div>
                      @error('image')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                      @enderror
                  </div>
      
                  <div class="sm:col-span-6">
                      <label for="price" class="block text-md font-bold dark:text-gray-300"> Price </label>
                      <div class="mt-1">
                          <input type="number" min="0" max="1000000" step="1" id="price" name="price"
                          value="{{ $menu->price }}" 
                          class="block w-full appearance-none text-black bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('price') border-red-500 @enderror " />
                      </div>
                      @error('price')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                      @enderror
                  </div>
      
                  <div class="mt-2 p-2">
                      <button type="submit" 
                      class="px-4 py-2 text-white bg-green-800 hover:bg-green-600 rounded-xl" > 
                          Save </button>
                  </div>
              </form>
          </div>
      </div>
      </div>
            </div>
       
</x-app-layout>
