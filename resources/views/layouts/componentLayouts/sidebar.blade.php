
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@heroicons/vue@1.0.4/dist/heroicons.min.css" rel="stylesheet">
<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
@vite(['resources/css/app.css', 'resources/js/app.js'])

<div :class="{ 'dark text-white-dark': $store.app.semidark }">
    <nav x-data="sidebar"
        class="sidebar fixed min-h-screen h-full top-0 bottom-0 w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] z-50 transition-all duration-300">
        <div class="bg-white dark:bg-[#0e1726] h-full">
            <div class="flex justify-between items-center px-4 py-3">
                <a href="{{ url('/admin/dashboard') }}" class="main-logo flex items-center shrink-0">
                    <img class="w-44 ml-[5px] flex-none" src="{{ URL('assets/images/ANAA33.png') }}" alt="image" />
                    <span
                        class="text-2xl ltr:ml-1.5 rtl:mr-1.5  font-semibold  align-middle lg:inline dark:text-white-light">
                        </span>
                </a>
                <a href="javascript:;"
                    class="collapse-icon w-8 h-8 rounded-full flex items-center hover:bg-gray-500/10 dark:hover:bg-dark-light/10 dark:text-white-light transition duration-300 rtl:rotate-180"
                    @click="$store.app.toggleSidebar()">
                    <svg class="w-5 h-5 m-auto" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 19L7 12L13 5" stroke="#9C603B" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="#9C603B"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
            
            <ul class="perfect-scrollbar relative font-semibold space-y-0.5 h-[calc(100vh-80px)] overflow-y-auto overflow-x-hidden  p-4 py-0"
                x-data="{ activeDropdown: null }">
                <li class="nav-item ">
                    <a class="{{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ url('admin/dashboard') }}" class="group">
                        <div class="flex items-center">

                            <svg class="group-hover:!text-primary" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.5"
                                    d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                    fill="#9C603B" />
                                <path
                                    d="M9 17.25C8.58579 17.25 8.25 17.5858 8.25 18C8.25 18.4142 8.58579 18.75 9 18.75H15C15.4142 18.75 15.75 18.4142 15.75 18C15.75 17.5858 15.4142 17.25 15 17.25H9Z"
                                    fill="#9C603B" />
                            </svg>
                            <span
                                class="ltr:pl-3 rtl:pr-3 text-black hover:text-blue-500 dark:text-[#506690] dark:hover:text-blue-500 focus:hover:text-blue-500 dark:group-hover:text-white-dark">
                                Dashboard </span> 
                        </div>
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="{{ request()->is('/home') ? 'active' : '' }}" href="{{ url('/home') }}" class="group">
                        <div class="flex items-center">

                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><defs>
                                <path id="solarHomeBoldDuotone0" d="M10.75 9.5a1.25 1.25 0 1 1 2.5 0a1.25 1.25 0 0 1-2.5 0"/></defs><path 
                                fill="#9C603B" fill-rule="evenodd" d="m21.532 11.586l-.782-.626v10.29H22a.75.75 0 0 1 0 1.5H2a.75.75 0 1 1 0-1.5h1.25V10.96l-.781.626a.75.75 0 1 1-.937-1.172l8.125-6.5a3.75 3.75 0 0 1 4.686 0l8.125 6.5a.75.75 0 1 1-.936 1.172M12 6.75a2.75 2.75 0 1 0 0 5.5a2.75 2.75 0 0 0 0-5.5m1.746 6.562c-.459-.062-1.032-.062-1.697-.062h-.098c-.665 0-1.238 0-1.697.062c-.491.066-.963.215-1.345.597s-.531.854-.597 1.345c-.062.459-.062 1.032-.062 1.697v4.299h7.5v-4.423c0-.612-.004-1.143-.062-1.573c-.066-.491-.215-.963-.597-1.345s-.853-.531-1.345-.597" clip-rule="evenodd"/><g 
                                fill="#9C603B" fill-rule="evenodd" clip-rule="evenodd" opacity="0.5">
                                <use href="#solarHomeBoldDuotone0"/><use href="#solarHomeBoldDuotone0"/></g><path 
                                fill="#9C603B" d="M12.05 13.25c.664 0 1.237 0 1.696.062c.492.066.963.215 1.345.597s.531.853.597 1.345c.058.43.062.96.062 1.573v4.423h-7.5v-4.3c0-.664 0-1.237.062-1.696c.066-.492.215-.963.597-1.345s.854-.531 1.345-.597c.459-.062 1.032-.062 1.697-.062zM16 3h2.5a.5.5 0 0 1 .5.5v4.14l-3.5-2.8V3.5A.5.5 0 0 1 16 3" opacity="0.5"/>
                            </svg>
                            
                            <span
                                class="ltr:pl-3 rtl:pr-3 text-black hover:text-blue-500 dark:text-[#506690] dark:hover:text-blue-500 focus:hover:text-blue-500 dark:group-hover:text-white-dark">
                                Home</span> 
                        </div>
                    </a>
                </li>

                <h2
                class="py-3 px-7 flex items-center uppercase font-extrabold bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08] -mx-4 mb-1">

                <svg class="w-4 h-5 flex-none hidden" viewBox="0 0 24 24" stroke="#9C603B" stroke-width="1.5"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                <span>Categories</span>
            </h2>

               <!--<li class="nav-item">
                    <a class="{{ request()->is('users') ? 'active' : '' }}"  href="{{ url('/users') }}" class="group ">
                        <div class="flex items-center">

                            <svg class="group-hover:!text-primary" width="20" height="20" viewBox="0 0 24 24" 
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="#9C603B"
                                d="M14 4h-4C6.229 4 4.343 4 3.172 5.172C2 6.343 2 8.229 2 12c0 3.771 0 5.657 1.172 6.828C4.343 20 6.229 20 10 20h4c3.771 0 5.657 0 6.828-1.172C22 17.657 22 15.771 22 12c0-3.771 0-5.657-1.172-6.828C19.657 4 17.771 4 14 4" opacity="0.5"/>
                                <path fill="#9C603B" 
                                d="M13.25 9a.75.75 0 0 1 .75-.75h5a.75.75 0 0 1 0 1.5h-5a.75.75 0 0 1-.75-.75m1 3a.75.75 0 0 1 .75-.75h4a.75.75 0 0 1 0 1.5h-4a.75.75 0 0 1-.75-.75m1 3a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 0 1.5h-3a.75.75 0 0 1-.75-.75M9 11a2 2 0 1 0 0-4a2 2 0 0 0 0 4m0 6c4 0 4-.895 4-2s-1.79-2-4-2s-4 .895-4 2s0 2 4 2"/>
                            </svg>

                            <span
                                class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">
                                Users</span>
                        </div>
                    </a>
                </li>-->

                <!--<li class="nav-item">
                    <a class="{{ request()->is('admin/menus') ? 'active' : '' }}"  href="{{ route('admin.menus.index') }}" class="group">
                        <div class="flex items-center">

                            <svg class="group-hover:!text-primary" width="20" height="20" viewBox="0 0 24 24" 
                                xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="#9C603B" 
                                d="M21 15.998v-6c0-2.828 0-4.242-.879-5.121C19.353 4.109 18.175 4.012 16 4H8c-2.175.012-3.353.109-4.121.877C3 5.756 3 7.17 3 9.998v6c0 2.829 0 4.243.879 5.122c.878.878 2.293.878 5.121.878h6c2.828 0 4.243 0 5.121-.878c.879-.88.879-2.293.879-5.122" opacity="0.5"/>
                                <path fill="#9C603B" 
                                d="M8 3.5A1.5 1.5 0 0 1 9.5 2h5A1.5 1.5 0 0 1 16 3.5v1A1.5 1.5 0 0 1 14.5 6h-5A1.5 1.5 0 0 1 8 4.5z"/>
                                <path fill="#9C603B" fill-rule="evenodd" 
                                d="M6.25 10.5A.75.75 0 0 1 7 9.75h.5a.75.75 0 0 1 0 1.5H7a.75.75 0 0 1-.75-.75m3.5 0a.75.75 0 0 1 .75-.75H17a.75.75 0 0 1 0 1.5h-6.5a.75.75 0 0 1-.75-.75M6.25 14a.75.75 0 0 1 .75-.75h.5a.75.75 0 0 1 0 1.5H7a.75.75 0 0 1-.75-.75m3.5 0a.75.75 0 0 1 .75-.75H17a.75.75 0 0 1 0 1.5h-6.5a.75.75 0 0 1-.75-.75m-3.5 3.5a.75.75 0 0 1 .75-.75h.5a.75.75 0 0 1 0 1.5H7a.75.75 0 0 1-.75-.75m3.5 0a.75.75 0 0 1 .75-.75H17a.75.75 0 0 1 0 1.5h-6.5a.75.75 0 0 1-.75-.75" clip-rule="evenodd"/>
                            </svg>

                            <span
                                class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">
                                Menus</span>
                        </div>
                    </a>
                </li> -->
                
                       
                        <li class="nav-item">
                            <a class="{{ request()->is('admin/tables') ? 'active' : '' }}" href="{{ route('admin.tables.index') }}" class="group focus:hover:text-blue-500">
                                <div class="flex items-center">

                                 <svg class="group-hover:!text-primary" width="20" height="20" viewBox="0 0 24 24" 
                                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#9C603B" 
                                    d="M5.846 8c0-2.828 0-4.243.901-5.121C7.65 2 9.1 2 12 2c2.901 0 4.352 0 5.253.879c.9.878.9 2.293.9 5.121v8c0 2.828 0 4.243-.9 5.121C16.352 22 14.9 22 12 22s-4.351 0-5.253-.879c-.9-.878-.9-2.293-.9-5.121z"/>
                                    <path fill="#9C603B" fill-rule="evenodd" 
                                    d="M2.77 3.75a.76.76 0 0 1 .768.75v15a.76.76 0 0 1-.769.75A.76.76 0 0 1 2 19.5v-15a.76.76 0 0 1 .77-.75m18.46 0a.76.76 0 0 1 .77.75v15a.76.76 0 0 1-.77.75a.76.76 0 0 1-.768-.75v-15a.76.76 0 0 1 .769-.75" clip-rule="evenodd" opacity="0.5"/>
                                </svg>
                                    
                                    <span
                                        class="ltr:pl-3 rtl:pr-3 text-black hover:text-blue-500 dark:text-[#506690] dark:hover:text-blue-500 focus:hover:text-blue-500 dark:group-hover:text-white-dark">
                                        Tables</span>
                                </div>
                            </a>
                        </li>
                        

                        
                        <li class="nav-item">
                            <a class="{{ request()->is('admin/reservation') ? 'active' : '' }}" href="{{ route('admin.reservation.index') }}" class="group">
                                <div class="flex items-center">

                                    <svg class="group-hover:!text-primary" width="20" height="20" viewBox="0 0 24 24" 
                                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#9C603B" 
                                    d="M3 10c0-3.771 0-5.657 1.172-6.828C5.343 2 7.229 2 11 2h2c3.771 0 5.657 0 6.828 1.172C21 4.343 21 6.229 21 10v4c0 3.771 0 5.657-1.172 6.828C18.657 22 16.771 22 13 22h-2c-3.771 0-5.657 0-6.828-1.172C3 19.657 3 17.771 3 14z" opacity="0.5"/>
                                    <path fill="#9C603B" 
                                    d="M16.519 16.501c.175-.136.334-.295.651-.612l3.957-3.958c.096-.095.052-.26-.075-.305a4.332 4.332 0 0 1-1.644-1.034a4.332 4.332 0 0 1-1.034-1.644c-.045-.127-.21-.171-.305-.075L14.11 12.83c-.317.317-.476.476-.612.651c-.161.207-.3.43-.412.666c-.095.2-.166.414-.308.84l-.184.55l-.292.875l-.273.82a.584.584 0 0 0 .738.738l.82-.273l.875-.292l.55-.184c.426-.142.64-.212.84-.308c.236-.113.46-.25.666-.412m5.849-5.809a2.163 2.163 0 1 0-3.06-3.059l-.126.128a.524.524 0 0 0-.148.465c.02.107.055.265.12.452c.13.375.376.867.839 1.33a3.5 3.5 0 0 0 1.33.839c.188.065.345.1.452.12a.525.525 0 0 0 .465-.148z"/>
                                    <path fill="#9C603B" fill-rule="evenodd" 
                                    d="M7.25 9A.75.75 0 0 1 8 8.25h6.5a.75.75 0 0 1 0 1.5H8A.75.75 0 0 1 7.25 9m0 4a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 0 1.5H8a.75.75 0 0 1-.75-.75m0 4a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 0 1.5H8a.75.75 0 0 1-.75-.75" clip-rule="evenodd"/>
                                    </svg>

                                    <span
                                        class="ltr:pl-3 rtl:pr-3 text-black hover:text-blue-500 dark:text-[#506690] dark:hover:text-blue-500 focus:hover:text-blue-500 dark:group-hover:text-white-dark">
                                        Table Reservations</span>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="{{ request()->is('admin/events') ? 'active' : '' }}" href="{{ route('admin.events.index') }}" class="group">
                                <div class="flex items-center">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                        <path fill="#9C603B" fill-rule="evenodd" 
                                        d="m21.838 11.126l-.229 2.436c-.378 4.012-.567 6.019-1.75 7.228C18.678 22 16.906 22 13.36 22h-2.72c-3.545 0-5.317 0-6.5-1.21c-1.183-1.21-1.371-3.216-1.749-7.228l-.23-2.436c-.18-1.912-.27-2.869.058-3.264a.992.992 0 0 1 .675-.367c.476-.042 1.073.638 2.268 1.998c.618.704.927 1.055 1.271 1.11a.923.923 0 0 0 .562-.09c.319-.16.53-.595.955-1.464l2.237-4.584C10.989 2.822 11.39 2 12 2c.61 0 1.011.822 1.813 2.465l2.237 4.584c.424.87.636 1.304.955 1.464c.176.089.37.12.562.09c.344-.055.653-.406 1.271-1.11c1.195-1.36 1.792-2.04 2.268-1.998a.992.992 0 0 1 .675.367c.327.395.237 1.352.057 3.264M12.952 12.7l-.098-.176c-.38-.682-.57-1.023-.854-1.023c-.284 0-.474.341-.854 1.023l-.098.176c-.108.194-.162.29-.246.354c-.085.064-.19.088-.4.136l-.19.043c-.738.167-1.107.25-1.195.533c-.088.282.164.576.667 1.164l.13.152c.143.168.215.251.247.354c.032.104.021.215 0 .438l-.02.204c-.076.784-.114 1.177.115 1.351c.23.175.576.016 1.267-.303l.178-.082c.197-.09.295-.135.399-.135c.104 0 .202.045.399.135l.178.082c.691.319 1.037.478 1.267.303c.23-.174.191-.567.115-1.352l-.02-.203c-.021-.223-.032-.334 0-.437c.032-.104.104-.187.247-.355l.13-.152c.503-.588.755-.882.667-1.165c-.088-.282-.457-.365-1.195-.532l-.19-.043c-.21-.048-.315-.072-.4-.136c-.084-.063-.138-.16-.246-.354" 
                                        clip-rule="evenodd"/></svg>

                                    <span
                                        class="ltr:pl-3 rtl:pr-3 text-black hover:text-blue-500 dark:text-[#506690] dark:hover:text-blue-500 focus:hover:text-blue-500 dark:group-hover:text-white-dark">
                                        Event Reservations</span>
                                </div>
                            </a>
                        </li>

                        
                       

            </ul>
        </div>
    </nav>
    
</div>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("sidebar", () => ({
            init() {
                const selector = document.querySelector('.sidebar ul a[href="' + window.location
                    .pathname + '"]');
                if (selector) {
                    selector.classList.add('active');
                    const ul = selector.closest('ul.sub-menu');
                    if (ul) {
                        let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                        if (ele) {
                            ele = ele[0];
                            setTimeout(() => {
                                ele.click();
                            });
                        }
                    }
                }
            },
        }));
    });
</script>
