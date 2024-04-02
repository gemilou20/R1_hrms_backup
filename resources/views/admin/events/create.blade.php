<x-app-layout>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@heroicons/vue@1.0.4/dist/heroicons.min.css" rel="stylesheet">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="flex m-2 p-2">
            <a href="{{ route('admin.events.index') }}" class=" px-4 py-2 text-white bg-gray-800 hover:bg-gray-600 rounded-xl">
            Back to Events</a>
         </div>
    
         <div class="m-2 p-4 dark:bg-gray-800 rounded-2xl shadow-2xl">
          <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                     <form method="POST" action="{{ route('admin.events.store') }}">
                       @csrf
                      <div class="sm:col-span-6">
                        <label for="name" class="block text-md font-bold dark:text-gray-300"> Name </label>
                        <div class="mt-1">
                          <input type="text" id="name" name="name" class="block w-full appearance-none text-black bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-500 @enderror" />
                        </div>
                        @error('name')
                        <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                      </div>

                    <div class="sm:col-span-6">
                      <label for="email" class="block text-md font-bold dark:text-gray-300"> Email </label>
                      <div class="mt-1">
                        <input type="text" id="email" name="email" required
                        class="block w-full appearance-none text-black bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-500 @enderror" />
                      </div>
                      @error('email')
                      <div class="text-sm text-red-500">{{ $message }}</div>
                  @enderror
                    </div>

                    <div class="sm:col-span-6">
                      <label for="tel_number" class="block text-md font-bold dark:text-gray-300"> Phone Number </label>
                      <div class="mt-1">
                          <input type="tel_number" minlength="11" maxlength="11" pattern="^09\d{9}$" id="tel_number" name="tel_number" required
                              class="block w-full appearance-none text-black bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('tel_number') border-red-500 @enderror " />
                      </div>
                      @error('tel_number')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                      @enderror
                  </div>

                <div class="sm:col-span-6">
                  <label for="res_date" class="block text-md font-bold dark:text-gray-300"> Reservations Date</label>
                  <div class="mt-1">
                    <span class="text-sm font-italic dark:text-gray-200">Note: Choose the date next day from now 
                      & 10:00 AM - 10:00 PM
                    </span>
                      <input type="datetime-local" id="res_date" name="res_date" 
                      class="block w-full appearance-none text-black bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('res_date') border-red-500 @enderror " />
                  </div>
                  @error('res_date')
                      <div class="text-sm text-red-500">{{ $message }}</div>
                  @enderror
              </div>


              <div class="sm:col-span-6">
                <label for="guest_number" class="block text-md font-bold dark:text-gray-300"> Guest Number </label>
                <div class="mt-1">
                  <span class="text-sm dark:text-gray-200">Please enter only between 10 to 45 guests.</span>
                    <input type="number" min="10" max="45" step="1" id="guest_number" name="guest_number" 
                    class="block w-full appearance-none text-black bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('guest_number') border-red-500 @enderror " />
                </div>
                @error('guest_number')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-6 ">
              <label for="event_type" class="block text-md font-bold dark:text-gray-300"> Event Type </label>
              <div class="mt-1">

                <select id="event_type" name="event_type" class="block w-full appearance-none font-bold text-black bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">                       
                  @foreach (App\Enums\EventType::cases() as $event_type)
                  <option class="text-md font-bold" value="{{ $event_type -> value }}" >{{ $event_type -> name }}</option>

                  @endforeach
                </select>
              @error('event_type')
              <div class="text-sm text-red-500">{{ $message }}</div>
          @enderror
            </div>

            
          <div class="sm:col-span-6">
                                              
            <div class="mt-3">
          
              <textarea id="other_request" name="other_request" rows="3"
              class="form-textarea border border-gray-400 dark:bg-white @error('guest_number') border-red-500 @enderror" placeholder="Other Request"></textarea>
            </div>
              </textarea>
              </div>
            @error('other_request')
                <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror
            </div>

            <div class="sm:col-span-6">
              <div class="mt-1">
                  <label for="downpayment" class="block text-md font-bold dark:text-gray-300"> Downpayment</label>
                  
                  <input type="number" id="downpayment" max="5000" min="5000" name="downpayment" value="5000"
                 
                      class="block w-full appearance-none text-black bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('downpayment') border-red-500 @enderror" />
              </div>
              @error('downpayment')
                  <div class="text-sm text-red-500">{{ $message }}</div>
              @enderror
          </div>

            <div class="sm:col-span-6">
              <div class="mt-1">
                  <label for="payment_status" class="block text-md font-bold dark:text-gray-300"> Payment Status</label>
                  
                  <input type="text" id="payment_status" name="payment_status"
                 
                      class="block w-full appearance-none text-black bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('payment_status') border-red-500 @enderror" />
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
