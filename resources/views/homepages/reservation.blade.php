<!-- ***** Reservation Us Area Starts ***** -->
<section class="section" id="reservation">
  <div class="container">
      <div class="row">
          <div class="col-lg-6 align-self-center">
              <div class="left-text-content">
                  <div class="section-heading">
                      <h6>Contact Us</h6>
                      <h2>Here You Can Contact Us for More Information Or Just Walkin to Our Restaurant</h2>
                  </div>
                
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="phone">
                              <i class="fa fa-phone"></i>
                              <h4>Phone Numbers</h4>
                              <span><a href="#">09216552068</a><br>
                                <a href="#">09385125126</a></span>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="message">
                              <i class="fa fa-envelope"></i>
                              <h4>Emails</h4>
                              <span><a href="#">barandonreyvir@gmail.com</a><br>
                                <a href="#">klenthjameshigayon@gmail.com</a></span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          
                   
      </div>
  </div>
</div>
</div>

</section>


<!-- ***** Reservation Area Ends ***** -->



<section class="section" id="offers">
  
  <div class="container">
      <div class="row">
        

          <div class="col-lg-4 offset-lg-4 text-center">
              <div class="section-heading">
                  <h6>Greetings!</h6>
                  <h2>You Can Make a Reservations Here. </h2>
              </div>
              
          </div>
      </div>

      <div class="row">
          <div class="col-lg-12">
              <div class="row" id="tabs">

                  <div class="col-lg-12">
                      <div class="heading-tabs">
                          <div class="row">
                              <div class="col-lg-6 offset-lg-3">
                                  <ul>
                                    <li><a href='#tabs-1'><img src="assets/images/tab-icon-01.png" alt="">Table Reservation</a></li>
                                    <li><a href='#tabs-2'><img src="assets/images/tab-icon-03.png" alt="">Event Reservation</a></li>
                                  </ul>

                                  <div class="col-lg-12">
                                    <section class='tabs-content'>
                                        <article id='tabs-1'>
                                            @php
                                              $auth = Auth::user();
                                            @endphp
                                            <div class="contact-form">
                                              <form method="GET" action="{{ url('https://r3-billing.anaa-hrms.com/table-reservation-payments/'.$auth->id) }}">
                                                @csrf
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="sm:col-span-6">
                                                  
                                                  <div class="mt-1">
                                                    <input type="text" id="name" name="name" placeholder="Name" value="{{ Auth::user()->name }}"
                                                    class="block w-full appearance-none text-black bg-white border border-gray-700 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-500 @enderror" />
                                                  </div>
                                                  @error('name')
                                                  <div class="text-sm text-red-500">{{ $message }}</div>
                                              @enderror
                                                </div>
                          
                                              <div class="sm:col-span-6">
                                                
                                                <div class="mt-1">
                                                  <input type="text" id="email" name="email" placeholder="Email" value="{{ Auth::user()->email }}"
                                                  class="block w-full appearance-none text-black bg-white border border-gray-700 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-500 @enderror" />
                                                </div>
                                                @error('email')
                                                <div class="text-sm text-red-500">{{ $message }}</div>
                                            @enderror
                                              </div>
                          
                                            <div class="sm:col-span-6">
                                              
                                              <div class="sm:col-span-6">
                                               
                                                <div class="mt-1">
                                                    <input type="numeric" minlength="11" maxlength="11" pattern="^09\d{9}$" id="tel_number" 
                                                    name="tel_number" required placeholder="Phone Number"
                                                        class="block w-full appearance-none text-black bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('tel_number') border-red-500 @enderror " />
                                                </div>
                                                @error('tel_number')
                                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                                @enderror
                                            </div>
                          
                                          <div class="sm:col-span-6">
                                            <label for="res_date" class="block text-sm  dark:text-gray-300"> Reservations Date</label>
                                            <div class="mt-1">
                                                <span class="text-sm font-italic">Please choose the time between 10:00 AM - 10:00 PM.</span>
                                                <input type="datetime-local" id="res_date" name="res_date"
                                                       min="{{ $min_date->format('Y-m-d\TH:i:s') }}"
                                                       max="{{ $max_date->format('Y-m-d\TH:i:s') }}"
                                                       class="block w-full appearance-none text-black bg-white border border-gray-700 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('res_date') border-red-500 @enderror" />
                                            </div>
                                            @error('res_date')
                                            <div class="text-sm text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                          
                                          <div class="sm:col-span-6 ">
                                            <label for="table_id" class="block text-sm  dark:text-gray-300"> Tables </label>
                                            <div class="mt-1">
                          
                                              <select id="table_id" name="table_id" class="block w-full appearance-none text-black font-bold bg-white border border-gray-700 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 ">                       
                                                @foreach ($tables as $table)
                                                <option class="text-sm font-bold" value=" {{ $table ->id }}" >
                                                  {{ $table ->name }} ( {{ $table -> guest_number }} Guests ) - {{ $table->price }} Php</option>
                                              
                                                @endforeach
                                              </select>
                                            @error('table_id')
                                            <div class="text-sm text-red-500">{{ $message }}</div>
                                        @enderror
                                          </div>
                          
                                        <div class="sm:col-span-6">
                                  
                                          <div class="mt-1">
                                              <input type="number" min="0" max="3" step="1" id="guest_number" name="guest_number" placeholder="Guest Number"
                                              class="block w-full appearance-none text-black bg-white border border-gray-700 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('guest_number') border-red-500 @enderror " />
                                          </div>
                                          @error('guest_number')
                                              <div class="text-sm text-red-500">{{ $message }}</div>
                                          @enderror
                                      </div>
                          
                                                <div class="sm:col-span-6 ">
                                                  <label for="location" class="block text-sm  dark:text-gray-300"> Location</label>
                                                  <div class="mt-1">
                          
                                                    <select id="location" name="location" class="block w-full appearance-none font-bold text-black bg-white border border-gray-700 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">                       
                                                      @foreach (App\Enums\TableLocation::cases() as $location)
                                                      <option class="text-sm font-bold" value="{{ $location -> value }}" >{{ $location -> name }}</option>
                              
                                                      @endforeach
                                                    </select>
                                                  @error('location')
                                                  <div class="text-sm text-red-500">{{ $message }}</div>
                                              @enderror
                                                </div>
                          
                                                <div class="mt-2 p-2">
                                                  <button type="submit" 
                                                  class="px-4 py-2 text-lg text-white  hover:bg-red-600 rounded-xl" > 
                                                      Make A Reservation </button>
                                              </div>
                                                </form>
                                                
                                            </div>
                                        </article>  

                                       

                                              <article id='tabs-2'>
                    
                                                  <div class="contact-form">
                                                    <form method="GET" action="{{ url('https://r3-billing.anaa-hrms.com/event-reservation-payments/'.$auth->id) }}">
                                                      @csrf
                                                          
                                                      <div class="sm:col-span-6">
                                                     
                                                        <div class="mt-1">
                                                          <input type="text" id="name" name="name" placeholder="Name" value="{{ Auth::user()->name }}"
                                                          class="block w-full appearance-none text-black bg-white border border-gray-700 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-500 @enderror" />
                                                        </div>
                                                        @error('name')
                                                        <div class="text-sm text-red-500">{{ $message }}</div>
                                                    @enderror
                                                      </div>
                                
                                                    <div class="sm:col-span-6">
                                                      
                                                      <div class="mt-1">
                                                        <input type="text" id="email" readonly name="email" placeholder="Email" value="{{ Auth::user()->email }}"
                                                        class="block w-full appearance-none text-black bg-white border border-gray-700 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-500 @enderror" />
                                                      </div>
                                                      @error('email')
                                                      <div class="text-sm text-red-500">{{ $message }}</div>
                                                  @enderror
                                                    </div>
                                
                                                  <div class="sm:col-span-6">
                                                   
                                                    <div class="mt-1">
                                                      <input type="numeric" minlength="11" maxlength="11" pattern="^09\d{9}$" id="tel_number" 
                                                      name="tel_number" required placeholder="Phone Number"
                                                          class="block w-full appearance-none text-black bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('tel_number') border-red-500 @enderror " />
                                                  </div>
                                                    @error('tel_number')
                                                        <div class="text-sm text-red-500">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                
                                                <div class="sm:col-span-6">
                                                  <label for="res_date" class="block text-sm  dark:text-gray-300"> Reservations Date</label>
                                                  <div class="mt-1">
                                                      <span class="text-sm font-italic">Please choose the time between 10:00 AM - 10:00 PM.</span>
                                                      <input type="datetime-local" id="res_date" name="res_date"
                                                       min="{{ $min_date->format('Y-m-d\TH:i:s') }}"
                                                       max="{{ $max_date->format('Y-m-d\TH:i:s') }}"
                                                       class="block w-full appearance-none text-black bg-white border border-gray-700 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('res_date') border-red-500 @enderror" />
                                                  </div>
                                                  @error('res_date')
                                                      <div class="text-sm text-red-500">{{ $message }}</div>
                                                  @enderror
                                              </div>
                                                
                                
                                              <div class="sm:col-span-6">
                                                <div class="mt-1">
                                                  <span class="text-sm font-italic">Please enter between 10 to 45 guests.</span>
                                                  <input type="number" min="10" max="45" step="1" id="guest_number" name="guest_number" placeholder="Guest Number" required
                                                      class="block w-full appearance-none text-black bg-white border border-gray-700 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('guest_number') border-red-500 @enderror">
                                                  
                                                </div>
                                                @error('guest_number')
                                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="sm:col-span-6 ">
                                              <label for="event_type" class="block text-sm  dark:text-gray-300"> Event Type </label>
                                              <div class="mt-1">
                                
                                                <select id="event_type" name="event_type" class="block w-full appearance-none font-bold text-black bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('event_type') border-red-500 @enderror">                       
                                                  @foreach (App\Enums\EventType::cases() as $event_type)
                                                  <option class="text-md font-bold" value="{{ $event_type -> value }}" >{{ $event_type -> name }}</option>
                                
                                                  @endforeach
                                                </select>
                                              @error('event_type')
                                              <div class="text-sm text-red-500">{{ $message }}</div>
                                          @enderror
                                            </div>

                                            
                                            
                                           
                                            

                                            <div class="sm:col-span-6">
                                              <div class="mt-1">
                                                <textarea id="other_request" name="other_request" rows="3"
                                                class="form-textarea @error('guest_number') border-red-500 @enderror" placeholder="Other Request"></textarea>
                                              </div>
                                                </textarea>
                                                </div>
                                              @error('other_request')
                                                  <div class="text-sm text-red-500">{{ $message }}</div>
                                              @enderror
                                          </div>

                                          <div class="sm:col-span-6">
                                            <div class="mt-1">
                                              <span class="text-sm font-italic">Note: You must pay ₱5000 downpayment before make a reservation</span>
                                              <input type="number" readonly  step="1" id="Downpayment" name="Downpayment" placeholder="Downpayment" value="5000"
                                                  class="block w-full appearance-none text-black bg-white border border-gray-700 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('Downpayment') border-red-500 @enderror">
                                              
                                            </div>
                                            @error('Downpayment')
                                                <div class="text-sm text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>

                                          
                                
                                                      <div class="mt-2 p-2">
                                                        <button type="submit" 
                                                        class="px-4 py-2 text-lg text-white  hover:bg-red-600 rounded-xl" > 
                                                            Make A Reservation </button>
                                                    </div>
                                                    
                                                      </form>
                                                      
                                                  </div>

                                                 
                                              </article>  

                                            
                                             
                                              
                                    </section>

                                    
                                </div>
              

                              </div>
                          </div>
                      </div>
                  </div>

                
                  </div>
              </div>
          </div>

      </div>
  </div>

  

  
</section>



