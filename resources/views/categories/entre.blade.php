<x-nav-bar>
    <div class="fixed font-mon bg-slate-200 grid hidden rounded-md shadow-md z-50" id="deleteGroupModal"
         style="width: 400px; justify-items: center; align-content: space-evenly; height: 200px; left: 50%; top:50%; transform: translate(-50%, -50%);" tabindex="-1"
         aria-labelledby="deleteGroupModalLabel" aria-hidden="true">
        <div class="grid justify-items-center">
            <svg fill="#000" height="60px" width="60px" version="1.1" id="Capa_1"
                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                 viewBox="0 0 27.963 27.963" xml:space="preserve">
                <g>
                    <g id="c129_exclamation">
                        <path d="M13.983,0C6.261,0,0.001,6.259,0.001,13.979c0,7.724,6.26,13.984,13.982,13.984s13.98-6.261,13.98-13.984
                                C27.963,6.259,21.705,0,13.983,0z M13.983,26.531c-6.933,0-12.55-5.62-12.55-12.553c0-6.93,5.617-12.548,12.55-12.548
                                c6.931,0,12.549,5.618,12.549,12.548C26.531,20.911,20.913,26.531,13.983,26.531z" />
                        <polygon points="15.579,17.158 16.191,4.579 11.804,4.579 12.414,17.158 		" />
                        <path d="M13.998,18.546c-1.471,0-2.5,1.029-2.5,2.526c0,1.443,0.999,2.528,2.444,2.528h0.056c1.499,0,2.469-1.085,2.469-2.528
                                C16.441,19.575,15.468,18.546,13.998,18.546z" />
                    </g>
                </g>
            </svg>
            <h5 class="font-semibold text-lg" id="deleteGroupModalLabel">Confirmation </h5>
        </div>
    
        <div class="flex w-2/3 justify-around">
            <button type="button" class="btn btn-secondary" onclick="hide()" data-bs-dismiss="modal">Annuler</button>
            <form action="/entres/delete" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" id="deleteGroupId" value="">
                <button type="submit" class="bg-red-500 text-white p-2 rounded-sm hover:scale-110 hover:bg-red-400">retirer</button>
            </form>
        </div>
    </div>
    
    <div class="text-sm font-medium text-center text-gray-500 border-gray-200 dark:text-gray-400 dark:border-gray-700" id='cont'>
        <ul class="flex flex-wrap -mb-px">
            <li class="me-2">
                <a href="{{ route('categories.entre_sortie', $categories) }}" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Tous</a>
            </li> 
            <li class="me-2">
                <a href="{{ route('categories.entre', $categories) }}" class="inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500" aria-current="page">Entrés</a>
            </li>
            <li class="me-2">
                <a href="{{ route('categories.sortie', $categories) }}" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Sorties</a>
            </li>
        </ul>
        
        <table class="w-full text-sm text-left text-gray-500 mb-14">
            <tbody>
                @foreach($entres as $entre)
                    <tr class="bg-white hover:bg-gray-50">
                        <td class="py-4 px-6">{{ $entre->type }}</td>
                        <td class="py-4 px-6">{{ $entre->created_at }}</td>
                        <td class="py-4 px-6">{{ $entre->nom }}</td>
                        <td class="py-4 px-6 justify-center space-x-4 flex">
                                <button  onclick="warnning({{ $entre->id }})" class="text-red-600 hover:text-red-900">retirer</button>
                         
                            <a href="{{ route('categories.index_mar_a', $entre) }}">consulter</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function warnning(id) {
            document.getElementById('deleteGroupModal').classList.remove('hidden');
            const deleteGroupIdInput = document.getElementById('deleteGroupId');
            deleteGroupIdInput.value = id;
            document.getElementById('cont').classList.add('blur-sm');
            document.getElementById('cont').classList.add('pointer-events-none');
        }
    </script>
    <script>
        function hide() {
            document.getElementById('deleteGroupModal').classList.add('hidden');
            document.getElementById('cont').classList.remove('blur-sm');
            document.getElementById('cont').classList.remove('pointer-events-none');
        }
    </script>
</x-nav-bar>
