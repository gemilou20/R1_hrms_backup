<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@heroicons/vue@1.0.4/dist/heroicons.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/images/LOGO2.png')}}" type="image/png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>My Reservations</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
    

    <script src="/assets/js/perfect-scrollbar.min.js"></script>
    <script defer src="/assets/js/popper.min.js"></script>
    <script defer src="/assets/js/tippy-bundle.umd.min.js"></script>
    <script defer src="/assets/js/sweetalert.min.js"></script>
</head>
<body>
    <!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky shadow-md">
        
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/home" class="logo">
                        <img class="w-40 ml-[5px] flex-none" src="{{ URL('assets/images/ANAA33.png') }}" alt="image" />
                        
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="/home" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="/home">About</a></li>
                        <!-- 
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                        <li class="scroll-to-section"><a href="/home">Menu</a></li>
                        <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                        <li class="scroll-to-section"><a href="/home">Contact Us</a></li>
                        <div class="hs-dropdown relative inline-flex">
                            <button id="hs-dropdown-default" type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex items-center gap-x-2 text-xs font-semibold rounded-full border border-orange-900 bg-gray-100 text-black shadow-md hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-orange-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-orange-700">
                                <img class="rounded-md w-3 h-3 object-cover"
                                src="{{ asset('assets/images/LOGO2.png') }}" alt="image" />
                                {{ Auth::user()->name }}
                                <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                            </button>
                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full" aria-labelledby="hs-dropdown-default">
                               
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm font-semibold text-black hover:bg-gray-200 focus:outline-none focus:bg-gray-200 dark:text-black dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700" href="{{ url('my-reservations') }}">
                                        My Reservations
                                    </a>
                                    @if(Auth::user()->role == 'Admin')
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm font-semibold text-black hover:bg-gray-200 focus:outline-none focus:bg-gray-200 dark:text-black dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700" href="{{ url('admin/dashboard') }}">
                                        Dashboard
                                    </a>
                                    @endif
                               
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="font-semibold flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-red-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700">
                                            Logout
                                        </x-dropdown-link>
                                    </form>
                                
                            </div>
                        </div>
                        <a class="menu-trigger">
                            <div @click="isOpen = !isOpen" class="flex md:hidden">
                                <button type="button" class="text-gray-800 hover:text-gray-800 focus:outline-none focus:text-gray-800" aria-label="toggle menu">
                                    <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                                        <path fill-rule="evenodd" d="M3 5h18a1 1 0 0 1 0 2H3a1 1 0 0 1 0-2zm0 6h18a1 1 0 0 1 0 2H3a1 1 0 0 1 0-2zm0 6h18a1 1 0 0 1 0 2H3a1 1 0 0 1 0-2z"></path>
                                    </svg>
                                </button>
                            </div>
                        </a>
                        
                        
                    </ul>     
                    
                    <!-- ***** Menu End ***** -->
                </nav>
                
            </div>
        </div>
    </div>
    
    @include('sweetalert::alert')
    <main class="m-2 p-4 ">
        <div>
            @if (session() -> has('danger'))
    <div id="toast" class="bg-red-100 border-l-4 border-red-600 text-red-700 p-4" role="alert">
        <p class="font-bold">Danger Alert! </p> {{ session() -> get('danger') }}
      </div>  
    @endif

    @if (session() -> has('success'))
    <div id="toast" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
        <p class="font-bold">Success Alert! </p> {{ session() -> get('success') }}
      </div>                
    @endif

    @if (session() -> has('warning'))
    <div id="toast" class="bg-orange-100 border-l-4 border-orange-400 text-orange-700 p-4" role="alert">
        <p class="font-bold">Warning Alert! </p> {{ session() -> get('warning') }}
      </div>  
    @endif
          
    
        </div>
</header>

<!-- ***** Header Area End ***** -->

    <div class=" flex items-center justify-center h-[90vh]">
        <div id="toast-bottom-right" class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-900 bg-gray-300 divide-x rtl:divide-x-reverse divide-gray-200 rounded-xl shadow-xl right-5 bottom-12 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
            <p class="text-orange-600 font-bold">Warning!:<div class="text-sm font-italic font-semibold">After 8 hours you cannot cancel your reservations.</p></div>
        </div>
      
        
        @if($reservation)
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <div class="mt-[10vh]"> 
                            <h1 class="text-center text-orange-700 font-extrabold">Table Reservation</h1>
                        </div>
                        
                        <table class="min-w-full divide-y divide-gray-400 dark:divide-gray-700 mt-4">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start text-sm font-medium text-gray-700 uppercase">Name</th>
                                    <th scope="col" class="px-6 py-3 text-start text-sm font-medium text-gray-700 uppercase">Email</th>
                                    <th scope="col" class="px-6 py-3 text-start text-sm font-medium text-gray-700 uppercase">Phone Number</th>
                                    <th scope="col" class="px-6 py-3 text-start text-sm font-medium text-gray-700 uppercase">Reserved Date</th>
                                    <th scope="col" class="px-6 py-3 text-start text-sm font-medium text-gray-700 uppercase">Table</th>
                                    <th scope="col" class="px-6 py-3 text-start text-sm font-medium text-gray-700 uppercase">Guest Number</th>
                                    <th scope="col" class="px-6 py-3 text-start text-sm font-medium text-gray-700 uppercase">Location</th>
                                    <th scope="col" class="px-6 py-3 text-start text-sm font-medium text-gray-700 uppercase">Payment Status</th>
                                    <th scope="col" class="px-6 py-3 text-end text-sm font-medium text-gray-700 uppercase">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($reservation as $reserve)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $reserve->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $reserve->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $reserve->tel_number }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $reserve->res_date }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $reserve->table_id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $reserve->guest_number }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $reserve->location}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            @if($reserve->payment_status == 'Paid')
                                                <span class="badge bg-success text-md w-14">{{ $reserve->payment_status }}</span>
                                                @else
                                                <span class="badge bg-danger text-md w-14">{{ $reserve->payment_status }}</span>
                                            @endif
                       
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <form action="{{ route('cancel.reservation', $reserve->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button id="cancel-button-{{ $reserve->id }}" type="submit" class="inline-flex items-center gap-x-2 text-md font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                    Cancel
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
           
    
       
                <script>
                    setTimeout(() => {
                        @foreach($event as $reserve)
                            var cancelButton = document.getElementById('cancel-event-button-{{ $reserve->id }}');
                            if (cancelButton) {
                                cancelButton.textContent = "Can't be canceled";
                                cancelButton.disabled = true;
                            }
                        @endforeach
                    }, 100000);
                </script>
    </div>

    @else
    @endif


        @if($event)
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <div class="mt-[10vh]"> 
                        <h1 class="text-center text-orange-700 font-extrabold">Event Reservation</h1>
                    </div>
                    <table class="min-w-full divide-y divide-gray-400 dark:divide-gray-700  mt-4">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-start text-sm font-medium text-gray-700 uppercase">Name</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm font-medium text-gray-700 uppercase">Email</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm font-medium text-gray-700 uppercase">Phone Number</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm font-medium text-gray-700 uppercase">Reserved Date</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm font-medium text-gray-700 uppercase">Guest Number</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm font-medium text-gray-700 uppercase">Event Type</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm font-medium text-gray-700 uppercase">Other Requests</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm font-medium text-gray-700 uppercase">Downpayment</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm font-medium text-gray-700 uppercase">Payment Status</th>
                                <th scope="col" class="px-6 py-3 text-end text-sm font-medium text-gray-700 uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($event as $reserve)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700" id="event-row-{{ $reserve->id }}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $reserve->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $reserve->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $reserve->tel_number }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $reserve->res_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $reserve->guest_number }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $reserve->event_type }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $reserve->other_request}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $reserve->downpayment}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            @if($reserve->payment_status == 'Paid')
                                                <span class="badge bg-success text-md w-14">{{ $reserve->payment_status }}</span>
                                                @else
                                                <span class="badge bg-danger text-md w-14">{{ $reserve->payment_status }}</span>
                                            @endif
                       
                                        </td>
                                        <td>
                                        <form action="{{ route('cancel.event', $reserve->id) }}" method="POST" id="cancel-event-form-{{ $reserve->id }}"
                                            onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" id="cancel-event-button-{{ $reserve->id }}" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                Cancel
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        setTimeout(() => {
            @foreach($reservation as $reserve)
                document.getElementById('cancel-button-{{ $reserve->id }}').textContent = "Can't be canceled";
                document.getElementById('cancel-button-{{ $reserve->id }}').disabled = true;
            @endforeach
        }, 100000);
    </script>
    

        @endif
    </div>
    </div>
    


    @include('homepages.footer')

     <!-- jQuery -->
     <script src="assets/js/jquery-2.1.0.min.js"></script>

     <!-- Bootstrap -->
     <script src="assets/js/popper.js"></script>
     <script src="assets/js/bootstrap.min.js"></script>
 
     <!-- Plugins -->
     <script src="assets/js/owl-carousel.js"></script>
     <script src="assets/js/accordions.js"></script>
     <script src="assets/js/datepicker.js"></script>
     <script src="assets/js/scrollreveal.min.js"></script>
     <script src="assets/js/waypoints.min.js"></script>
     <script src="assets/js/jquery.counterup.min.js"></script>
     <script src="assets/js/imgfix.min.js"></script> 
     <script src="assets/js/slick.js"></script> 
     <script src="assets/js/lightbox.js"></script> 
     <script src="assets/js/isotope.js"></script> 
 
     <script>
         document.addEventListener("alpine:init", () => {
             Alpine.data("scrollToTop", () => ({
                 showTopButton: false,
                 init() {
                     window.onscroll = () => {
                         this.scrollFunction();
                     };
                 },
 
                 scrollFunction() {
                     if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                         this.showTopButton = true;
                     } else {
                         this.showTopButton = false;
                     }
                 },
 
                 goToTop() {
                     document.body.scrollTop = 0;
                     document.documentElement.scrollTop = 0;
                 },
             }));
         });
     </script>
 
 <script>
     const toast = document.getElementById('toast');
 
     setTimeout(() => {
         toast.classList.add('hidden');
     }, 5000);
 </script>
 
 <script src="/assets/js/alpine-collaspe.min.js"></script>
 <script src="/assets/js/alpine-persist.min.js"></script>
 <script defer src="/assets/js/alpine-ui.min.js"></script>
 <script defer src="/assets/js/alpine-focus.min.js"></script>
 <script defer src="/assets/js/alpine.min.js"></script>
 <script src="/assets/js/custom.js"></script>
     
     <!-- Global Init -->
     <script src="assets/js/custom.js"></script>
     <script>
 
         $(function() {
             var selectedClass = "";
             $("p").click(function(){
             selectedClass = $(this).attr("data-rel");
             $("#portfolio").fadeTo(50, 0.1);
                 $("#portfolio div").not("."+selectedClass).fadeOut();
             setTimeout(function() {
               $("."+selectedClass).fadeIn();
               $("#portfolio").fadeTo(50, 1);
             }, 500);
                 
             });
         });
 
     </script>


</body>
</html>

