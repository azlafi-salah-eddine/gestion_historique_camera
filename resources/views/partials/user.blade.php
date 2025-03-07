<div class="mt-4 p-5 relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
        <div>
            <a href="/user/add" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Ajouter utilisateur
            </a>
        </div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for items">
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-700">
        <thead class="text-xs text-gray-800 uppercase bg-gray-200">
        <tr>
            <th scope="col" class="px-6 py-3">
                ID
            </th>
            <th scope="col" class="px-6 py-3">
                PPR
            </th>
            <th scope="col" class="px-6 py-3">
                Nom
            </th>
            <th scope="col" class="px-6 py-3">
                Prenom
            </th>
            <th scope="col" class="px-6 py-3">
                Role
            </th>
            <th scope="col" class="px-6 py-3">
                Actions
            </th>
        </tr>
        </thead>
        <tbody>
        <tr class="bg-white hover:bg-gray-100">
            <td class="px-6 py-4 whitespace-nowrap">
                1
            </td>
            <td class="px-6 py-4">
                123456789
            </td>
            <td class="px-6 py-4">
                John
            </td>
            <td class="px-6 py-4">
                Doe
            </td>
            <td class="px-6 py-4">
                Admin
            </td>
            <td class="px-6 py-4 space-x-4 ">
                <a href="/user/update" class="inline-block px-4 py-2 text-white bg-green-500 hover:bg-green-600 rounded-md focus:outline-none">
                    Modifier
                </a>
                <a href="/user/delete" class="inline-block px-4 py-2 text-white bg-red-500 hover:bg-red-600 rounded-md focus:outline-none">
                    Supprimer
                </a>
            </td>
        </tr>
        <tr class="bg-white hover:bg-gray-100">
            <td class="px-6 py-4 whitespace-nowrap">
                1
            </td>
            <td class="px-6 py-4">
                123456789
            </td>
            <td class="px-6 py-4">
                John
            </td>
            <td class="px-6 py-4">
                Doe
            </td>
            <td class="px-6 py-4">
                Admin
            </td>
            <td class="px-6 py-4 space-x-4 ">
                <a href="/user/update" class="inline-block px-4 py-2 text-white bg-green-500 hover:bg-green-600 rounded-md focus:outline-none">
                    Modifier
                </a>
                <a href="/user/delete" class="inline-block px-4 py-2 text-white bg-red-500 hover:bg-red-600 rounded-md focus:outline-none">
                    Supprimer
                </a>
            </td>
        </tr>
        <tr class="bg-white hover:bg-gray-100">
            <td class="px-6 py-4 whitespace-nowrap">
                1
            </td>
            <td class="px-6 py-4">
                123456789
            </td>
            <td class="px-6 py-4">
                John
            </td>
            <td class="px-6 py-4">
                Doe
            </td>
            <td class="px-6 py-4">
                Admin
            </td>
            <td class="px-6 py-4 space-x-4 ">
                <a href="/user/update" class="inline-block px-4 py-2 text-white bg-green-500 hover:bg-green-600 rounded-md focus:outline-none">
                    Modifier
                </a>
                <a href="/user/delete" class="inline-block px-4 py-2 text-white bg-red-500 hover:bg-red-600 rounded-md focus:outline-none">
                    Supprimer
                </a>
            </td>
        </tr>
        <!-- Add more rows as needed -->
        </tbody>
    </table>


</div>
