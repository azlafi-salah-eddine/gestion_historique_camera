<nav class="bg-white border-b border-gray-200 w-full">
    <div class="max-w-7xl mx-auto py-1 px-4 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center">
                    <img class="h-14 w-auto" src="{{ asset('photos/logo-MSISF.png') }}">
                </div>
            </div>
            <div class="hidden sm:ml-6 sm:block">
                <div class="flex space-x-4">
                    <div class="group relative">
                        <a href="/demandes/create" class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-900" style="cursor: pointer;">
                            Ajouter Demande
                        </a>
                    </div>
                    <div class="group relative">
                        <a href="/" class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-900" style="cursor: pointer;">
                            Demande
                        </a>
                    </div>
                    <div class="group relative">
                        <a href="/cameras" class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-900" style="cursor: pointer;">
                            Camera
                        </a>
                    </div>
                    <div class="group relative">
                        <a href="/user" class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-900" style="cursor: pointer;" onclick="toggleSubMenu('usersSubMenu')">
                            Utilisateurs
                        </a>
                    </div>
                    <div class="group relative">
                        <a href="/employe" class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-900" style="cursor: pointer;" onclick="toggleSubMenu('usersSubMenu')">
                            Employes
                        </a>
                    </div>
                    <div class="relative ml-3">
                        <div>
                            <button type="button" class="relative flex rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="{{ asset('photos/Profile-Avatar-PNG.png') }}" alt="">
                            </button>
                        </div>
                        <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <a href="/settings" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Paramètres</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Déconnecter</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-4 sm:pr-0"></div>
        </div>
    </div>
    <div class="sm:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2">
            <a href="#" class="block rounded-md bg-gray-100 px-3 py-2 text-base font-medium text-gray-900" aria-current="page">Dashboard</a>
            <div class="group relative">
                <a href="#" class="rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-gray-700" onclick="toggleSubMenu('mobileCamerasSubMenu')">
                    Caméras
                </a>
                <div id="mobileCamerasSubMenu" class="absolute hidden bg-white py-2 w-32 rounded-md shadow-lg z-10" aria-label="submenu">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Ajouter</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Modifier</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Supprimer</a>
                </div>
            </div>
            <div class="group relative">
                <a href="#" class="rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-gray-700" onclick="toggleSubMenu('mobileUsersSubMenu')">
                    Utilisateurs
                </a>
                <div id="mobileUsersSubMenu" class="absolute hidden bg-white py-2 w-32 rounded-md shadow-lg z-10" aria-label="submenu">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Ajouter</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Modifier</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Supprimer</a>
                </div>
            </div>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-gray-700">Paramètres</a>
        </div>
    </div>
</nav>


<script>
    // Function to toggle the visibility of the specified submenu
    function toggleSubMenu(subMenuId) {
        const subMenu = document.getElementById(subMenuId);
        subMenu.style.display = (subMenu.style.display === 'block') ? 'none' : 'block';
    }

    // Event listener for the user profile dropdown menu
    document.addEventListener('DOMContentLoaded', function() {
        const userMenuButton = document.getElementById('user-menu-button');
        const userMenu = document.querySelector('[aria-labelledby="user-menu-button"]');

        // Function to hide the user profile dropdown menu
        function hideUserMenu() {
            userMenu.style.display = 'none';
        }

        // Click event listener for the user menu button to toggle the visibility of the dropdown menu
        userMenuButton.addEventListener('click', function(event) {
            event.stopPropagation(); // Stop the event from propagating to the document
            userMenu.style.display = (userMenu.style.display === 'block') ? 'none' : 'block';
        });

        // Hide the user profile dropdown menu initially
        hideUserMenu();

        // Click event listener to hide the dropdown menu when clicking outside of it
        document.addEventListener('click', function(event) {
            if (event.target !== userMenuButton && !userMenu.contains(event.target)) {
                hideUserMenu();
            }
        });

        // Hide submenus when clicking outside
        document.addEventListener('click', function(event) {
            const camerasSubMenu = document.getElementById('camerasSubMenu');
            const usersSubMenu = document.getElementById('usersSubMenu');
            const mobileCamerasSubMenu = document.getElementById('mobileCamerasSubMenu');
            const mobileUsersSubMenu = document.getElementById('mobileUsersSubMenu');

            if (!event.target.closest('[onclick]') && !event.target.closest('.group')) {
                camerasSubMenu.style.display = 'none';
                usersSubMenu.style.display = 'none';
                mobileCamerasSubMenu.style.display = 'none';
                mobileUsersSubMenu.style.display = 'none';
            }
        });
    });

</script>








