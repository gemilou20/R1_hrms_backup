<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
        
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
                        <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="#about">About</a></li>
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
                        <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                        <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                        <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>
                        
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
                                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="flex font-semibold items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-red-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700">
                                            Logout
                                        </x-dropdown-link>
                                    </form>
                                
                            </div>
                        </div>
                        
                    </ul>        
                    <!-- ***** Menu End ***** -->
                </nav>
                <a class='menu-trigger'>
                    <span><svg class="w-4 h-5  " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg></span>
                </a>
                
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
<script>
    documventListener("alpine:init", () => {
        Alpine.data("header", () => ({
            init() {
                const selector = document.querySelector('ul.horizontal-menu a[href="' + window
                    .location.pathname + '"]');
                if (selector) {
                    selector.classList.add('active');
                    const ul = selector.closest('ul.sub-menu');
                    if (ul) {
                        let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                        if (ele) {
                            ele = ele[0];
                            setTimeout(() => {
                                ele.classList.add('active');
                            });
                        }
                    }
                }
            },

            notifications: [{
                id                 profil                g',
                message: '                sm mr-1">John Doe</strong>invite you to <strong>Prototyping</strong>',
                time: '45 min                 
            {
                 ,
                ro                eg',
                  e: '<strong class="text-sm m                ong>mentioned you to <strong>UX Basics</strong>',
                time: '9h Ago',
            },
            id: 3,
            e: ',                sage: '                sm mr - 1">Anna Morgan</strong                             time: '9h Ago',
            }
            ],

        mess                     id: 1,
        e: '<span class="grid place-content-center                  bg-suc                uccess text-success dark:text-success-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></span>',
        title: 'Congratulations!',
        message: 'Your OS has been updated.                ime: '1hr',
            },
        id: 2,
        image                 place - conten             ro            fo                text -in ght"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></span>',
        title: 'Did you know?',
        message: 'You can switch between artboards.',
        time                 },
        {
            image: '<span class="grid place-c                9 rounded-ful            t d            xt                nger-li                p://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>',
            title: 'Something went wrong!',
            message: 'Send Reposrt',
            time: '2days',
        },
        {
                 ,
            image: '<span                 ntent-center w-9 h-9 roun                light dark:bg-w            ing            ng                http://                 class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">    <circle cx="12" cy="12" r="10"></circle>    <line x1="12" y1="8" x2="12" y2="12"></line>    <line x1="12" y1="16" x2="12.01" y2="16"></line></svg></span>',
            title: 'Warning',
            message: 'Your password strength is low.',
            time: '5days',
        },
            ],
        removeNotifi                            this.n                notifications.filter((d) => d.id !== value)                          remov            {
        this.messages = this.messages.filter((d) => d.id !== value);
    },
        }));
    });
</script>