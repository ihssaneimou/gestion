<x-bar-nav>
    <style>
        
        .tabAnim {
        z-index: 1;
        }
    
        #private:checked~div {
            --tw-translate-x: 0%;
        }
    
        #public:checked~div {
            --tw-translate-x: 100%;
        }
        .profile-pic {
            border-radius: 50%;
            height: 150px;
            width: 150px;
            background-size: cover;
            background-position: center;
            background-blend-mode: multiply;
            vertical-align: middle;
            text-align: center;
            color: transparent;
            transition: all .3s ease;
            text-decoration: none;
            cursor: pointer;
            border: solid 1px black;
        }
    
        .profile-pic:hover {
            background-color: rgba(0, 0, 0, .5);
            z-index: 10000;
            color: #fff;
            transition: all .3s ease;
            text-decoration: none;
        }
    
        .profile-pic span {
            display: inline-block;
            /* color: black; */
            padding-top: 4.5em;
            padding-bottom: 4.5em;
        }
    
        form input[type="file"] {
            display: none;
            cursor: pointer;
        }
    </style>
    
    <div class="mb-48 bg-gray-100">
        <main>
            <div class="mx-4">
                <div class="bg-gray-50 border border-gray-200 shadow-md p-10 rounded max-w-lg mx-auto mt-24">
                    <header class="text-center">
                        <h2 class="text-3xl font-bold uppercase mb-1">
                            Ajouter une Marchendise
                        </h2>
                    </header>
    
                    <form action="{{ route('marchandises.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <center>
                                <label for="fileToUpload">
                                    {{-- @dd($site->logo) --}}
                                        <div class="profile-pic" id="photo" style="background-image: url('{{asset("/storage/".$marchandise->image)}}')">
                                            <!-- <span class="glyphicon glyphicon-camera"></span> -->
                                            <span>Changer Image</span>
                                        </div>
                                </label>
                            </center>
                        </div>
                        <input type="File" name="image" accept="image/png, image/gif, image/jpeg,image/jpg" id="fileToUpload">
                        <div class="mb-6">
                            <label for="title" class="inline-block text-lg mb-2">Nom du marchandise </label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" value="{{ $marchandise->nom }}" name="nom"
                            placeholder="title"  />
                            @error('nom')
                            <p class="text-red-500 test-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="title" class="inline-block text-lg mb-2">Code barre</label>
                            <input type="number" class="border border-gray-200 rounded p-2 w-full" value="{{ $marchandise->barre_code }}" name="barre_code"
                            placeholder="title"  />
                            @error('barre_code')
                            <p class="text-red-500 test-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="title" class="inline-block text-lg mb-2">description</label>
                            <textarea name="description" id="" class="border border-gray-200 rounded p-2 w-full h-52" value="{{ $marchandise->description }}" placeholder="description"></textarea>
                            @error('description')
                            <p class="text-red-500 test-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="title" class="inline-block text-lg mb-2">quantite</label>
                            <input type="number" class="border border-gray-200 rounded p-2 w-full" value="{{ $marchandise->quantite }}" name="quantite"
                            placeholder="title"  />
                            @error('quantite')
                            <p class="text-red-500 test-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="categorie" class="inline-block text-lg mb-2">Catégorie </label>
                            <select name="categorie" class="border border-gray-200 rounded p-2 w-full" value="{{ $marchandise->categorie }}" id="categorie">
                                @foreach ($categorie as $item)
                                <option value="{{$item->id}}">{{$item->nom}} </option>
                                @endforeach
                                <option>Autre </option>
                            </select>
                            <input type="hidden" id="writeIn" class="border border-gray-200 rounded mt-2 p-2 w-full" name="new_cat" placeholder="Nouvelle Catégorie"  />
                            @error('categorie')
                            <p class="text-red-500 test-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <button class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-gray-600 text-lg">
                                Soumettre
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <script>
        const select = document.getElementById('categorier');
        const writeIn = document.getElementById('writeIn');
    
        select.addEventListener('change', function() {
        if (select.value === '-1') {
            writeIn.type="text"
        } else {
            writeIn.type="hidden"
        }
        });
    </script>
    <script>
        const img = document.querySelector('#photo');
        const file = document.querySelector('#fileToUpload');
        file.addEventListener('change', function () {
            const choosedFile = this.files[0];
    
            if (choosedFile) {
    
                const reader = new FileReader();
    
                reader.addEventListener('load', function () {
                    img.setAttribute('src', reader.result);
                    img.setAttribute('style', "background-image: url('" + reader.result + "')");
                });
    
                reader.readAsDataURL(choosedFile);
    
            }
        });
    </script>
    </x-bar-nav>