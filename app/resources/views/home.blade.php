<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Comfica</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('public/assets/css/app.css') }}" rel='stylesheet' />

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
                                <svg onclick="favoriteBook(1, {{ $book->id }})"
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
                                <svg onclick="favoriteBook(0,{{ $book->id }})"
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
                                viewBox="0 10 46 46" xml:space="preserve">
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

                <button onclick="showModalAddBook()" id="showModalAddBook">Adicionar</button>
            </section>
        </div>
    </main>

    <script>
        function showModalAddBook(){
            document.querySelector('body').classList.add('addBookShow')
        }

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

        $('#favoritos button').click(function(e) {
            e.preventDefault();

            if (document.querySelector('section').classList[0] == undefined) {
                document.querySelector('section').classList.add('filtrado')
                $.ajax({
                    type: 'POST',
                    url: '/api/favoritos',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {},
                    success: function(data) {
                        let books = data.map(function(item) {

                            let svg = ``

                            if (item.favorite == 0) {
                                svg = `
                            <svg onclick="favoriteBook(1, ${ item.id })"
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
                            `
                            } else {
                                svg = `
                            <svg onclick="favoriteBook(0,${item.id })"
                                    class="favorite-status" enable-background="new 0 0 12 12" id="Слой_1"
                                    version="1.1" viewBox="0 0 12 12" xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <path
                                        d="M8.5,1C7.5206299,1,6.6352539,1.4022217,6,2.0504761C5.3648071,1.4022827,4.4793701,1,3.5,1  C1.5670166,1,0,2.5670166,0,4.5S2,8,6,11c4-3,6-4.5670166,6-6.5S10.4329834,1,8.5,1z"
                                        fill="#ff3c3c" />
                                </svg>
                            `
                            }

                            return `<div class="book">
                            <figure
                                style="background-image: url(' ${item.url}');background-size: cover; background-repeat: none; ">
                                ${svg}
                            </figure>
                            <div class="dividerBook">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 10 46 46" xml:space="preserve">
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
                                <h3>${ item.title }</h3>
                                <p>${ item.description }</p>
                            </div>
                            </div>`;
                        });

                        document.querySelector('section').innerHTML = books + '<button onclick="showModalAddBook()" id="showModalAddBook">Adicionar</button>'
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }else{
                window.location.reload();
            }

        });

        // Remover cards
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
    </script>
</body>

</html>
