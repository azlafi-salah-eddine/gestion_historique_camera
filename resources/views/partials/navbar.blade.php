<nav class="bg-white shadow relative z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center gap-3">
                <a href="{{ route('index') }}" class="flex items-center">
                    <img class="h-10 w-auto" src="{{ asset('photos/logo-MSISF.png') }}" alt="Logo">
                </a>

                <div class="hidden sm:flex sm:space-x-6 sm:ml-6 items-center">
                    <a href="{{ route('index') }}" class="text-gray-600 hover:text-blue-700 text-sm font-medium">Accueil</a>

                    @if(Auth::check() && Auth::user()->role == 'admin')
                    <div class="relative">
                        <button type="button" data-dropdown-trigger="admin-menu" class="text-gray-600 hover:text-blue-700 text-sm font-medium inline-flex items-center gap-2">
                            Administration
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </button>
                        <div id="admin-menu" data-dropdown-menu class="hidden absolute left-0 mt-2 w-56 bg-white border rounded-xl shadow-lg py-2">
                            <a href="{{ route('cameras.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Caméras</a>
                            <a href="{{ route('employes.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Employés</a>
                            <a href="{{ route('users.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Utilisateurs</a>
                            <a href="{{ route('entitesAffectation.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Entités Affectation</a>
                            <a href="{{ route('demandes.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Demandes</a>
                        </div>
                    </div>
                    @endif

                    @if(Auth::check() && Auth::user()->role == 'user')
                    <div class="relative">
                        <button type="button" data-dropdown-trigger="demande-menu" class="text-gray-600 hover:text-blue-700 text-sm font-medium inline-flex items-center gap-2">
                            Demande
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </button>
                        <div id="demande-menu" data-dropdown-menu class="hidden absolute left-0 mt-2 w-48 bg-white border rounded-xl shadow-lg py-2">
                            <a href="{{ route('demandes.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Liste</a>
                            <a href="{{ route('demandes.create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Ajouter</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="flex items-center gap-3">
                @auth
                <div class="relative hidden sm:block">
                    <button type="button" data-dropdown-trigger="profile-menu" class="bg-white rounded-full flex text-sm items-center border border-gray-200 px-2 py-1">
                        <img class="h-8 w-8 rounded-full" src="{{ asset('photos/Profile-Avatar-PNG.png') }}" alt="">
                        <span class="ml-2 font-medium text-gray-700">{{ Auth::user()->Nom_u }}</span>
                        <i class="fa-solid fa-chevron-down ml-2 text-gray-400 text-xs"></i>
                    </button>
                    <div id="profile-menu" data-dropdown-menu class="hidden origin-top-right absolute right-0 mt-2 w-56 rounded-xl shadow-lg py-1 bg-white border">
                        <div class="px-4 py-2 border-b text-sm">
                            <div class="font-medium text-gray-800">{{ Auth::user()->Nom_u }} {{ Auth::user()->Prenom_u }}</div>
                            <div class="text-gray-500 text-xs mt-1">{{ Auth::user()->username }}</div>
                        </div>
                        @if(Auth::user()->role === 'admin')
                        <a href="{{ route('users.edit', Auth::user()->Id_u) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><i class="fa-solid fa-gear mr-2"></i> Paramètres</a>
                        @else
                        <a href="{{ route('demandes.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><i class="fa-solid fa-list mr-2"></i> Mes demandes</a>
                        @endif
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50"><i class="fa-solid fa-right-from-bracket mr-2"></i> Déconnexion</a>
                    </div>
                </div>
                @else
                <a href="{{ route('login') }}" class="hidden sm:inline-flex text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Connexion</a>
                @endauth

                <button type="button" id="mobile-menu-trigger" class="sm:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:bg-gray-100">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden sm:hidden border-t bg-white">
        <div class="px-4 py-3 space-y-2">
            <a href="{{ route('index') }}" class="block px-2 py-2 rounded text-sm text-gray-700 hover:bg-gray-100">Accueil</a>

            @if(Auth::check() && Auth::user()->role == 'admin')
            <a href="{{ route('cameras.index') }}" class="block px-2 py-2 rounded text-sm text-gray-700 hover:bg-gray-100">Caméras</a>
            <a href="{{ route('employes.index') }}" class="block px-2 py-2 rounded text-sm text-gray-700 hover:bg-gray-100">Employés</a>
            <a href="{{ route('users.index') }}" class="block px-2 py-2 rounded text-sm text-gray-700 hover:bg-gray-100">Utilisateurs</a>
            <a href="{{ route('entitesAffectation.index') }}" class="block px-2 py-2 rounded text-sm text-gray-700 hover:bg-gray-100">Entités Affectation</a>
            @endif

            @if(Auth::check())
            <a href="{{ route('demandes.index') }}" class="block px-2 py-2 rounded text-sm text-gray-700 hover:bg-gray-100">Demandes</a>
            @endif

            @auth
            <div class="border-t pt-2 mt-2">
                <p class="px-2 text-xs text-gray-500 mb-1">{{ Auth::user()->Nom_u }} {{ Auth::user()->Prenom_u }}</p>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-2 py-2 rounded text-sm text-red-600 hover:bg-red-50">Déconnexion</a>
            </div>
            @else
            <a href="{{ route('login') }}" class="block px-2 py-2 rounded text-sm text-gray-700 hover:bg-gray-100">Connexion</a>
            @endauth
        </div>
    </div>
</nav>

<script>
    (function () {
        const triggers = document.querySelectorAll('[data-dropdown-trigger]');
        const menus = document.querySelectorAll('[data-dropdown-menu]');

        function closeAll() {
            menus.forEach(menu => menu.classList.add('hidden'));
        }

        triggers.forEach(trigger => {
            trigger.addEventListener('click', function (event) {
                event.stopPropagation();
                const menuId = trigger.getAttribute('data-dropdown-trigger');
                const menu = document.getElementById(menuId);
                const isHidden = menu.classList.contains('hidden');
                closeAll();
                if (isHidden) {
                    menu.classList.remove('hidden');
                }
            });
        });

        document.addEventListener('click', function () {
            closeAll();
        });

        const mobileTrigger = document.getElementById('mobile-menu-trigger');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileTrigger && mobileMenu) {
            mobileTrigger.addEventListener('click', function () {
                mobileMenu.classList.toggle('hidden');
            });
        }
    })();
</script>
