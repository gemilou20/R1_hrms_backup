 <!-- ***** Menu Area Starts ***** -->
 <section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Our Menu</h6>
                    <h2>Our selection of food with quality taste</h2>
                </div>
            </div>
        </div>
    </div>
   
     <div class="menu-item-carousel">
        <div class="col-lg-12">

            

            <div class="mt-4 items-center owl-menu-item owl-carousel ">
                
                @foreach ($menus as $menu)
                <div class="max-w-md mx-2 mb-8 rounded-lg shadow shadow-black transition-transform duration-300 transform hover:scale-110">
                    <img class="w-full h-44 rounded-md  " src="{{ asset($menu->image) }}" alt="Image" />
                    <div class="px-6 py-6 bg-gray-200">
                        <h4 class="mb-2 text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-yellow-600 to-yellow-700">
                            {{ $menu->title }}</h4> 
                            <p class="text-md text-gray-800">{{ $menu->description }}</p>                    
                    </div>
                    <div class="flex items-center justify-between p-2 bg-gray-200">
                        <span class="text-xl font-bold text-green-600">₱{{ $menu->price }}</span>
                    </div>
                </div>
            @endforeach
            
                
            </div>
        </div>
    </div>
</section>

<!-- ***** Menu Area Ends ***** -->
