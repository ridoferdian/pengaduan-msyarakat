<nav class="fixed top-0 w-full bg-gray-800 py-3 z-30 ">
    <div class="px-3  lg:px-5 lg:pl-3">
       <div class="flex items-center justify-between ">
          <div class="flex items-center justify-start">
             <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                type="button"
                class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 ">
                <svg class="w-6 h-6 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                   xmlns="http://www.w3.org/2000/svg">
                   <path clip-rule="evenodd" fill-rule="evenodd"
                      d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                   </path>
                </svg>
             </button>
             <a href="" class="flex ml-2 md:mr-24">
                <img src="" class="h-8 mr-3" alt="" />
                <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white"></span>
             </a>
          </div>
          <div class="relative -right-5">
            <a href="{{ route('admin.logout') }}" class="text-white font-nunito mr-4" >{{ Auth::guard('officer')->user()->name_officer }}</a>
         </li>
          </div>
       </div>
    </div>
 </nav>
