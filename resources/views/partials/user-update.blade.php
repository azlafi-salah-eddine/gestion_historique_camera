<section class="flex flex-col items-center pt-4">
    <div class="w-full bg-white rounded-lg shadow border sm:max-w-md xl:p-0">
        <div class="p-6 space-y-4 sm:p-6">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">modifier le compte</h1>
            <form class="space-y-7" method="POST">
                <div class="flex space-x-2">
                    <div class="w-1/3">
                        <label for="ppr" class="block mb-1 text-sm font-medium text-gray-900">PPR :</label>
                        <input type="text" name="ppr" id="ppr" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2" placeholder="123455" required>
                    </div>
                    <div class="w-1/3">
                        <label for="nom" class="block mb-1 text-sm font-medium text-gray-900">Nom :</label>
                        <input type="text" name="nom" id="nom" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2" placeholder="Erickson" required>
                    </div>
                    <div class="w-1/3">
                        <label for="prenom" class="block mb-1 text-sm font-medium text-gray-900">Prenom :</label>
                        <input type="text" name="prenom" id="prenom" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2" placeholder="Emelia" required>
                    </div>
                </div>
                <div>
                    <label for="countries" class="block mb-1 text-sm font-medium text-gray-900">Role :</label>
                    <select id="countries" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Utilisateur par defaut</option>
                        <option value="admin">Administrateur/trice</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Username : </label>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                            </svg>
                        </span>
                        <input type="text" id="website-admin" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5" placeholder="emelia erickson24">
                    </div>
                </div>
                <div>
                    <label for="password" class="block mb-1 text-sm font-medium text-gray-900">Password :</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2" required>
                </div>
                <div class="flex space-x-4">
                    <button type="button" class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</section>
n
