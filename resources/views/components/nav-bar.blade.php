<!DOCTYPE html>
<html style="height: 100%">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('img/logo.png') }}" rel="icon">

    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#1967D2",
                    },
                },
            },
        };
    </script>
    <title>Ajouter Site</title>
</head>

<body style="height: 100%; background-color: #f5f5f5">
    @include('layouts.navigation')
    <div class="flex h-full w-full">

        <div id="sidebar"
            class='h-full flex-col items-start justify-start w-72 left-0 h-calc overflow-auto flex pb-6 bg-gray-100 overflow-x-hidden'>

            <a href="/marchandises" class="flex text-laravel font-medium text items-center  pl-4 mt-6">
                <svg width="20px" height="20px" viewBox="0 -0.5 25 25"fill="#1967D2" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.05 12.082C13.05 11.6678 12.7142 11.332 12.3 11.332C11.8858 11.332 11.55 11.6678 11.55 12.082H13.05ZM12.3 19H11.55C11.55 19.249 11.6736 19.4818 11.8799 19.6213C12.0862 19.7608 12.3483 19.7888 12.5794 19.696L12.3 19ZM18.044 16.694L18.3234 17.39C18.6077 17.2759 18.794 17.0003 18.794 16.694H18.044ZM18.794 11.9C18.794 11.4858 18.4582 11.15 18.044 11.15C17.6298 11.15 17.294 11.4858 17.294 11.9H18.794ZM12.7554 11.4861C12.4263 11.2346 11.9556 11.2975 11.7041 11.6266C11.4526 11.9557 11.5155 12.4264 11.8446 12.6779L12.7554 11.4861ZM14.348 13.647L13.8926 14.2429C14.1156 14.4133 14.415 14.445 14.6687 14.325L14.348 13.647ZM18.3617 12.578C18.7361 12.4008 18.8961 11.9537 18.719 11.5793C18.5418 11.2049 18.0947 11.0449 17.7203 11.222L18.3617 12.578ZM12.0206 11.386C11.6362 11.5403 11.4497 11.977 11.604 12.3614C11.7583 12.7458 12.195 12.9323 12.5794 12.778L12.0206 11.386ZM18.3234 10.472C18.7078 10.3177 18.8943 9.88097 18.74 9.49658C18.5857 9.11219 18.149 8.92567 17.7646 9.07999L18.3234 10.472ZM17.7647 10.472C18.1491 10.6263 18.5858 10.4397 18.74 10.0553C18.8943 9.6709 18.7077 9.23421 18.3233 9.07995L17.7647 10.472ZM12.5793 6.77495C12.1949 6.62069 11.7582 6.80727 11.604 7.19168C11.4497 7.5761 11.6363 8.01279 12.0207 8.16705L12.5793 6.77495ZM18.4115 9.12322C18.0505 8.92024 17.5932 9.0484 17.3902 9.40947C17.1872 9.77054 17.3154 10.2278 17.6765 10.4308L18.4115 9.12322ZM20.095 10.93L20.4153 11.6082C20.669 11.4884 20.8346 11.237 20.8445 10.9566C20.8545 10.6762 20.7071 10.4137 20.4625 10.2762L20.095 10.93ZM17.7207 11.2218C17.3462 11.3987 17.1859 11.8457 17.3628 12.2203C17.5397 12.5948 17.9867 12.7551 18.3613 12.5782L17.7207 11.2218ZM17.4849 9.27273C17.207 9.57984 17.2306 10.0541 17.5377 10.3321C17.8448 10.61 18.3191 10.5864 18.5971 10.2793L17.4849 9.27273ZM20.5 7.059L21.0561 7.56227C21.2259 7.37459 21.2897 7.11388 21.2255 6.86901C21.1614 6.62413 20.9781 6.42812 20.738 6.34778L20.5 7.059ZM14.348 5L14.586 4.28878C14.2926 4.19056 13.9689 4.28268 13.7711 4.52071L14.348 5ZM11.7181 6.99171C11.4534 7.31031 11.4971 7.78317 11.8157 8.04787C12.1343 8.31258 12.6072 8.26889 12.8719 7.95029L11.7181 6.99171ZM6.27168 9.07995C5.88727 9.23421 5.70069 9.6709 5.85495 10.0553C6.00921 10.4397 6.4459 10.6263 6.83032 10.472L6.27168 9.07995ZM12.5743 8.16705C12.9587 8.01279 13.1453 7.5761 12.991 7.19168C12.8368 6.80727 12.4001 6.62069 12.0157 6.77495L12.5743 8.16705ZM6.91853 10.4298C7.2796 10.2268 7.40776 9.76954 7.20478 9.40847C7.00179 9.0474 6.54454 8.91924 6.18347 9.12222L6.91853 10.4298ZM4.5 10.929L4.13247 10.2752C3.88802 10.4126 3.74065 10.675 3.75046 10.9552C3.76027 11.2355 3.92561 11.4869 4.17908 11.6069L4.5 10.929ZM6.23008 12.5779C6.60445 12.7551 7.05163 12.5953 7.22887 12.2209C7.40611 11.8465 7.2463 11.3994 6.87192 11.2221L6.23008 12.5779ZM6.83042 9.07999C6.44603 8.92567 6.00931 9.11219 5.85499 9.49658C5.70067 9.88097 5.88719 10.3177 6.27158 10.472L6.83042 9.07999ZM12.0156 12.778C12.4 12.9323 12.8367 12.7458 12.991 12.3614C13.1453 11.977 12.9588 11.5403 12.5744 11.386L12.0156 12.778ZM5.9907 10.2746C6.26604 10.584 6.74011 10.6116 7.04956 10.3363C7.35901 10.061 7.38665 9.58689 7.1113 9.27744L5.9907 10.2746ZM4.5 7.471L4.20362 6.78205C3.98226 6.87727 3.82014 7.07305 3.76786 7.30828C3.71558 7.54351 3.77951 7.78954 3.9397 7.96956L4.5 7.471ZM10.244 5L10.8211 4.52099C10.6087 4.26508 10.2531 4.17962 9.94762 4.31105L10.244 5ZM11.7179 7.95001C11.9824 8.26874 12.4553 8.31265 12.774 8.0481C13.0927 7.78355 13.1367 7.31071 12.8721 6.99199L11.7179 7.95001ZM13.045 12.083C13.045 11.6688 12.7092 11.333 12.295 11.333C11.8808 11.333 11.545 11.6688 11.545 12.083H13.045ZM12.295 19L12.0156 19.696C12.2467 19.7888 12.5088 19.7608 12.7151 19.6213C12.9214 19.4818 13.045 19.249 13.045 19H12.295ZM6.551 16.694H5.801C5.801 17.0003 5.9873 17.2759 6.27158 17.39L6.551 16.694ZM7.301 11.9C7.301 11.4858 6.96521 11.15 6.551 11.15C6.13679 11.15 5.801 11.4858 5.801 11.9H7.301ZM12.75 12.6782C13.0793 12.427 13.1425 11.9563 12.8912 11.627C12.64 11.2977 12.1693 11.2345 11.84 11.4858L12.75 12.6782ZM10.244 13.647L9.92328 14.325C10.1768 14.4449 10.476 14.4134 10.699 14.2432L10.244 13.647ZM6.87172 11.222C6.49729 11.0449 6.05016 11.2049 5.87303 11.5793C5.6959 11.9537 5.85585 12.4008 6.23028 12.578L6.87172 11.222ZM11.55 12.082V19H13.05V12.082H11.55ZM12.5794 19.696L18.3234 17.39L17.7646 15.998L12.0206 18.304L12.5794 19.696ZM18.794 16.694V11.9H17.294V16.694H18.794ZM11.8446 12.6779L13.8926 14.2429L14.8034 13.0511L12.7554 11.4861L11.8446 12.6779ZM14.6687 14.325L18.3617 12.578L17.7203 11.222L14.0273 12.969L14.6687 14.325ZM12.5794 12.778L18.3234 10.472L17.7646 9.07999L12.0206 11.386L12.5794 12.778ZM18.3233 9.07995L12.5793 6.77495L12.0207 8.16705L17.7647 10.472L18.3233 9.07995ZM17.6765 10.4308L19.7275 11.5838L20.4625 10.2762L18.4115 9.12322L17.6765 10.4308ZM19.7747 10.2518L17.7207 11.2218L18.3613 12.5782L20.4153 11.6082L19.7747 10.2518ZM18.5971 10.2793L21.0561 7.56227L19.9439 6.55573L17.4849 9.27273L18.5971 10.2793ZM20.738 6.34778L14.586 4.28878L14.11 5.71122L20.262 7.77022L20.738 6.34778ZM13.7711 4.52071L11.7181 6.99171L12.8719 7.95029L14.9249 5.47929L13.7711 4.52071ZM6.83032 10.472L12.5743 8.16705L12.0157 6.77495L6.27168 9.07995L6.83032 10.472ZM6.18347 9.12222L4.13247 10.2752L4.86753 11.5828L6.91853 10.4298L6.18347 9.12222ZM4.17908 11.6069L6.23008 12.5779L6.87192 11.2221L4.82092 10.2511L4.17908 11.6069ZM6.27158 10.472L12.0156 12.778L12.5744 11.386L6.83042 9.07999L6.27158 10.472ZM7.1113 9.27744L5.0603 6.97244L3.9397 7.96956L5.9907 10.2746L7.1113 9.27744ZM4.79638 8.15995L10.5404 5.68895L9.94762 4.31105L4.20362 6.78205L4.79638 8.15995ZM9.6669 5.47901L11.7179 7.95001L12.8721 6.99199L10.8211 4.52099L9.6669 5.47901ZM11.545 12.083V19H13.045V12.083H11.545ZM12.5744 18.304L6.83042 15.998L6.27158 17.39L12.0156 19.696L12.5744 18.304ZM7.301 16.694V11.9H5.801V16.694H7.301ZM11.84 11.4858L9.78904 13.0508L10.699 14.2432L12.75 12.6782L11.84 11.4858ZM10.5647 12.969L6.87172 11.222L6.23028 12.578L9.92328 14.325L10.5647 12.969Z" fill="#000000"/>
                </svg>
                <p class="ml-4">
                    marchandises
                </p>
           </a>
            <button onclick="show()" href="/create" class="flex text-laravel font-medium text items-center  pl-4 mt-6">
                <abbr title="ajouter site">
                    <svg fill="#1967D2" height="20px" width="20px" version="1.1" id="Capa_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 27.963 27.963" xml:space="preserve">
                        <g>
                            <g id="c140__x2B_">
                                <path d="M13.98,0C6.259,0,0,6.26,0,13.982s6.259,13.981,13.98,13.981c7.725,0,13.983-6.26,13.983-13.981
                        C27.963,6.26,21.705,0,13.98,0z M21.102,16.059h-4.939v5.042h-4.299v-5.042H6.862V11.76h5.001v-4.9h4.299v4.9h4.939v4.299H21.102z
                        " />
                            </g>
                            <g id="Capa_1_9_">
                            </g>
                        </g>
                    </svg>
                </abbr>
                <p class="ml-4">
                    Ajouter une catégorie
                </p>
            </button>
            <form action="/categorier/store" method="POST" id="add"
                class="flex items-center justify-around w-full hidden">
                @csrf
                <input type="text" name="categorier"
                    class="flex text-laravel font-medium text items-center border-laravel border focus:border-0 ml-4 my-3 w-44 ">
                <button type="submit" class="bg-laravel p-1 h-fit w-fit rounded-md">
                    <svg fill="#ffff" height="20px" width="20px" version="1.1" id="Capa_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 27.963 27.963" xml:space="preserve">
                        <g>
                            <g id="c140__x2B_">
                                <path d="M13.98,0C6.259,0,0,6.26,0,13.982s6.259,13.981,13.98,13.981c7.725,0,13.983-6.26,13.983-13.981
                            C27.963,6.26,21.705,0,13.98,0z M21.102,16.059h-4.939v5.042h-4.299v-5.042H6.862V11.76h5.001v-4.9h4.299v4.9h4.939v4.299H21.102z
                            " />
                            </g>
                            <g id="Capa_1_9_">
                            </g>
                        </g>
                    </svg>
                </button>
            </form>
            @error('categorier')
                <p id="error" class="text-red-500 text-xs ml-4 mt-1">{{ $message }}</p>
            @enderror
            <div class="h-px  w-11/12 mt-4 bg-laravel">‎ </div>
            <a class="flex text-laravel font-medium text items-center  pl-4 mt-6">
                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g id="Iconly/Curved/Category">
                        <g id="Category">
                            <path id="Stroke 1" fill-rule="evenodd" clip-rule="evenodd"
                                d="M21.0003 6.6738C21.0003 8.7024 19.3551 10.3476 17.3265 10.3476C15.2979 10.3476 13.6536 8.7024 13.6536 6.6738C13.6536 4.6452 15.2979 3 17.3265 3C19.3551 3 21.0003 4.6452 21.0003 6.6738Z"
                                stroke="#1967D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path id="Stroke 3" fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.3467 6.6738C10.3467 8.7024 8.7024 10.3476 6.6729 10.3476C4.6452 10.3476 3 8.7024 3 6.6738C3 4.6452 4.6452 3 6.6729 3C8.7024 3 10.3467 4.6452 10.3467 6.6738Z"
                                stroke="#1967D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path id="Stroke 5" fill-rule="evenodd" clip-rule="evenodd"
                                d="M21.0003 17.2619C21.0003 19.2905 19.3551 20.9348 17.3265 20.9348C15.2979 20.9348 13.6536 19.2905 13.6536 17.2619C13.6536 15.2333 15.2979 13.5881 17.3265 13.5881C19.3551 13.5881 21.0003 15.2333 21.0003 17.2619Z"
                                stroke="#1967D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path id="Stroke 7" fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.3467 17.2619C10.3467 19.2905 8.7024 20.9348 6.6729 20.9348C4.6452 20.9348 3 19.2905 3 17.2619C3 15.2333 4.6452 13.5881 6.6729 13.5881C8.7024 13.5881 10.3467 15.2333 10.3467 17.2619Z"
                                stroke="#1967D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                    </g>
                </svg>
                <p class="ml-4">
                    Catégories
                </p>
            </a>
        </div>
        <main id="item" class="h-full w-full p-2">
            {{ $slot }}
        </main>
    </div>
    <script>
        function warnning(id) {
            document.getElementById('deleteGroupModal').classList.remove('hidden');
            document.getElementById('deleteGroupModal').setAttribute("data-value", id);
            const deleteGroupIdInput = document.getElementById('deleteGroupId');
            // Set the hidden input field's value to the retrieved group ID
            deleteGroupIdInput.value = id;
        }
    </script>
    <script>
        function hide() {
            document.getElementById('deleteGroupModal').classList.add('hidden');
        }
    </script>
</body>

</html>
