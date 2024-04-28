<nav class="fixed z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start">
        <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" data-drawer-target="sidebar" data-drawer-toggle="sidebar" aria-controls="sidebar" class="p-2 text-gray-600 rounded cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
          <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
          <svg id="toggleSidebarMobileClose" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
        <a href="/" class="flex ml-2 md:mr-24">
          <svg class="w-8 h-8" width="95" height="85" viewBox="0 0 95 85" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M94.6956 37.4062C94.6887 31.2428 92.2373 25.3338 87.8791 20.9756C83.5209 16.6174 77.6119 14.166 71.4485 14.1591C70.5103 14.1604 69.573 14.218 68.6416 14.3313C66.8333 10.1835 63.8537 6.65367 60.0684 4.17459C56.2832 1.69551 51.8567 0.375 47.3318 0.375C42.807 0.375 38.3805 1.69551 34.5952 4.17459C30.8099 6.65367 27.8304 10.1835 26.022 14.3313C25.0964 14.2186 24.1648 14.1611 23.2323 14.1591C17.9104 14.1625 12.7507 15.9918 8.6151 19.3416C4.47954 22.6913 1.61853 27.3586 0.509957 32.5638C-0.598615 37.7691 0.112379 43.1971 2.52418 47.9412C4.93598 52.6853 8.90254 56.4583 13.7613 58.6299V78.7343C13.7613 80.3328 14.3963 81.8658 15.5266 82.996C16.6569 84.1263 18.1899 84.7613 19.7883 84.7613H74.8925C76.491 84.7613 78.024 84.1263 79.1543 82.996C80.2845 81.8658 80.9195 80.3328 80.9195 78.7343V58.6299C85.0179 56.7975 88.4989 53.819 90.9431 50.0533C93.3874 46.2877 94.6905 41.8955 94.6956 37.4062ZM75.7535 78.7343C75.7535 78.9627 75.6628 79.1817 75.5013 79.3431C75.3399 79.5046 75.1209 79.5953 74.8925 79.5953H19.7883C19.56 79.5953 19.341 79.5046 19.1795 79.3431C19.018 79.1817 18.9273 78.9627 18.9273 78.7343V60.2486C20.3467 60.5169 21.7879 60.6524 23.2323 60.6533H71.4485C72.893 60.6524 74.3342 60.5169 75.7535 60.2486V78.7343ZM71.4485 55.4872H64.427L67.066 44.9227C67.1485 44.5937 67.1655 44.2516 67.1158 43.9161C67.0661 43.5805 66.9509 43.258 66.7766 42.967C66.6023 42.676 66.3724 42.4221 66.1 42.2199C65.8276 42.0178 65.518 41.8712 65.189 41.7887C64.86 41.7062 64.5179 41.6892 64.1823 41.7389C63.8468 41.7885 63.5243 41.9038 63.2332 42.0781C62.9422 42.2524 62.6884 42.4823 62.4862 42.7547C62.284 43.0271 62.1375 43.3366 62.055 43.6657L59.0974 55.4872H49.9234V44.2942C49.9234 43.6091 49.6513 42.9522 49.1669 42.4677C48.6825 41.9833 48.0255 41.7112 47.3404 41.7112C46.6554 41.7112 45.9984 41.9833 45.514 42.4677C45.0296 42.9522 44.7574 43.6091 44.7574 44.2942V55.4872H35.5834L32.6259 43.6657C32.5433 43.3366 32.3968 43.0271 32.1946 42.7547C31.9925 42.4823 31.7386 42.2524 31.4476 42.0781C31.1566 41.9038 30.8341 41.7885 30.4985 41.7389C30.1629 41.6892 29.8209 41.7062 29.4918 41.7887C29.1628 41.8712 28.8533 42.0178 28.5809 42.2199C28.3085 42.4221 28.0786 42.676 27.9043 42.967C27.73 43.258 27.6147 43.5805 27.565 43.9161C27.5154 44.2516 27.5323 44.5937 27.6149 44.9227L30.2538 55.4872H23.2323C18.437 55.4872 13.838 53.5823 10.4471 50.1914C7.05626 46.8006 5.15129 42.2016 5.15129 37.4062C5.15129 32.6108 7.05626 28.0118 10.4471 24.621C13.838 21.2301 18.437 19.3251 23.2323 19.3251C23.6628 19.3251 24.0934 19.3251 24.4894 19.3725C24.2284 20.7767 24.0958 22.2018 24.0934 23.6301C24.0934 24.3152 24.3655 24.9722 24.8499 25.4566C25.3343 25.941 25.9913 26.2132 26.6764 26.2132C27.3614 26.2132 28.0184 25.941 28.5028 25.4566C28.9872 24.9722 29.2594 24.3152 29.2594 23.6301C29.2594 18.8348 31.1643 14.2358 34.5552 10.8449C37.946 7.45405 42.545 5.54909 47.3404 5.54909C52.1358 5.54909 56.7348 7.45405 60.1257 10.8449C63.5165 14.2358 65.4215 18.8348 65.4215 23.6301C65.4215 24.3152 65.6936 24.9722 66.178 25.4566C66.6624 25.941 67.3194 26.2132 68.0045 26.2132C68.6895 26.2132 69.3465 25.941 69.8309 25.4566C70.3154 24.9722 70.5875 24.3152 70.5875 23.6301C70.585 22.2018 70.4525 20.7767 70.1914 19.3725C70.6219 19.3467 71.0266 19.3251 71.4485 19.3251C76.2439 19.3251 80.8429 21.2301 84.2337 24.621C87.6246 28.0118 89.5295 32.6108 89.5295 37.4062C89.5295 42.2016 87.6246 46.8006 84.2337 50.1914C80.8429 53.5823 76.2439 55.4872 71.4485 55.4872Z" fill="#FB473C"/>
          </svg>            
          <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">WCrops</span>
        </a>
        <form action="#" method="GET" class="hidden lg:block lg:pl-3.5">
          <label for="topbar-search" class="sr-only">Search</label>
          <div class="relative mt-1 lg:w-96">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" name="email" id="topbar-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search">
          </div>
        </form>
      </div>
      <div class="flex items-center">
          <div class="hidden mr-3 -mb-1 sm:block">
            <span></span>
          </div>
          
          <button id="toggleSidebarMobileSearch" type="button" class="p-2 text-gray-500 rounded-lg lg:hidden hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            <span class="sr-only">Search</span>
            
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
          </button>
          
          <button type="button" data-dropdown-toggle="notification-dropdown" class="p-2 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700">
            <span class="sr-only">View notifications</span>
            
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path></svg>
          </button>
          
          <div class="z-20 z-50 hidden max-w-sm my-4 overflow-hidden text-base list-none bg-white divide-y divide-gray-100 rounded shadow-lg dark:divide-gray-600 dark:bg-gray-700" id="notification-dropdown" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(1427px, 65px);" data-popper-placement="bottom">
            <div class="block px-4 py-2 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                Notifications
            </div>
            <div>
              <a href="#" class="flex px-4 py-3 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                <div class="flex-shrink-0">
                  <img class="rounded-full w-11 h-11" src="https://flowbite-admin-dashboard.vercel.app/images/users/bonnie-green.png" alt="Jese image">
                  <div class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 border border-white rounded-full bg-primary-700 dark:border-gray-700">
                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
                  </div>
                </div>
                <div class="w-full pl-3">
                    <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400">New message from <span class="font-semibold text-gray-900 dark:text-white">Bonnie Green</span>: "Hey, what's up? All set for the presentation?"</div>
                    <div class="text-xs font-medium text-primary-700 dark:text-primary-400">a few moments ago</div>
                </div>
              </a>
              <a href="#" class="flex px-4 py-3 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                <div class="flex-shrink-0">
                  <img class="rounded-full w-11 h-11" src="https://flowbite-admin-dashboard.vercel.app/images/users/jese-leos.png" alt="Jese image">
                  <div class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-gray-900 border border-white rounded-full dark:border-gray-700">
                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path></svg>
                  </div>
                </div>
                <div class="w-full pl-3">
                    <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Jese leos</span> and <span class="font-medium text-gray-900 dark:text-white">5 others</span> started following you.</div>
                    <div class="text-xs font-medium text-primary-700 dark:text-primary-400">10 minutes ago</div>
                </div>
              </a>
              <a href="#" class="flex px-4 py-3 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                <div class="flex-shrink-0">
                  <img class="rounded-full w-11 h-11" src="https://flowbite-admin-dashboard.vercel.app/images/users/joseph-mcfall.png" alt="Joseph image">
                  <div class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-red-600 border border-white rounded-full dark:border-gray-700">
                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                  </div>
                </div>
                <div class="w-full pl-3">
                    <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Joseph Mcfall</span> and <span class="font-medium text-gray-900 dark:text-white">141 others</span> love your story. See it and view more stories.</div>
                    <div class="text-xs font-medium text-primary-700 dark:text-primary-400">44 minutes ago</div>
                </div>
              </a>
              <a href="#" class="flex px-4 py-3 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                <div class="flex-shrink-0">
                  <img class="rounded-full w-11 h-11" src="https://flowbite-admin-dashboard.vercel.app/images/users/leslie-livingston.png" alt="Leslie image">
                  <div class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-green-400 border border-white rounded-full dark:border-gray-700">
                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                  </div>
                </div>
                <div class="w-full pl-3">
                    <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Leslie Livingston</span> mentioned you in a comment: <span class="font-medium text-primary-700 dark:text-primary-500">@bonnie.green</span> what do you say?</div>
                    <div class="text-xs font-medium text-primary-700 dark:text-primary-400">1 hour ago</div>
                </div>
              </a>
              <a href="#" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600">
                <div class="flex-shrink-0">
                  <img class="rounded-full w-11 h-11" src="https://flowbite-admin-dashboard.vercel.app/images/users/robert-brown.png" alt="Robert image">
                  <div class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-purple-500 border border-white rounded-full dark:border-gray-700">
                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                  </div>
                </div>
                <div class="w-full pl-3">
                    <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Robert Brown</span> posted a new video: Glassmorphism - learn how to implement the new design trend.</div>
                    <div class="text-xs font-medium text-primary-700 dark:text-primary-400">3 hours ago</div>
                </div>
              </a>
            </div>
            <a href="#" class="block py-2 text-base font-normal text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:hover:underline">
                <div class="inline-flex items-center ">
                  <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                  View all
                </div>
            </a>
          </div>
          
          <button type="button" data-dropdown-toggle="apps-dropdown" class="hidden p-2 text-gray-500 rounded-lg sm:flex hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700">
            <span class="sr-only">View notifications</span>
            
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
          </button>
          
          <div class="z-20 z-50 hidden max-w-sm my-4 overflow-hidden text-base list-none bg-white divide-y divide-gray-100 rounded shadow-lg dark:bg-gray-700 dark:divide-gray-600" id="apps-dropdown" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(1467px, 65px);" data-popper-placement="bottom">
            <div class="block px-4 py-2 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                Apps
            </div>
            <div class="grid grid-cols-3 gap-4 p-4">
              <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600">
                <svg class="mx-auto mb-1 text-gray-500 w-7 h-7 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                <div class="text-sm font-medium text-gray-900 dark:text-white">Sales</div>
              </a>
              <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600">
                <svg class="mx-auto mb-1 text-gray-500 w-7 h-7 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                <div class="text-sm font-medium text-gray-900 dark:text-white">Users</div>
              </a>
              <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600">
                <svg class="mx-auto mb-1 text-gray-500 w-7 h-7 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path></svg>
                <div class="text-sm font-medium text-gray-900 dark:text-white">Inbox</div>
              </a>
              <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600">
                <svg class="mx-auto mb-1 text-gray-500 w-7 h-7 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                  <div class="text-sm font-medium text-gray-900 dark:text-white">Profile</div>
              </a>
              <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600">
                <svg class="mx-auto mb-1 text-gray-500 w-7 h-7 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                <div class="text-sm font-medium text-gray-900 dark:text-white">Settings</div>
              </a>
              <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600">
                <svg class="mx-auto mb-1 text-gray-500 w-7 h-7 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path><path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                <div class="text-sm font-medium text-gray-900 dark:text-white">Products</div>
              </a>
              <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600">
                <svg class="mx-auto mb-1 text-gray-500 w-7 h-7 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path></svg>
                  <div class="text-sm font-medium text-gray-900 dark:text-white">Pricing</div>
              </a>
              <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600">
                <svg class="mx-auto mb-1 text-gray-500 w-7 h-7 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 2a2 2 0 00-2 2v14l3.5-2 3.5 2 3.5-2 3.5 2V4a2 2 0 00-2-2H5zm2.5 3a1.5 1.5 0 100 3 1.5 1.5 0 000-3zm6.207.293a1 1 0 00-1.414 0l-6 6a1 1 0 101.414 1.414l6-6a1 1 0 000-1.414zM12.5 10a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" clip-rule="evenodd"></path></svg>
                <div class="text-sm font-medium text-gray-900 dark:text-white">Billing</div>
              </a>
              <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600">
                <svg class="mx-auto mb-1 text-gray-500 w-7 h-7 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                  <div class="text-sm font-medium text-gray-900 dark:text-white">Logout</div>
              </a>
            </div>
          </div>
          <button id="theme-toggle" data-tooltip-target="tooltip-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
            <svg id="theme-toggle-light-icon" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
          </button>
          <div id="tooltip-toggle" role="tooltip" class="absolute z-10 inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm tooltip opacity-0 invisible" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(1747px, 63px);" data-popper-placement="bottom">
              Toggle dark mode
              <div class="tooltip-arrow" data-popper-arrow="" style="position: absolute; left: 0px; transform: translate(69px, 0px);"></div>
          </div>
          
          <div class="flex items-center ml-3">
            <div>
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button-2" aria-expanded="false" data-dropdown-toggle="dropdown-2">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
              </button>
            </div>
            
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-2" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(1555px, 61px);" data-popper-placement="bottom">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900 dark:text-white" role="none">
                  Neil Sims
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                  neil.sims@flowbite.com
                </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Settings</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Earnings</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </div>
  </div>
</nav>