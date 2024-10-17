<aside id="logo-sidebar"
   class="fixed top-0 left-0 z-40 w-52 h-screen pt-20 transition-transform -translate-x-full bg-gray-950 sm:translate-x-0 "
   aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-gray-950">
      <ul class="space-y-2  font-poppins">
        <li class="containers">
            <a href="{{ route('admin_instansi_dashboard.index') }}" class="active p-2 my-4 flex  hover:bg-gray-800 rounded-lg items-center group bg-gray-8
            @if (Request::is('admin/dashboard'))bg-gray-800 text-white @endif
            ">
                <span class="ms-3 flex items-center  text-white group-hover:text-gray-100">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('instansi.index') }}" class="active p-2 flex  hover:bg-gray-800 rounded-lg items-center group @if (Request::is('admin_instansi/instansi*'))bg-gray-800 text-white @endif">
                <span class="ms-3 flex items-center  text-white group-hover:text-gray-100">Instansi</span>
            </a>
        </li>
        <li>
            <a href="{{ route('kelola.index') }}" class="active p-2 flex  hover:bg-gray-800 rounded-lg items-center group @if (Request::is('admin_instansi/kelola*'))bg-gray-800 text-white @endif">
                <span class="ms-3 flex items-center  text-white group-hover:text-gray-100">Kelola Admin</span>
            </a>
        </li>
      </ul>
   </div>
</aside>
