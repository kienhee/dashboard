   <nav aria-label="breadcrumb">
       <ol class="breadcrumb breadcrumb-style1">
           <li class="breadcrumb-item">
               <a
                   href="{{ url()->current() == route('dashboard.index') ? 'javascript:void(0)' : route('dashboard.index') }}">
                   Dashboard</a>
           </li>
           <li class="breadcrumb-item">
               <a
                   href="{{ url()->current() == route($routeIndex) ? 'javascript:void(0)' : route($routeIndex) }}">{{ $listName }}</a>
           </li>
           <li class="breadcrumb-item active">{{ $currentPage }}</li>
       </ol>
   </nav>
