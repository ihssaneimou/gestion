<x-nav-bar>
    <div class="fixed font-mon bg-slate-200 grid hidden rounded-md shadow-md " id="deleteGroupModal"
        style="width: 400px; justify-items: center; align-content: space-evenly ;height: 200px; left: 50%; top:50%; transform: translate(-50%, -50%); tabindex="-1"
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
                    <g id="Capa_1_207_">
                    </g>
                </g>
            </svg>
            <h5 class="font-semibold text-lg" id="deleteGroupModalLabel">Confirmation de la suppression</h5>
        </div>
        <div class="text-sm text-gray-900">
            Êtes-vous sûr de vouloir supprimer ce client?
        </div>
        <div class="flex w-2/3 justify-around">
            <button type="button" class="btn btn-secondary" onclick="hide()"
                data-bs-dismiss="modal">Annuler</button>
            <form action="/clients/delete" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" id="deleteGroupId" value="">
                <button type="submit"
                    class="bg-red-500 text-white p-2 rounded-sm hover:scale-110 hover:bg-red-400">Supprimer</button>
            </form>
        </div>
    </div>
    <div id="cont" class="" >
        <div class=" flex">
            <p class="text-2xl w-2/3 m-3 pl-6 underline underline-offset-4">clients</p>
            <p class="text-xl w-1/3  m-3 pl-6"><a href="/clients/create"
                    class="text-blue-600 hover:text-blue-900">Ajouter
                    client</a> </p>
        </div>
        @if (count($clients)>0)
        <div class="overflow-x-auto relative shadow-md w-full sm:rounded-lg mb-10">
                
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="py-3 px-6 ">nom</th>
                        <th scope="col" class="py-3 px-6 ">adresse</th>
                        <th scope="col" class="py-3 px-6 ">telephone</th>
                        <th scope="col" class="py-3 px-6 ">email</th>
                        <th scope="col" class="py-3 px-6 ">num_fiscal</th>
                        <th scope="col" class="py-3 px-6 ">cordonnées bancaire</th>
                        <th scope="col" class="py-3 px-6 text-center">remarque</th>
                        <th scope="col" class="py-3 px-6 text-center">remise</th>
                        <th scope="col" class="py-3 px-6 text-center">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                    <tr class="bg-white border-b hover:bg-gray-300 hover:text-black ">
                        <td class="py-4 px-6 ">{{$client->nom}}</td>
                        <td class="py-4 px-6  ">{{ $client->adresse }}</td>
                        <td class="py-4 px-6 ">{{ $client->telephone }}</td>
                        <td class="py-4 px-6 ">{{ $client->email }}</td>
                        <td class="py-4 px-6 ">{{ $client->num_fiscal }}</td>
                        <td class="py-4 px-6 ">{{ $client->compt_bancaire }}</td>
                        <td class="py-4 px-6 ">{{ $client->remarque }}</td>
                        <td class="py-4 px-6 ">{{ $client->remise }}</td>
                        <td class="py-4 px-6 justify-center flex text-center">
                                <p onclick="warnning({{ $client->id }})"
                                    class="text-red-600 hover:text-red-900 cursor-pointer">Supprimer</p><a
                                    href="/clients/{{ $client->id }}/edit"class="text-blue-600 hover:text-blue-900 ml-4 cursor-pointer">Modifier</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
            @else
             <h2 class="text-gray-300 text-8xl select-none text-center mt-32">aucune client</h2>
            @endif
        <script>
            function warnning(id) {
                document.getElementById('deleteGroupModal').classList.remove('hidden');
                const deleteGroupIdInput = document.getElementById('deleteGroupId');
                // Set the hidden input field's value to the retrieved group ID
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
    </div>
</x-nav-bar>