<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        * {
            padding: 0%;
            margin: 0%;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif
        }

        .flex-center-col {
            align-items: center;
            justify-content: center;
            display: flex;
            flex-direction: column;
        }

        .containner {
            padding: 0 2rem;
            width: 100%;
        }

        header {
            width: 100%;
            height: 7rem;
            background: #26347e;
            font-size: 1.5rem;
            flex-direction: column;
            margin-bottom: 1.5rem;
        }

        header h1 {
            color: white;
            font-weight: 500;
        }

        main {
            width: 100%;
        }

        #favoritos {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            width: 100%;
            margin-bottom: 2rem;
        }

        #favoritos button {
            background: #26347e;
            border-radius: 10px;
            border: none;
            height: 2.5rem;
            width: 10rem;
            color: white;
            font-size: 1.25rem;
            font-weight: 600;
            cursor: pointer;
        }

        #favoritos button:hover {
            background: #26357ec7;
        }

        section {
            width: 100%;
            height: 70vh;
            background: #dedede;
            overflow-y: auto;
            padding: 2rem;
            border-radius: 10px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center
        }

        section::-webkit-scrollbar {
            margin-left: 2rem;

            width: 9px;
            height: 100%;

            /* A altura só é vista quando a rolagem é horizontal */
        }

        section::-webkit-scrollbar-track {
            background: #6b84ff;
            padding: 2px;
            border-radius: 50px;
        }

        section::-webkit-scrollbar-thumb {
            background-color: #041dff;
            border-radius: 50px;
        }

        #showModalAddBook {
            position: fixed;
            top: 85%;
            left: 88%;
            background: rgb(65, 185, 255);
            border-radius: 10px;
            border: none;
            height: 2.5rem;
            width: 10rem;
            color: white;
            font-size: 1.25rem;
            font-weight: 600;
            cursor: pointer;
        }

        #showModalAddBook:hover {
            background: rgb(89, 194, 255);
        }

        .book {
            width: 20rem;
            height: 20rem;
            background: #b9b9b9;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            flex-direction: column;
            border-radius: 10px;
            margin: 1rem 3rem;
        }

        .book figure {
            display: flex;
            align-items: flex-end;
            justify-content: flex-end;
            width: 100%;
            border-radius: 10px 10px 0 0;
            height: 60%;
            padding: 0.5rem 1rem;
        }

        .favorite-status {
            width: 3rem;
            fill: #ff3c3c;
            cursor: pointer;
        }

        .dividerBook {
            height: 3%;
            width: 100%;
            background: black;
            display: flex;
            align-items: center;
            justify-content: flex-start
        }

        .dividerBook svg{
            width: 3rem;
            rotate: -90deg

        }

        .descriptionBook {
            width: 100%;
            padding: 1rem 2rem;
            display: flex;
            align-items: flex-start;
            flex-direction: column;
            justify-content: center;
            height: 37%;
        }

        .descriptionBook h3 {
            margin-bottom: 0.5rem;
        }

        .modalAddBook {
            position: fixed;
            background: white;
            width: 60vw;
            height: 30vw;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-direction: column;
            border-radius: 10px;
            opacity: 0;
            visibility: hidden;
            z-index: 999;
        }

        body.addBookShow .modalAddBook {
            opacity: 1;
            visibility: visible
        }

        .modalHeaderAddBook {
            background: #152263;
            width: 100%;
            height: 5rem;
            border-radius: 10px 10px 0 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .modalHeaderAddBook svg {
            position: relative;
            width: 1.5rem;
            left: 35%;
            top: 0%;
            cursor: pointer;
        }

        .modalMainAddBook {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e4e4e4;
            height: calc(100% - 13rem);
            width: 100%
        }

        .modalMainAddBook>div {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 1rem 0;
        }

        .modalMainAddBook input {
            width: 50rem;
            height: 2.5rem;
            border: none;
            box-shadow: 0px 8px 6px 1px rgb(177, 177, 177);
            border-radius: 10px;
            margin-top: 0.5rem;
            outline: none;
            padding: 1rem;
        }

        .modalMainAddBook label {
            font-size: 1.5rem;
        }

        .modalFooterAddBook {
            width: 100%;
            height: 8rem;
            background: #e4e4e4;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 2rem
        }


        .modalFooterAddBook button {
            border-radius: 10px;
            border: none;
            height: 2.5rem;
            width: 8rem;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
        }

        .modalFooterAddBook button:nth-child(1) {
            background: #ff3c3c;
        }

        .modalFooterAddBook button:nth-child(2) {
            background: #6b84ff;
            margin-left: 1rem;
        }

        .modalRemoverFavorito {
            position: fixed;
            background: white;
            width: 60vw;
            height: 20vw;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-direction: column;
            border-radius: 10px;
            opacity: 0;
            visibility: hidden;
            z-index: 999;
        }

        body.rmBookShow .modalRemoverFavorito {
            opacity: 1;
            visibility: visible
        }

        .modalRemoverFavorito svg {
            position: relative;
            width: 1.5rem;
            left: 45%;
            top: 0%;
            cursor: pointer;
        }

        .modalMainRemoveFavorite {
            display: flex;
            align-items: center;
            justify-content: center;
            height: calc(100% - 13rem);
            width: 100%
        }

        .modalFooterRemoveFavorite {
            width: 100%;
            height: 8rem;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 2rem
        }

        .modalFooterRemoveFavorite {
            width: 100%;
            height: 8rem;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 2rem
        }


        .modalFooterRemoveFavorite button {
            border-radius: 10px;
            border: none;
            height: 2.5rem;
            width: 8rem;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
        }

        .modalFooterRemoveFavorite button:nth-child(1) {
            background: #ff3c3c;
        }

        .modalFooterRemoveFavorite button:nth-child(2) {
            background: #6b84ff;
            margin-left: 1rem;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
</head>

<body class="flex-center-col">
    <div class="modalAddBook">
        <div class="modalHeaderAddBook">
            <h2>Adicionar Livro</h2>
            <svg onclick="fecharModal('addBookShow')" fill="#ffffff" height="200px" width="200px" version="1.1"
                id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 0 460.775 460.775" xml:space="preserve" stroke="#ffffff">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path
                        d="M285.08,230.397L456.218,59.27c6.076-6.077,6.076-15.911,0-21.986L423.511,4.565c-2.913-2.911-6.866-4.55-10.992-4.55 c-4.127,0-8.08,1.639-10.993,4.55l-171.138,171.14L59.25,4.565c-2.913-2.911-6.866-4.55-10.993-4.55 c-4.126,0-8.08,1.639-10.992,4.55L4.558,37.284c-6.077,6.075-6.077,15.909,0,21.986l171.138,171.128L4.575,401.505 c-6.074,6.077-6.074,15.911,0,21.986l32.709,32.719c2.911,2.911,6.865,4.55,10.992,4.55c4.127,0,8.08-1.639,10.994-4.55 l171.117-171.12l171.118,171.12c2.913,2.911,6.866,4.55,10.993,4.55c4.128,0,8.081-1.639,10.992-4.55l32.709-32.719 c6.074-6.075,6.074-15.909,0-21.986L285.08,230.397z">
                    </path>
                </g>
            </svg>
        </div>
        <div class="modalMainAddBook flex-center-col">
            <div>
                <label for="Titulo"><strong>Titulo:</strong></label>
                <input type="text" name="title" class="form-control" id="title">
            </div>
            <div>
                <label for="Titulo"><strong>Descrição:</strong></label>
                <input type="text" name="description" id="description">
            </div>
            <div>
                <label for="Titulo"><strong>Url da Imagem:</strong></label>
                <input type="url" name="url" id="url">
            </div>
        </div>
        <div class="modalFooterAddBook">
            <button onclick="fecharModal('addBookShow')">Cancelar</button>
            <button id="addBook">Confirmar</button>
        </div>
    </div>
    <div class="modalRemoverFavorito">
        <svg onclick="fecharModal('rmBookShow')" fill="#000" height="200px" width="200px" version="1.1"
            id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 0 460.775 460.775" xml:space="preserve" stroke="#ffffff">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path
                    d="M285.08,230.397L456.218,59.27c6.076-6.077,6.076-15.911,0-21.986L423.511,4.565c-2.913-2.911-6.866-4.55-10.992-4.55 c-4.127,0-8.08,1.639-10.993,4.55l-171.138,171.14L59.25,4.565c-2.913-2.911-6.866-4.55-10.993-4.55 c-4.126,0-8.08,1.639-10.992,4.55L4.558,37.284c-6.077,6.075-6.077,15.909,0,21.986l171.138,171.128L4.575,401.505 c-6.074,6.077-6.074,15.911,0,21.986l32.709,32.719c2.911,2.911,6.865,4.55,10.992,4.55c4.127,0,8.08-1.639,10.994-4.55 l171.117-171.12l171.118,171.12c2.913,2.911,6.866,4.55,10.993,4.55c4.128,0,8.081-1.639,10.992-4.55l32.709-32.719 c6.074-6.075,6.074-15.909,0-21.986L285.08,230.397z">
                </path>
            </g>
        </svg>
        <div class="modalMainRemoveFavorite">
            <h2>Deseja excluir o livro <span id="rmFavoriteTitle"></span> ?</h2>
        </div>
        <input type="hidden" id="rmFavoriteID" value="">
        <div class="modalFooterRemoveFavorite">
            <button onclick="fecharModal('rmBookShow')">Cancelar</button>
            <button id="addBook" onclick="confirmarRMFavorite()">Confirmar</button>
        </div>
    </div>
    <header class="flex-center-col">
        <h1>Biblioteca de livros</h1>
    </header>
    <main class="flex-center-col">
        <div class="containner">
            <div id="favoritos">
                <button>Favoritos</button>
            </div>
            <section>
                @foreach ($books as $book)
                    <div class="book">
                        <figure
                            style="background-image: url(' {{ $book->url }}');background-size: cover; background-repeat: none; ">
                            @if ($book->favorite == 0)
                                <svg onclick="alertRemoverFavoritar(1, {{ $book->id }}, '{{ $book->title }}')"
                                    class="favorite-status"
                                    style="fill:#ff3c3c;fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"
                                    version="1.1" viewBox="0 0 32 32" width="100%" xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="Icon">
                                        <path
                                            d="M16.004,6.576c-2.941,-2.289 -7.202,-2.083 -9.905,0.619c-2.927,2.927 -2.927,7.68 -0,10.607c-0,0 9.192,9.192 9.192,9.192c0.391,0.391 1.024,0.391 1.415,0l9.192,-9.192c2.927,-2.927 2.927,-7.68 -0,-10.607c-2.69,-2.69 -6.951,-2.88 -9.894,-0.619Zm-0.004,2.328c-0,-0 -0,-0 0,-0c0.438,-0.008 0.667,-0.258 0.703,-0.289c2.355,-2.05 5.641,-2.145 7.781,-0.005c2.146,2.146 2.146,5.631 -0,7.778c-0,-0 -8.486,8.485 -8.486,8.485c0,0 -8.485,-8.485 -8.485,-8.485c-2.146,-2.147 -2.146,-5.632 0,-7.778c2.147,-2.147 5.633,-2.146 7.78,0.001c0.187,0.187 0.442,0.293 0.707,0.293Z" />
                                    </g>
                                </svg>
                            @else
                                <svg onclick="alertRemoverFavoritar(0,{{ $book->id }}, '{{ $book->title }}')"
                                    class="favorite-status" enable-background="new 0 0 12 12" id="Слой_1"
                                    version="1.1" viewBox="0 0 12 12" xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <path
                                        d="M8.5,1C7.5206299,1,6.6352539,1.4022217,6,2.0504761C5.3648071,1.4022827,4.4793701,1,3.5,1  C1.5670166,1,0,2.5670166,0,4.5S2,8,6,11c4-3,6-4.5670166,6-6.5S10.4329834,1,8.5,1z"
                                        fill="#ff3c3c" />
                                </svg>
                            @endif
                        </figure>
                        <div class="dividerBook">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 10 46 46"  xml:space="preserve">
                                <g>
                                    <polygon style="fill:#030104;" points="46,3.004 0,3 23.002,43 	" />
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>

                        </div>
                        <div class="descriptionBook">
                            <h3>{{ $book->title }}</h3>
                            <p>{{ $book->description }}</p>
                        </div>
                    </div>
                @endforeach

                <button id="showModalAddBook">Adicionar</button>
            </section>
        </div>
    </main>

    <script>
        document.querySelector('#showModalAddBook').addEventListener('click', function() {
            document.querySelector('body').classList.add('addBookShow')
        })

        function fecharModal(modal) {
            document.querySelector('body').classList.remove(modal)
        }

        $('#addBook').click(function(event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/api/add_book',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    title: $('#title').val(),
                    description: $('#description').val(),
                    url: $('#url').val()
                },
                success: function(data) {
                    window.location.reload();
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });

        function alertRemoverFavoritar(status, id, title) {
            if (status == 0) {
                $('#rmFavoriteTitle').val(title)
                $('#rmFavoriteID').val(id)
                document.querySelector('body').classList.add('rmBookShow')
            } else {
                favoriteBook(status, id)
            }
        }

        function confirmarRMFavorite() {
            favoriteBook(0, $('#rmFavoriteID').val())
        }

        function favoriteBook(status, id) {
            $.ajax({
                type: 'POST',
                url: '/api/favorite',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    status: status,
                    id: id
                },
                success: function(data) {
                    window.location.reload();
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
    </script>
</body>

</html>
