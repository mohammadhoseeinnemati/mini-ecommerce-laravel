<!-- SIDE MENU -->
<div class="lg:sticky mb-8 top-1 h-fit lg:w-1/4 hidden lg:flex flex-col gap-y-4 items-center shadow rounded-lg p-4 dark:bg-gray-800 bg-white">
    <!-- NAME AND AVATAR  -->
    <div class="w-full flex items-center justify-between border-b border-gray-200 dark:border-white/20 py-3">
        <div class="flex items-center gap-x-3">
            <img src="{{asset('assets/images/svg/user.png')}}" class="size-10 ring-2 ring-gray-400/20 rounded-full"
                 alt="AVATAR">
            <span class="felx flex-col gap-y-2">
            <p class="font-DanaMedium text-lg">{{getAuthenticatedUserFullName()}}</p>
            <p class="text-gray-400">{{auth()->user()->phone}}</p>
         </span>
        </div>
        <span>
         <svg class="w-6 h-6 cursor-pointer text-blue-500">
            <use href="#edit"></use>
         </svg>
      </span>
    </div>
    <ul
        class="w-full relative space-y-2 child:duration-300 child:transition-all child:py-3  child:px-2 child:flex child:gap-x-2 text-lg child:cursor-pointer child:rounded-lg">
        <li class="bg-blue-500/10 text-blue-500">
            <svg class="w-6 h-6 ">
                <use href="#squares"></use>
            </svg>
            <a href="{{route('account.orders.index')}}">سفارش ها</a>
        </li>
        <li class="hover:text-blue-500">
            <svg class="w-6 h-6 ">
                <use href="#cog"></use>
            </svg>
            <a href="{{route('account.profile.index')}}">اطلاعات حساب </a>
        </li>
        <li class="text-red-400">
            <svg class="w-6 h-6 ">
                <use href="#arrow-left-end"></use>
            </svg>
            <a href="{{route('auth.logout.index')}}">خروج</a>
        </li>
    </ul>
</div>
