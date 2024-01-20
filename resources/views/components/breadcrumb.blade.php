   <nav aria-label="breadcrumb">
       <ol class="breadcrumb breadcrumb-style1">
           <li class="breadcrumb-item">
               <a
                   href="{{ url()->current() == route('dashboard.index') ? 'javascript:void(0)' : route('dashboard.index') }}">
                   Overview</a>
           </li>
           <li class="breadcrumb-item">
               <a
                   href="{{ url()->current() == route($parentLink) ? 'javascript:void(0)' : route($parentLink) }}">{{ $parentName }}</a>
           </li>
           <li class="breadcrumb-item active">{{ $childrenName }}</li>
       </ol>
   </nav>
