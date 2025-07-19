 <!-- topnav -->
 <div class="navbar topnav border-bottom py-3 with-sidenav">
     <div class="container d-flex justify-between align-items-center">
         <div class="toggle_sidenav d-flex align-items-center gap-2">
             <span class="p-3 text-lighter" onclick="toggleSideNav()" style="cursor: pointer;"
                 aria-label="Toggle Side Navigation">
                 <i class="fas fa-bars"></i>
             </span>
             <a href="#" class="text-md text-lighter text-decoration-none">{{ __('menu.home') }}</a>
         </div>

         <ul class="actions d-flex align-items-center list-unstyled m-0">

             <!-- اللغة -->
             <li class="dropdown me-3">
                 <button class="dropdown-toggle bg-transparent border-0" data-toggle="dropdown" aria-expanded="false"
                     aria-label="Language Menu">
                     <i class="fas fa-globe text-white"></i>
                 </button>
                 <ul class="dropdown-menu dropdown-menu-end">
                     <li><a class="dropdown-item"
                             href="{{ LaravelLocalization::getLocalizedURL('en') }}">{{ __('menu.English') }}</a>
                     </li>

                     <li><a class="dropdown-item"
                             href="{{ LaravelLocalization::getLocalizedURL('ar') }}">{{ __('menu.Arabic') }}</a>
                     </li>
                 </ul>
             </li>

             {{-- الإشعارات --}}
             {{-- الإشعارات --}}
             @auth
                 <li class="nav-item dropdown me-4">
                     <a href="javascript:;"
                         class="dropdown-toggle position-relative d-flex align-items-center notificationsIcon"
                         data-bs-toggle="dropdown" aria-expanded="false">
                         <i class="fas fa-bell fs-5"></i>
                         @if (auth()->user()->unreadNotifications()->count())
                             <span class="badge rounded-pill bg-danger position-absolute top-0 start-100 translate-middle"
                                 id="notificationsIconCounter">
                                 {{ auth()->user()->unreadNotifications()->count() }}
                             </span>
                         @endif
                     </a>

                     <div class="dropdown-menu dropdown-menu-{{ in_array(App::getLocale(), ['en', 'fr']) ? 'end' : 'start' }} shadow-lg"
                         style="width: 380px; max-height: 450px; overflow-y: auto; border-radius: 8px;">
                         <div class="dropdown-header bg-primary text-white text-center py-2">
                             <strong>{{ __('Notifications') }}</strong>
                         </div>

                         <div class="list-group" id="notificationsModal">
                             @forelse(auth()->user()->notifications()->orderBy('created_at', 'desc')->take(5)->get() as $notification)
                                 @php
                                     $url = $notification->data['url'] ?? '#';
                                     $message = $notification->data['message'] ?? 'رسالة غير متوفرة';
                                 @endphp

                                 <a href="{{ $url . '?notification_id=' . $notification->id }}"
                                     class="list-group-item list-group-item-action d-flex gap-3 align-items-start mark-as-read"
                                     data-id="{{ $notification->id }}">
                                     <i class="fas fa-user-circle text-primary fs-4"></i>
                                     <div class="w-100">
                                         <div class="d-flex justify-content-between">
                                             <p
                                                 class="mb-1 {{ !$notification->read_at ? 'text-dark fw-bold' : 'text-muted' }}">
                                                 {{ $message }}
                                             </p>
                                             <small class="text-muted">
                                                 {{ $notification->created_at->diffForHumans() }}
                                             </small>
                                         </div>
                                     </div>
                                 </a>
                             @empty
                                 <div class="text-center text-muted py-3">
                                     {{ __('No new notifications') }}
                                 </div>
                             @endforelse
                         </div>

                         @php
                             $notificationsCount = auth()->user()->notifications()->count();
                         @endphp

                         @if ($notificationsCount)
                             <div class="text-center p-2 border-top">
                                 <a href="{{ route('Admin.notifications.markAllRead') }}"
                                     class="btn btn-sm btn-outline-primary me-2">{{ __('Read All') }}</a>
                                 <a href="{{ route('Admin.notifications') }}"
                                     class="btn btn-sm btn-primary">{{ __('Index All') }}</a>
                             </div>
                         @endif
                     </div>
                 </li>
             @endauth




             <li class="dropdown">
                 <button class="dropdown-toggle bg-transparent border-0" data-toggle="dropdown" aria-expanded="false"
                     aria-label="User Menu">
                     <img src="{{ asset('template/images/icons/user.png') }}" alt="user" />
                 </button>
                 <ul class="dropdown-menu dropdown-menu-end text-center">
                     <li>
                         {{-- <a href="{{ route('admin.profile') }}" class="dropdown-item"> --}}
                         {{ __('menu.Profile') }}
                         </a>
                     </li>

                     <li>
                         <form action="#" method="POST">
                             @csrf
                             <button type="submit" class="dropdown-item bg-transparent border-0">
                                 {{ __('menu.LogOut') }}
                             </button>
                         </form>
                     </li>
                 </ul>
             </li>

         </ul>
     </div>
 </div>
