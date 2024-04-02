<x-app-layout>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@heroicons/vue@1.0.4/dist/heroicons.min.css" rel="stylesheet">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="flex m-2 p-2">
            <a href="{{ route('admin.reservation.index') }}" class=" px-4 py-2 text-white bg-gray-800 hover:bg-gray-600 rounded-xl">
            Back to Reservations</a>
         </div>
    
         <div class="m-2 p-4 dark:bg-gray-800 rounded-2xl shadow-2xl">
          <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                     <form method="POST" action="{{ route('admin.reservation.store') }}">
                       @csrf
                      <div class="sm:col-span-6">
                        <label for="name" class="block text-md font-bold dark:text-gray-300"> Name </label>
                        <div class="mt-1">
                          <input type="text" id="name" name="name" 
                          class="block w-full appearance-none text-black bg-white border border-gray-400 rounded-md py-2 px-3 
                          text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-500 @enderror" />
                        </div>
                        @error('name')
                        <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                      </div>

                    <div class="sm:col-span-6">
                      <label for="email" class="block text-md font-bold dark:text-gray-300"> Email </label>
                      <div class="mt-1">
                        <input type="text" id="email" name="email" required
                        class="block w-full appearance-none text-black bg-white border border-gray-400 rounded-md py-2 px-3 
                        text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-500 @enderror" />
                      </div>
                      @error('email')
                      <div class="text-sm text-red-500">{{ $message }}</div>
                  @enderror
                    </div>

                    <div class="sm:col-span-6">
                      <label for="tel_number" class="block text-md font-bold dark:text-gray-300"> Phone Number </label>
                      <div class="mt-1">
                          <input type="tel_number" minlength="11" maxlength="11" pattern="^09\d{9}$" id="tel_number" name="tel_number" required
                              class="block w-full appearance-none text-black bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal 
                              'transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('tel_number') border-red-500 @enderror " />
                      </div>
                      @error('tel_number')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                      @enderror
                  </div>

                <div class="sm:col-span-6">
                  <div class="mt-1">
                      <label for="res_date" class="block text-md font-bold dark:text-gray-300"> Reservations Date</label>
                      <span class="text-sm font-italic dark:text-gray-200">Note: Choose the date next day from now
                          & 10:00 AM - 10:00 PM
                      </span>
                      <input type="datetime-local" id="res_date" name="res_date"
                     
                          class="block w-full appearance-none text-black bg-white border border-gray-400 rounded-md py-2 px-3 
                          text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('res_date') border-red-500 @enderror" />
                  </div>
                  @error('res_date')
                      <div class="text-sm text-red-500">{{ $message }}</div>
                  @enderror
              </div>

                <div class="sm:col-span-6 ">
                  <label for="table_id" class="block text-md font-bold dark:text-gray-300"> Table </label>
                  <div class="mt-1">

                    <select id="table_id" name="table_id" class="block w-full appearance-none text-black font-bold bg-white border border-gray-400 rounded-md py-2 px-3 
                    text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 ">                       
                      @foreach ($tables as $table)
                      <option class="text-md font-bold" value="{{ $table ->id }}" >
                        {{ $table ->name }} ( {{ $table -> guest_number }} Guests ) - {{ $table->price }} Php</option>
                    
                      @endforeach
                    </select>
                  @error('table_id')
                  <div class="text-sm text-red-500">{{ $message }}</div>
              @enderror
                </div>

              <div class="sm:col-span-6">
                <label for="guest_number" class="block text-md font-bold dark:text-gray-300"> Guest Number </label>
                <div class="mt-1">
                    <input type="number" min="0" max="3" id="guest_number" name="guest_number" 
                    class="block w-full appearance-none text-black bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal 
                    transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('guest_number') border-red-500 @enderror " />
                </div>
                @error('guest_number')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

                      <div class="sm:col-span-6 ">
                        <label for="location" class="block text-md font-bold dark:text-gray-300"> Location</label>
                        <div class="mt-1">

                          <select id="location" name="location" class="block w-full appearance-none font-bold text-black bg-white border border-gray-400 
                          rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">                       
                            @foreach (App\Enums\TableLocation::cases() as $location)
                            <option class="text-md font-bold" value="{{ $location -> value }}" >{{ $location -> name }}</option>
    
                            @endforeach
                          </select>
                        @error('location')
                        <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                      </div>

                      <div class="sm:col-span-6">
                        <div class="mt-1">
                            <label for="payment_status" class="block text-md font-bold dark:text-gray-300"> Payment Status</label>
                            
                            <input type="text" id="payment_status" name="payment_status"
                           
                                class="block w-full appearance-none text-black bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal 
                                transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('payment_status') border-red-500 @enderror" />
                        </div>
                        @error('payment_status')
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
