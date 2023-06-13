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
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .book figure img {
            width: 100%;
            border-radius: 10px 10px 0 0;
        }

        .dividerBook {
            height: 0.5rem;
            width: 100%;
            background: black;
        }

        .descriptionBook {
            width: 100%;
            padding: 1rem 2rem;
            display: flex;
            align-items: flex-start;
            flex-direction: column;
            justify-content: center;
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
        }

        body.addBookShow .modalAddBook {
            opacity: 1;
            visibility: visible
        }

        .modalHeader {
            background: #152263;
            width: 100%;
            height: 5rem;
            border-radius: 10px 10px 0 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .modalHeader img {
            position: relative;
            width: 1.5rem;
            left: 38%;
            cursor: pointer;
        }

        .modalMain {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e4e4e4;
            height: calc(100% - 13rem);
            width: 100%
        }

        .modalMain>div {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 1rem 0;
        }

        .modalMain input {
            width: 50rem;
            height: 2.5rem;
            border: none;
            box-shadow: 0px 8px 6px 1px rgb(177, 177, 177);
            border-radius: 10px;
            margin-top: 0.5rem;
            outline: none;
            padding: 1rem;
        }

        .modalMain label {
            font-size: 1.5rem;
        }

        .modalFooter {
            width: 100%;
            height: 8rem;
            background: #e4e4e4;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 2rem
        }


        .modalFooter button {
            border-radius: 10px;
            border: none;
            height: 2.5rem;
            width: 8rem;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
        }

        .modalFooter button:nth-child(1) {
            background: #ff3c3c;
        }

        .modalFooter button:nth-child(2) {
            background: #6b84ff;
            margin-left: 1rem;
        }
    </style>
</head>

<body class="flex-center-col">
    <div class="modalAddBook">
        <div class="modalHeader">
            <h2>Adicionar Livro</h2>
            <img src="/img/delete-x.svg" alt="" class="deleteModalAddBook">
        </div>
        <div class="modalMain flex-center-col">
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
        <div class="modalFooter">
            <button class="deleteModalAddBook">Cancelar</button>
            <button id="addBookConf">Confirmar</button>
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
                <div class="book">
                    <figure>
                        <img src="data:image/jpeg;base64,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"
                            alt="">
                    </figure>
                    <div class="dividerBook"></div>
                    <div class="descriptionBook">
                        <h3>Título</h3>
                        <p>Descrição do Item</p>
                    </div>
                </div>
                <div class="book">
                    <figure>
                        <img src="data:image/jpeg;base64,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"
                            alt="">
                    </figure>
                    <div class="dividerBook"></div>
                    <div class="descriptionBook">
                        <h3>Título</h3>
                        <p>Descrição do Item</p>
                    </div>
                </div>
                <div class="book">
                    <figure>
                        <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAHkAtgMBEQACEQEDEQH/xAAbAAABBQEBAAAAAAAAAAAAAAADAQIEBQYHAP/EADoQAAICAgECBAQDBQYHAQAAAAECAAMEEQUSIQYxQVETMmFxIoGRQnKhscEUIzRSYnMkNUNGstHxFf/EABsBAAEFAQEAAAAAAAAAAAAAAAIAAQMEBgUH/8QANREAAgICAQMCAwUHBAMAAAAAAAECAwQREgUhMRNBIlFhFDJxofAGI4GRscHRFTM0QmLh8f/aAAwDAQACEQMRAD8ArJ6CYM9HQhIhCxCPRDCxCF1FsYk4eDkZj9OPWXI8/pIrLoVrcmS1Uzteook3cLyFXzY7H7d5FHLpl7kksK+PsRr8TIxwDdS6g+pEljbCXhkM6bId5IEtbNvpVjr2G4bkl5AUW/CH1411u/h1O2vPQguyEfLCjVOXhDHRkbTqVP1GoSkn4Baa8jdRDHtRxbEKxbH2HqwMq1Ouqh2X3Akcrq4vTZLGiyS2kTeM4DNz7uj4bVIPNmEgvzK6o73ssUYVtj1rRc5Hge5awabm6/8AUO0pR6tFvui7Lpfbsy64vwbi1Y4GQgss13ZpSv6nNy+EuU9PrjHutskP4N409/gLIv8AUrvmS/YKvkFq8M8dj/LQn6QZZts/LDjiVQ8IjZvh7CsI1Sn6Q4ZdiXkCePW/Y5jNSZUWOhCgbiGHrSxI7eZguSCUWywu45UxviA6PnK8b25aLdmMlDkV2pZKOxQIwx0rwTiUjjamAG2GyfczM9Ssl6jRqenQiqlo0px6280BnNU5I6HFETK4ujIXpZAR7aksMiUHtEc6lLsMx+DxKK+lKlUewEeeXZJ7bGjjwguyDVcfjVjQrUD7QJXTfuEoRSIHJcLjZalCi6P0linKnDuQ248LFpox/iDw1Xx2Mbqie3vOxiZztlxZx8vAjXByiZgDc6pxy78LcWOQ5AfEXddfcg+plDOyPSr7eWdDp+P6tm5eEdPo46iqoKEA0NeUy875Se9mojXGK1oIlFVXygCC5OXkfikEADHeoPgcfrQjBAbH1DUQGyLbZuTRiA2RmbvJEgDj02CMcLHELqMIPXeV128pG4bDja4lj/a1uo+Hv07yv6TjLZc9eM4cSHRjrbl11FtBjrcmnNxg5FSutStUGbynwph2YiqKxsj5vWcCXUbFPyaGPT6XDWi/4TjK+OxVpTyE5+Te7pbZeopVUeKLIiVic9qOI9EIGw7wkDoGy+ohJjaK7lsD+30NXYCQRLFF3pS2iC2pWLTKHhfD9VN7pYgI3695fyc2UopplLHw41trRqMDi8fDYtUgBPsJy7ciVi0zo10xh3RP7CQEwK3vDiAxF7RmOh/UI2hbBWFdGGhmQrfpJokTI7eclQLOR6muMcLEIWIYUCMIJWjudICT7CBJpDxjKT+FEzjKDdyVFbdQPV7e0hvnxqbRYxa3K5KR13Cr6MdR7CZCyW5M18F2JKCRMkQsQ40xxhIhhphIQm9xDChYmxaBLWq29Wu5ht7QOtMlCQkgKw6hRBYBiZIkAxpsIhaG2NNhj6FsYX2I6QzYJjCQwzUIY5CJsDGixhhwEYYsOM4nI5Fv7oALvuxla/JhT5LWPiTv7rwdB4Xw7Ri44DICx8yR5zPZObOcto0mPhwrhrQW/gqVyq76kAZT5gQY5kuDi2G8aKlySL+pdIB7CUG+5ciuw/yjDjTHGGmIQx7ETpDMAWOlBPmfPQgucU0m/I6jJ+EMrsS0E1urgHRKnfeFGcZd4vYMoSj95aHgQmxhd6jC2Dfv5QkMwynQ7wGEhr9xHQmR27SREbBMe8NAnlTqibH0NddR0xmgLA+0LYI0g+0IRyETYGNFEYYIsFjGz8CsfxIR+EHtOL1NGg6W/g0b1W0JwGjubPA7aIXkKDqCEePeIQkQwO2xaUZ7D0qo2T9I0pKKbfgeKcmkjmnJcpk8jY1llr9AcmtN6CD/AOTG5GVbfJuT7b7I22Lh1Y6Siu+u7+Z7iORt43KS+st0b/HWD2cfb3jY2VLGsUl4918xZmLDJrcH59n8jdcjzGLgY6W2MXNg/u0TzaarKzasaClL38fUyOLhW5M3GPbXn6FdheJUysiip6vhmwkMd9gfQCUcbrMbbIQa1vz/AGLuR0iVUJTT3r9P/wBF8CNzuHFFLdokh9gy5ELQOwbMTCSG8iKhPnE2JIMqdI7Qd7C0N6QfOLYtDWrHtH5DaQw1iFyG0cdxsW7JbVKFvtNjOyMF3Zjq6p2P4UafjvDbNjFrk/ER33OXbnLl2OvV09cPiRUZXFXU5LIEPR6GXIZEZR2ULMOUZ6Xg1/grDsx0b4i62dicfqVqm+x2en1OuOma9x27Tjo6jB17DQn4GQcnUAMVTuMIx3jDmrRfZx+PtFUAWMG+bY3rX6d5n+p5slJ0w7fM0PSsGLirp/wMyeU5BMO2gZNr1MNMjsWGvznNjk28XW5PTOx9koc1ZxSkiPTctq7Xt7j2laUXEtaCM4SpmP7I/rA1uSQL8nq8m/JHXkuW6VCqD+yo8hJb5ynpN712BjVCvfFa33JCjsN7lX3GZr+L8RY2S/wb1/s7AHTO46dD6n1mtw+sVWfDZ8P1b7fzMtl9HtqXOD5fRLuXfUNbB2D5ETtRfJbRx2tPQwjcNMEfXXBbHSC9GoOwtDWEdC0J0xbG0MbtCQwJm1CSG2Y3wWlTUAuoBna6i3y7HJ6cl6aNiAipoATi99nV0iM2DVa/UVBkqulFaAdaZNx6FoACgaEhnNyJIxSJPV2kWg9iLoRDjXffYR0gWzyvqO0LZzrxJk4uRy9tmMzFW119SkaYdj5+nYTHdQlCd7lX7/1Np02uyGOo2L/4VgVW8joyj4OiA18N+vt2+bUkb5IkjJSWgWRlo9KBT1Gy74aj3O9H9NH9I8KmpPfstldXRWn83r/JOqKhN+YHp7mQNNskb5MOpbW3Gt+kilrfYB69hdDcHuxmb3jL3twMdriC7ID2Gu3pPQcGU540Jz8tGFzFGGROMfCZPTREsMgQRdCAwhdxIQxo4ww2AQuI2wFlkOMQGwBckyVIHZk+P/4KzpQaWdW394u5z6v3fZGgx8z4h7mUJ1aLcZ7LSkjXaVJInQeAEOWMOh0YcYRHQzGiEMc78WYbY/KuxrStbPxVGsdiPt7zHdQqlTkPstPwbXpVytxlp7a8lMAyjZYASpyXyOk1oi5/IHFXqtpBTXzG5VYj6A+clrpU/uv8ijdk+lLuvzSKJeQU54uWlrMeu2yxF7AksAB9vX9ZcdX7vi3ptJfyOJ/qSeQpJbSba/itf5L/AIvJFji7Iyq3sHYVVN+Gof1P1MpX16jxgu39f8Hbxudq5Np/ReEXeLrJIWgF2PkF7mUPRsclBLbZPZJVLc3pFpTweS7A3Bal332dn+E6+N0HKm16nwr8zkX9axoJqHdmjq1UionZVAAH0m1rqjXBQj4XYyk7HOTnLyyXTbBlESZIV+qRuOg0x5YARkh2R7LJIogbIr2HclSAbGM2xHSGFrO9xMSM1ZfSbCAZ04wloouUdk3BNTNpW7yC3kvJNDT8F9jDQlCZZiSxIiQcDBHF3ELYhMQhp1HGIPKcVi8pUqZCkMnyup0VlTKw6smOpr+JcxM23Fk3X7+xjOZ4/G4+1sbHstvuHzMwAVfp7kzMZmPRjS4KTcjVYWXdkwVkklF/xb/winycBL62Dtp21t1A3qU4XuL7FuyKlHS7b9/coBw1D2ZRpLVJ8XoTR3067fznQeRJceXdnKr6ZTNymu3fS/X4ljgYTWUVWPi1jIrUdZCeR8vP2kFs3uXFtxL9VSUYzkkpa/Ms8bGCnrbQb6ekpO+S+6y1Kb1pl9xVfLMnXTl7o/ZXIHWD9jvYmk6TPPujyUtR+vff9zO9Tl0+D4zh8X/j2a/sX6dXQvxCOrXfp8tzTw3x+LyZiXHb14Cq2o7QweqzvI5RCTDFiwgJaCBOIaBI7D8UkQPuIy9oyY46tT3ibEjlVuXZY3UDqaqNSSMjO+UnsvfDzXKwYkn7yjlqPg6mC5a7m2wsgldNOJZA7EZFgrhh2ldrRKmPAJgjj+mNsfQjRxgTsRCS2Mz1ZLRpISIjcJgvlvk2VfEd+5Dkkb+05sum40rXbJbb+fg6C6jkxrVcZaSPZHF8VTjO2RiU/CrUszEdwPM9/OJ4GLCD+Ba/AZZ+Vy2ps5bRURTor0k7cj2JO/6zMWSTmzZYcX9mjy8vv/N7J+DmPhZSZVG+qs/iH+Yeo/MR8fIePYpofLx45FTql7m7yONwcgi18dCT32Pw7++prZ9OxbnznBb/AJf08mIhn5VK4Rm/1+OwqUqihUUBQNAAeU6EIxrioxWkinKTnJyk9tkPlMpOPpFrgts9IAlPqGesStT1tsuYGC8uxx3pIqj4gHwiRj6t9AW/DOI/2hsdelD4vyOyugQ9TvL4STxHNplZS0W19Dn5SDsH6S1g9ad81XatN+CvndG9Gt21vsjUIo6J12+5xAF41JYgshWN3kyRGwfxTsbhcUNsk1uNSKSDTOVNitWoZpq1Yn2MnKhxW2aTg70ULsTm5MGdfFmtI1FVlbKCJy5RaOimg9eSqN3kbr2EpInV3giQOBKmENo1B4j7BtbowuI2xpcP5QtaG8haV1AkwkiQewkRIZ/mbf8A9LNTh6z/AHQ1ZmsPRP2U+7fykU07H6f8/wBfUbloDyHBYeXkHIQmi0/N091b8pTzOjV5Dcovizo4vWLaIcJfEvzIqeG8ddiy9m3ruo1K9X7PxX357/XcsWden/0jr8S7DdtTRqOkcBvb2x6xMRR+K1c4lRHyB/xfp2me6/GXCEl42aDoEoqcl7mTZullDH7CZheDVewai1KHBQdd29gDsB9dx/D5Ec4ymtPsjdeHL7buKR7mLMSe59Rua7pM52YylP6mP6rCEMlqHyJl57TrwOXIr7TomWERMAWEIEMjjUBoJM5vdmLcAutTTRqcTMWZCktFvxi7qBQb7Snc+/c6NC+HsW2GMr4mipAlSzhotQ577ll8NyQTvcrckT6ZPp2qDZ8pXl5JUON2vWNxH5AbcgAecOMAXMHj5i/E0TCnW9Axmi0rvB9ZVlAnjIj8zy6cbgPf0fEtJC1VDzsc+SyGfwLYfIhcVjNhYur3+JlWsbMiz/M5/oPIfaS01cV38gNkkvJ9AbGl4WhtiBotC2ezMqzGxHtpRHZe5Dt0jX3lLMslTU5xXj5l3Bphfcq5NrfyMd4h5d8hyEvSyrp+Wo/hU/UnzmTzcizIn3ltfI2WDhQxq98dP6mHfnL2zVprXr126vv7f+46xIqHJlSzqM1d6cVs02H3rBAC78x5n9ZzLGk9HY3uKOheH8k38VWzgDo2vYa8prukWysxk2vHYxnVqlXkvXuUS+NsS7nW41qmrr6vhra3bb+0sY2ZzscJrXyObYkvBcZRIRio2wGwPedVEDIq2B0V0O1YbEkBCK0ZiOYAzVmRL/gORSn8Fvp6zn5VDl3R08PIjH4ZGnq5XH1+EicuWPM6quiGHJ1N5EQfQkF6yI2fyvwKiwPlJKsfkyO2/hHZUt4jQJvq2ZbWC9lN58EvJCyPEDvrpBk8MJLyV59Q34QuDyztcOptRrcZJD0ZjlLTNdhZnXUDv0nItr0zsQntFVReeX5x8ljvF48mun2a0j8TfkOw/OU4x9SzftH+pI3pF2bZZ4jchpsj8RtiB4tCTHdcbQ44lLUKWKHQ+asNgyOyqFkeMltElVs6pcoPTMt4pxsUX0049aVkjdoQa7ekx/V1RVao1LuvJtejW5FlEp3Pafgoxx2Nbd8Q1jQXpGu05DvsjHWzozoqb5NdzRYXAucauxchOlx7fw+86GN0qzMgrISRzMnq9ePL05xfY1PHY6Y2GlCd1UdyfWanExVi0qtPejL5eS8m52Na2VXJ+FuMzMtM0KasmtutCnYdXuR6w/s1bs9TXcqvx2JFWQbutLV6L6+1ien0I+hlxEeyv4zYsy8Yt1Gi49P7rDqA/jr8o0J7bT9gUTqyDc1YGyqgt9N+X8jC2F7nMRNaZAcDqIQVMm1PlcwHXFhqycfDDryV49ZG6IEv2qwflci99XQfXzjQoUXsVuTKyOiDuTlUTcQhyMVYERmtoddns0N/JXY3GpXj98zJPwqF/wBR9fsB3mfzpcO0fvPsjSYu3Hb8FxxmMvH4VWLWSRWvdv8AMfMk/cyKqqMIKKJ3LYf4zBu8l4oHY8W79YPEfkPWyC4hJhA8HQWxQ+o2hEbKw8XIvS+6sGxfX3+8p29Ox7pc5x7l2nqOTTBwhLsQ8zCouv8AiglB6qo7GczK/Z+N13OMtJ+UdLG69KqnhNba9yz465QvwCv915qPY+86kcOONWlSta/M5FuVPIm5We5afINQk+XcHWgdtqqNsdD1haG2VF3KcScwGzNoW1dpsOO30Mr2ZVUHrmtr6gpx2UGLyi4/jHKxurqryyvSV7jqCjXl+cr05K+2ShvtJLQHuXNeclJuud60Fth01j63rsNfp/GXIWprk3pD70c/E2hkRYhHhEJixDHh5H7xCZ6IR6IQq/MPvGYl5Lj/ALi4f/at/pMzl/8AKj+DNLj/AOyapfX7yQlBP5wkCxi+cJgh185Gw0FEENCmMOxreUQwB4QPuFw/nWBMKPkuv+kn2lGH3mWf+qImd/h7f3ZN7EbMD4j/AMWv7g/lM91nyRryVvF/8y4//dlLp/8Ayofr2ZJ7IleJPlwv3H/8pY6n/t1fgwX5P//Z"
                            alt="">
                    </figure>
                    <div class="dividerBook"></div>
                    <div class="descriptionBook">
                        <h3>Título</h3>
                        <p>Descrição do Item</p>
                    </div>
                </div>
                <div class="book">
                    <figure>
                        <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAHkAtgMBEQACEQEDEQH/xAAbAAABBQEBAAAAAAAAAAAAAAADAQIEBQYHAP/EADoQAAICAgECBAQDBQYHAQAAAAECAAMEEQUSIQYxQVETMmFxIoGRQnKhscEUIzRSYnMkNUNGstHxFf/EABsBAAEFAQEAAAAAAAAAAAAAAAIAAQMEBgUH/8QANREAAgICAQMCAwUHBAMAAAAAAAECAwQREgUhMRNBIlFhFDJxofAGI4GRscHRFTM0QmLh8f/aAAwDAQACEQMRAD8ArJ6CYM9HQhIhCxCPRDCxCF1FsYk4eDkZj9OPWXI8/pIrLoVrcmS1Uzteook3cLyFXzY7H7d5FHLpl7kksK+PsRr8TIxwDdS6g+pEljbCXhkM6bId5IEtbNvpVjr2G4bkl5AUW/CH1411u/h1O2vPQguyEfLCjVOXhDHRkbTqVP1GoSkn4Baa8jdRDHtRxbEKxbH2HqwMq1Ouqh2X3Akcrq4vTZLGiyS2kTeM4DNz7uj4bVIPNmEgvzK6o73ssUYVtj1rRc5Hge5awabm6/8AUO0pR6tFvui7Lpfbsy64vwbi1Y4GQgss13ZpSv6nNy+EuU9PrjHutskP4N409/gLIv8AUrvmS/YKvkFq8M8dj/LQn6QZZts/LDjiVQ8IjZvh7CsI1Sn6Q4ZdiXkCePW/Y5jNSZUWOhCgbiGHrSxI7eZguSCUWywu45UxviA6PnK8b25aLdmMlDkV2pZKOxQIwx0rwTiUjjamAG2GyfczM9Ssl6jRqenQiqlo0px6280BnNU5I6HFETK4ujIXpZAR7aksMiUHtEc6lLsMx+DxKK+lKlUewEeeXZJ7bGjjwguyDVcfjVjQrUD7QJXTfuEoRSIHJcLjZalCi6P0linKnDuQ248LFpox/iDw1Xx2Mbqie3vOxiZztlxZx8vAjXByiZgDc6pxy78LcWOQ5AfEXddfcg+plDOyPSr7eWdDp+P6tm5eEdPo46iqoKEA0NeUy875Se9mojXGK1oIlFVXygCC5OXkfikEADHeoPgcfrQjBAbH1DUQGyLbZuTRiA2RmbvJEgDj02CMcLHELqMIPXeV128pG4bDja4lj/a1uo+Hv07yv6TjLZc9eM4cSHRjrbl11FtBjrcmnNxg5FSutStUGbynwph2YiqKxsj5vWcCXUbFPyaGPT6XDWi/4TjK+OxVpTyE5+Te7pbZeopVUeKLIiVic9qOI9EIGw7wkDoGy+ohJjaK7lsD+30NXYCQRLFF3pS2iC2pWLTKHhfD9VN7pYgI3695fyc2UopplLHw41trRqMDi8fDYtUgBPsJy7ciVi0zo10xh3RP7CQEwK3vDiAxF7RmOh/UI2hbBWFdGGhmQrfpJokTI7eclQLOR6muMcLEIWIYUCMIJWjudICT7CBJpDxjKT+FEzjKDdyVFbdQPV7e0hvnxqbRYxa3K5KR13Cr6MdR7CZCyW5M18F2JKCRMkQsQ40xxhIhhphIQm9xDChYmxaBLWq29Wu5ht7QOtMlCQkgKw6hRBYBiZIkAxpsIhaG2NNhj6FsYX2I6QzYJjCQwzUIY5CJsDGixhhwEYYsOM4nI5Fv7oALvuxla/JhT5LWPiTv7rwdB4Xw7Ri44DICx8yR5zPZObOcto0mPhwrhrQW/gqVyq76kAZT5gQY5kuDi2G8aKlySL+pdIB7CUG+5ciuw/yjDjTHGGmIQx7ETpDMAWOlBPmfPQgucU0m/I6jJ+EMrsS0E1urgHRKnfeFGcZd4vYMoSj95aHgQmxhd6jC2Dfv5QkMwynQ7wGEhr9xHQmR27SREbBMe8NAnlTqibH0NddR0xmgLA+0LYI0g+0IRyETYGNFEYYIsFjGz8CsfxIR+EHtOL1NGg6W/g0b1W0JwGjubPA7aIXkKDqCEePeIQkQwO2xaUZ7D0qo2T9I0pKKbfgeKcmkjmnJcpk8jY1llr9AcmtN6CD/AOTG5GVbfJuT7b7I22Lh1Y6Siu+u7+Z7iORt43KS+st0b/HWD2cfb3jY2VLGsUl4918xZmLDJrcH59n8jdcjzGLgY6W2MXNg/u0TzaarKzasaClL38fUyOLhW5M3GPbXn6FdheJUysiip6vhmwkMd9gfQCUcbrMbbIQa1vz/AGLuR0iVUJTT3r9P/wBF8CNzuHFFLdokh9gy5ELQOwbMTCSG8iKhPnE2JIMqdI7Qd7C0N6QfOLYtDWrHtH5DaQw1iFyG0cdxsW7JbVKFvtNjOyMF3Zjq6p2P4UafjvDbNjFrk/ER33OXbnLl2OvV09cPiRUZXFXU5LIEPR6GXIZEZR2ULMOUZ6Xg1/grDsx0b4i62dicfqVqm+x2en1OuOma9x27Tjo6jB17DQn4GQcnUAMVTuMIx3jDmrRfZx+PtFUAWMG+bY3rX6d5n+p5slJ0w7fM0PSsGLirp/wMyeU5BMO2gZNr1MNMjsWGvznNjk28XW5PTOx9koc1ZxSkiPTctq7Xt7j2laUXEtaCM4SpmP7I/rA1uSQL8nq8m/JHXkuW6VCqD+yo8hJb5ynpN712BjVCvfFa33JCjsN7lX3GZr+L8RY2S/wb1/s7AHTO46dD6n1mtw+sVWfDZ8P1b7fzMtl9HtqXOD5fRLuXfUNbB2D5ETtRfJbRx2tPQwjcNMEfXXBbHSC9GoOwtDWEdC0J0xbG0MbtCQwJm1CSG2Y3wWlTUAuoBna6i3y7HJ6cl6aNiAipoATi99nV0iM2DVa/UVBkqulFaAdaZNx6FoACgaEhnNyJIxSJPV2kWg9iLoRDjXffYR0gWzyvqO0LZzrxJk4uRy9tmMzFW119SkaYdj5+nYTHdQlCd7lX7/1Np02uyGOo2L/4VgVW8joyj4OiA18N+vt2+bUkb5IkjJSWgWRlo9KBT1Gy74aj3O9H9NH9I8KmpPfstldXRWn83r/JOqKhN+YHp7mQNNskb5MOpbW3Gt+kilrfYB69hdDcHuxmb3jL3twMdriC7ID2Gu3pPQcGU540Jz8tGFzFGGROMfCZPTREsMgQRdCAwhdxIQxo4ww2AQuI2wFlkOMQGwBckyVIHZk+P/4KzpQaWdW394u5z6v3fZGgx8z4h7mUJ1aLcZ7LSkjXaVJInQeAEOWMOh0YcYRHQzGiEMc78WYbY/KuxrStbPxVGsdiPt7zHdQqlTkPstPwbXpVytxlp7a8lMAyjZYASpyXyOk1oi5/IHFXqtpBTXzG5VYj6A+clrpU/uv8ijdk+lLuvzSKJeQU54uWlrMeu2yxF7AksAB9vX9ZcdX7vi3ptJfyOJ/qSeQpJbSba/itf5L/AIvJFji7Iyq3sHYVVN+Gof1P1MpX16jxgu39f8Hbxudq5Np/ReEXeLrJIWgF2PkF7mUPRsclBLbZPZJVLc3pFpTweS7A3Bal332dn+E6+N0HKm16nwr8zkX9axoJqHdmjq1UionZVAAH0m1rqjXBQj4XYyk7HOTnLyyXTbBlESZIV+qRuOg0x5YARkh2R7LJIogbIr2HclSAbGM2xHSGFrO9xMSM1ZfSbCAZ04wloouUdk3BNTNpW7yC3kvJNDT8F9jDQlCZZiSxIiQcDBHF3ELYhMQhp1HGIPKcVi8pUqZCkMnyup0VlTKw6smOpr+JcxM23Fk3X7+xjOZ4/G4+1sbHstvuHzMwAVfp7kzMZmPRjS4KTcjVYWXdkwVkklF/xb/winycBL62Dtp21t1A3qU4XuL7FuyKlHS7b9/coBw1D2ZRpLVJ8XoTR3067fznQeRJceXdnKr6ZTNymu3fS/X4ljgYTWUVWPi1jIrUdZCeR8vP2kFs3uXFtxL9VSUYzkkpa/Ms8bGCnrbQb6ekpO+S+6y1Kb1pl9xVfLMnXTl7o/ZXIHWD9jvYmk6TPPujyUtR+vff9zO9Tl0+D4zh8X/j2a/sX6dXQvxCOrXfp8tzTw3x+LyZiXHb14Cq2o7QweqzvI5RCTDFiwgJaCBOIaBI7D8UkQPuIy9oyY46tT3ibEjlVuXZY3UDqaqNSSMjO+UnsvfDzXKwYkn7yjlqPg6mC5a7m2wsgldNOJZA7EZFgrhh2ldrRKmPAJgjj+mNsfQjRxgTsRCS2Mz1ZLRpISIjcJgvlvk2VfEd+5Dkkb+05sum40rXbJbb+fg6C6jkxrVcZaSPZHF8VTjO2RiU/CrUszEdwPM9/OJ4GLCD+Ba/AZZ+Vy2ps5bRURTor0k7cj2JO/6zMWSTmzZYcX9mjy8vv/N7J+DmPhZSZVG+qs/iH+Yeo/MR8fIePYpofLx45FTql7m7yONwcgi18dCT32Pw7++prZ9OxbnznBb/AJf08mIhn5VK4Rm/1+OwqUqihUUBQNAAeU6EIxrioxWkinKTnJyk9tkPlMpOPpFrgts9IAlPqGesStT1tsuYGC8uxx3pIqj4gHwiRj6t9AW/DOI/2hsdelD4vyOyugQ9TvL4STxHNplZS0W19Dn5SDsH6S1g9ad81XatN+CvndG9Gt21vsjUIo6J12+5xAF41JYgshWN3kyRGwfxTsbhcUNsk1uNSKSDTOVNitWoZpq1Yn2MnKhxW2aTg70ULsTm5MGdfFmtI1FVlbKCJy5RaOimg9eSqN3kbr2EpInV3giQOBKmENo1B4j7BtbowuI2xpcP5QtaG8haV1AkwkiQewkRIZ/mbf8A9LNTh6z/AHQ1ZmsPRP2U+7fykU07H6f8/wBfUbloDyHBYeXkHIQmi0/N091b8pTzOjV5Dcovizo4vWLaIcJfEvzIqeG8ddiy9m3ruo1K9X7PxX357/XcsWden/0jr8S7DdtTRqOkcBvb2x6xMRR+K1c4lRHyB/xfp2me6/GXCEl42aDoEoqcl7mTZullDH7CZheDVewai1KHBQdd29gDsB9dx/D5Ec4ymtPsjdeHL7buKR7mLMSe59Rua7pM52YylP6mP6rCEMlqHyJl57TrwOXIr7TomWERMAWEIEMjjUBoJM5vdmLcAutTTRqcTMWZCktFvxi7qBQb7Snc+/c6NC+HsW2GMr4mipAlSzhotQ577ll8NyQTvcrckT6ZPp2qDZ8pXl5JUON2vWNxH5AbcgAecOMAXMHj5i/E0TCnW9Axmi0rvB9ZVlAnjIj8zy6cbgPf0fEtJC1VDzsc+SyGfwLYfIhcVjNhYur3+JlWsbMiz/M5/oPIfaS01cV38gNkkvJ9AbGl4WhtiBotC2ezMqzGxHtpRHZe5Dt0jX3lLMslTU5xXj5l3Bphfcq5NrfyMd4h5d8hyEvSyrp+Wo/hU/UnzmTzcizIn3ltfI2WDhQxq98dP6mHfnL2zVprXr126vv7f+46xIqHJlSzqM1d6cVs02H3rBAC78x5n9ZzLGk9HY3uKOheH8k38VWzgDo2vYa8prukWysxk2vHYxnVqlXkvXuUS+NsS7nW41qmrr6vhra3bb+0sY2ZzscJrXyObYkvBcZRIRio2wGwPedVEDIq2B0V0O1YbEkBCK0ZiOYAzVmRL/gORSn8Fvp6zn5VDl3R08PIjH4ZGnq5XH1+EicuWPM6quiGHJ1N5EQfQkF6yI2fyvwKiwPlJKsfkyO2/hHZUt4jQJvq2ZbWC9lN58EvJCyPEDvrpBk8MJLyV59Q34QuDyztcOptRrcZJD0ZjlLTNdhZnXUDv0nItr0zsQntFVReeX5x8ljvF48mun2a0j8TfkOw/OU4x9SzftH+pI3pF2bZZ4jchpsj8RtiB4tCTHdcbQ44lLUKWKHQ+asNgyOyqFkeMltElVs6pcoPTMt4pxsUX0049aVkjdoQa7ekx/V1RVao1LuvJtejW5FlEp3Pafgoxx2Nbd8Q1jQXpGu05DvsjHWzozoqb5NdzRYXAucauxchOlx7fw+86GN0qzMgrISRzMnq9ePL05xfY1PHY6Y2GlCd1UdyfWanExVi0qtPejL5eS8m52Na2VXJ+FuMzMtM0KasmtutCnYdXuR6w/s1bs9TXcqvx2JFWQbutLV6L6+1ien0I+hlxEeyv4zYsy8Yt1Gi49P7rDqA/jr8o0J7bT9gUTqyDc1YGyqgt9N+X8jC2F7nMRNaZAcDqIQVMm1PlcwHXFhqycfDDryV49ZG6IEv2qwflci99XQfXzjQoUXsVuTKyOiDuTlUTcQhyMVYERmtoddns0N/JXY3GpXj98zJPwqF/wBR9fsB3mfzpcO0fvPsjSYu3Hb8FxxmMvH4VWLWSRWvdv8AMfMk/cyKqqMIKKJ3LYf4zBu8l4oHY8W79YPEfkPWyC4hJhA8HQWxQ+o2hEbKw8XIvS+6sGxfX3+8p29Ox7pc5x7l2nqOTTBwhLsQ8zCouv8AiglB6qo7GczK/Z+N13OMtJ+UdLG69KqnhNba9yz465QvwCv915qPY+86kcOONWlSta/M5FuVPIm5We5afINQk+XcHWgdtqqNsdD1haG2VF3KcScwGzNoW1dpsOO30Mr2ZVUHrmtr6gpx2UGLyi4/jHKxurqryyvSV7jqCjXl+cr05K+2ShvtJLQHuXNeclJuud60Fth01j63rsNfp/GXIWprk3pD70c/E2hkRYhHhEJixDHh5H7xCZ6IR6IQq/MPvGYl5Lj/ALi4f/at/pMzl/8AKj+DNLj/AOyapfX7yQlBP5wkCxi+cJgh185Gw0FEENCmMOxreUQwB4QPuFw/nWBMKPkuv+kn2lGH3mWf+qImd/h7f3ZN7EbMD4j/AMWv7g/lM91nyRryVvF/8y4//dlLp/8Ayofr2ZJ7IleJPlwv3H/8pY6n/t1fgwX5P//Z"
                            alt="">
                    </figure>
                    <div class="dividerBook"></div>
                    <div class="descriptionBook">
                        <h3>Título</h3>
                        <p>Descrição do Item</p>
                    </div>
                </div>
                <div class="book">
                    <figure>
                        <img src="data:image/jpeg;base64,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"
                            alt="">
                    </figure>
                    <div class="dividerBook"></div>
                    <div class="descriptionBook">
                        <h3>Título</h3>
                        <p>Descrição do Item</p>
                    </div>
                </div>
                <div class="book">
                    <figure>
                        <img src="data:image/jpeg;base64,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"
                            alt="">
                    </figure>
                    <div class="dividerBook"></div>
                    <div class="descriptionBook">
                        <h3>Título</h3>
                        <p>Descrição do Item</p>
                    </div>
                </div>
                <div class="book">
                    <figure>
                        <img src="data:image/jpeg;base64,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"
                            alt="">
                    </figure>
                    <div class="dividerBook"></div>
                    <div class="descriptionBook">
                        <h3>Título</h3>
                        <p>Descrição do Item</p>
                    </div>
                </div>
                <div class="book">
                    <figure>
                        <img src="data:image/jpeg;base64,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"
                            alt="">
                    </figure>
                    <div class="dividerBook"></div>
                    <div class="descriptionBook">
                        <h3>Título</h3>
                        <p>Descrição do Item</p>
                    </div>
                </div>
                <div class="book">
                    <figure>
                        <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAHkAtgMBEQACEQEDEQH/xAAbAAABBQEBAAAAAAAAAAAAAAADAQIEBQYHAP/EADoQAAICAgECBAQDBQYHAQAAAAECAAMEEQUSIQYxQVETMmFxIoGRQnKhscEUIzRSYnMkNUNGstHxFf/EABsBAAEFAQEAAAAAAAAAAAAAAAIAAQMEBgUH/8QANREAAgICAQMCAwUHBAMAAAAAAAECAwQREgUhMRNBIlFhFDJxofAGI4GRscHRFTM0QmLh8f/aAAwDAQACEQMRAD8ArJ6CYM9HQhIhCxCPRDCxCF1FsYk4eDkZj9OPWXI8/pIrLoVrcmS1Uzteook3cLyFXzY7H7d5FHLpl7kksK+PsRr8TIxwDdS6g+pEljbCXhkM6bId5IEtbNvpVjr2G4bkl5AUW/CH1411u/h1O2vPQguyEfLCjVOXhDHRkbTqVP1GoSkn4Baa8jdRDHtRxbEKxbH2HqwMq1Ouqh2X3Akcrq4vTZLGiyS2kTeM4DNz7uj4bVIPNmEgvzK6o73ssUYVtj1rRc5Hge5awabm6/8AUO0pR6tFvui7Lpfbsy64vwbi1Y4GQgss13ZpSv6nNy+EuU9PrjHutskP4N409/gLIv8AUrvmS/YKvkFq8M8dj/LQn6QZZts/LDjiVQ8IjZvh7CsI1Sn6Q4ZdiXkCePW/Y5jNSZUWOhCgbiGHrSxI7eZguSCUWywu45UxviA6PnK8b25aLdmMlDkV2pZKOxQIwx0rwTiUjjamAG2GyfczM9Ssl6jRqenQiqlo0px6280BnNU5I6HFETK4ujIXpZAR7aksMiUHtEc6lLsMx+DxKK+lKlUewEeeXZJ7bGjjwguyDVcfjVjQrUD7QJXTfuEoRSIHJcLjZalCi6P0linKnDuQ248LFpox/iDw1Xx2Mbqie3vOxiZztlxZx8vAjXByiZgDc6pxy78LcWOQ5AfEXddfcg+plDOyPSr7eWdDp+P6tm5eEdPo46iqoKEA0NeUy875Se9mojXGK1oIlFVXygCC5OXkfikEADHeoPgcfrQjBAbH1DUQGyLbZuTRiA2RmbvJEgDj02CMcLHELqMIPXeV128pG4bDja4lj/a1uo+Hv07yv6TjLZc9eM4cSHRjrbl11FtBjrcmnNxg5FSutStUGbynwph2YiqKxsj5vWcCXUbFPyaGPT6XDWi/4TjK+OxVpTyE5+Te7pbZeopVUeKLIiVic9qOI9EIGw7wkDoGy+ohJjaK7lsD+30NXYCQRLFF3pS2iC2pWLTKHhfD9VN7pYgI3695fyc2UopplLHw41trRqMDi8fDYtUgBPsJy7ciVi0zo10xh3RP7CQEwK3vDiAxF7RmOh/UI2hbBWFdGGhmQrfpJokTI7eclQLOR6muMcLEIWIYUCMIJWjudICT7CBJpDxjKT+FEzjKDdyVFbdQPV7e0hvnxqbRYxa3K5KR13Cr6MdR7CZCyW5M18F2JKCRMkQsQ40xxhIhhphIQm9xDChYmxaBLWq29Wu5ht7QOtMlCQkgKw6hRBYBiZIkAxpsIhaG2NNhj6FsYX2I6QzYJjCQwzUIY5CJsDGixhhwEYYsOM4nI5Fv7oALvuxla/JhT5LWPiTv7rwdB4Xw7Ri44DICx8yR5zPZObOcto0mPhwrhrQW/gqVyq76kAZT5gQY5kuDi2G8aKlySL+pdIB7CUG+5ciuw/yjDjTHGGmIQx7ETpDMAWOlBPmfPQgucU0m/I6jJ+EMrsS0E1urgHRKnfeFGcZd4vYMoSj95aHgQmxhd6jC2Dfv5QkMwynQ7wGEhr9xHQmR27SREbBMe8NAnlTqibH0NddR0xmgLA+0LYI0g+0IRyETYGNFEYYIsFjGz8CsfxIR+EHtOL1NGg6W/g0b1W0JwGjubPA7aIXkKDqCEePeIQkQwO2xaUZ7D0qo2T9I0pKKbfgeKcmkjmnJcpk8jY1llr9AcmtN6CD/AOTG5GVbfJuT7b7I22Lh1Y6Siu+u7+Z7iORt43KS+st0b/HWD2cfb3jY2VLGsUl4918xZmLDJrcH59n8jdcjzGLgY6W2MXNg/u0TzaarKzasaClL38fUyOLhW5M3GPbXn6FdheJUysiip6vhmwkMd9gfQCUcbrMbbIQa1vz/AGLuR0iVUJTT3r9P/wBF8CNzuHFFLdokh9gy5ELQOwbMTCSG8iKhPnE2JIMqdI7Qd7C0N6QfOLYtDWrHtH5DaQw1iFyG0cdxsW7JbVKFvtNjOyMF3Zjq6p2P4UafjvDbNjFrk/ER33OXbnLl2OvV09cPiRUZXFXU5LIEPR6GXIZEZR2ULMOUZ6Xg1/grDsx0b4i62dicfqVqm+x2en1OuOma9x27Tjo6jB17DQn4GQcnUAMVTuMIx3jDmrRfZx+PtFUAWMG+bY3rX6d5n+p5slJ0w7fM0PSsGLirp/wMyeU5BMO2gZNr1MNMjsWGvznNjk28XW5PTOx9koc1ZxSkiPTctq7Xt7j2laUXEtaCM4SpmP7I/rA1uSQL8nq8m/JHXkuW6VCqD+yo8hJb5ynpN712BjVCvfFa33JCjsN7lX3GZr+L8RY2S/wb1/s7AHTO46dD6n1mtw+sVWfDZ8P1b7fzMtl9HtqXOD5fRLuXfUNbB2D5ETtRfJbRx2tPQwjcNMEfXXBbHSC9GoOwtDWEdC0J0xbG0MbtCQwJm1CSG2Y3wWlTUAuoBna6i3y7HJ6cl6aNiAipoATi99nV0iM2DVa/UVBkqulFaAdaZNx6FoACgaEhnNyJIxSJPV2kWg9iLoRDjXffYR0gWzyvqO0LZzrxJk4uRy9tmMzFW119SkaYdj5+nYTHdQlCd7lX7/1Np02uyGOo2L/4VgVW8joyj4OiA18N+vt2+bUkb5IkjJSWgWRlo9KBT1Gy74aj3O9H9NH9I8KmpPfstldXRWn83r/JOqKhN+YHp7mQNNskb5MOpbW3Gt+kilrfYB69hdDcHuxmb3jL3twMdriC7ID2Gu3pPQcGU540Jz8tGFzFGGROMfCZPTREsMgQRdCAwhdxIQxo4ww2AQuI2wFlkOMQGwBckyVIHZk+P/4KzpQaWdW394u5z6v3fZGgx8z4h7mUJ1aLcZ7LSkjXaVJInQeAEOWMOh0YcYRHQzGiEMc78WYbY/KuxrStbPxVGsdiPt7zHdQqlTkPstPwbXpVytxlp7a8lMAyjZYASpyXyOk1oi5/IHFXqtpBTXzG5VYj6A+clrpU/uv8ijdk+lLuvzSKJeQU54uWlrMeu2yxF7AksAB9vX9ZcdX7vi3ptJfyOJ/qSeQpJbSba/itf5L/AIvJFji7Iyq3sHYVVN+Gof1P1MpX16jxgu39f8Hbxudq5Np/ReEXeLrJIWgF2PkF7mUPRsclBLbZPZJVLc3pFpTweS7A3Bal332dn+E6+N0HKm16nwr8zkX9axoJqHdmjq1UionZVAAH0m1rqjXBQj4XYyk7HOTnLyyXTbBlESZIV+qRuOg0x5YARkh2R7LJIogbIr2HclSAbGM2xHSGFrO9xMSM1ZfSbCAZ04wloouUdk3BNTNpW7yC3kvJNDT8F9jDQlCZZiSxIiQcDBHF3ELYhMQhp1HGIPKcVi8pUqZCkMnyup0VlTKw6smOpr+JcxM23Fk3X7+xjOZ4/G4+1sbHstvuHzMwAVfp7kzMZmPRjS4KTcjVYWXdkwVkklF/xb/winycBL62Dtp21t1A3qU4XuL7FuyKlHS7b9/coBw1D2ZRpLVJ8XoTR3067fznQeRJceXdnKr6ZTNymu3fS/X4ljgYTWUVWPi1jIrUdZCeR8vP2kFs3uXFtxL9VSUYzkkpa/Ms8bGCnrbQb6ekpO+S+6y1Kb1pl9xVfLMnXTl7o/ZXIHWD9jvYmk6TPPujyUtR+vff9zO9Tl0+D4zh8X/j2a/sX6dXQvxCOrXfp8tzTw3x+LyZiXHb14Cq2o7QweqzvI5RCTDFiwgJaCBOIaBI7D8UkQPuIy9oyY46tT3ibEjlVuXZY3UDqaqNSSMjO+UnsvfDzXKwYkn7yjlqPg6mC5a7m2wsgldNOJZA7EZFgrhh2ldrRKmPAJgjj+mNsfQjRxgTsRCS2Mz1ZLRpISIjcJgvlvk2VfEd+5Dkkb+05sum40rXbJbb+fg6C6jkxrVcZaSPZHF8VTjO2RiU/CrUszEdwPM9/OJ4GLCD+Ba/AZZ+Vy2ps5bRURTor0k7cj2JO/6zMWSTmzZYcX9mjy8vv/N7J+DmPhZSZVG+qs/iH+Yeo/MR8fIePYpofLx45FTql7m7yONwcgi18dCT32Pw7++prZ9OxbnznBb/AJf08mIhn5VK4Rm/1+OwqUqihUUBQNAAeU6EIxrioxWkinKTnJyk9tkPlMpOPpFrgts9IAlPqGesStT1tsuYGC8uxx3pIqj4gHwiRj6t9AW/DOI/2hsdelD4vyOyugQ9TvL4STxHNplZS0W19Dn5SDsH6S1g9ad81XatN+CvndG9Gt21vsjUIo6J12+5xAF41JYgshWN3kyRGwfxTsbhcUNsk1uNSKSDTOVNitWoZpq1Yn2MnKhxW2aTg70ULsTm5MGdfFmtI1FVlbKCJy5RaOimg9eSqN3kbr2EpInV3giQOBKmENo1B4j7BtbowuI2xpcP5QtaG8haV1AkwkiQewkRIZ/mbf8A9LNTh6z/AHQ1ZmsPRP2U+7fykU07H6f8/wBfUbloDyHBYeXkHIQmi0/N091b8pTzOjV5Dcovizo4vWLaIcJfEvzIqeG8ddiy9m3ruo1K9X7PxX357/XcsWden/0jr8S7DdtTRqOkcBvb2x6xMRR+K1c4lRHyB/xfp2me6/GXCEl42aDoEoqcl7mTZullDH7CZheDVewai1KHBQdd29gDsB9dx/D5Ec4ymtPsjdeHL7buKR7mLMSe59Rua7pM52YylP6mP6rCEMlqHyJl57TrwOXIr7TomWERMAWEIEMjjUBoJM5vdmLcAutTTRqcTMWZCktFvxi7qBQb7Snc+/c6NC+HsW2GMr4mipAlSzhotQ577ll8NyQTvcrckT6ZPp2qDZ8pXl5JUON2vWNxH5AbcgAecOMAXMHj5i/E0TCnW9Axmi0rvB9ZVlAnjIj8zy6cbgPf0fEtJC1VDzsc+SyGfwLYfIhcVjNhYur3+JlWsbMiz/M5/oPIfaS01cV38gNkkvJ9AbGl4WhtiBotC2ezMqzGxHtpRHZe5Dt0jX3lLMslTU5xXj5l3Bphfcq5NrfyMd4h5d8hyEvSyrp+Wo/hU/UnzmTzcizIn3ltfI2WDhQxq98dP6mHfnL2zVprXr126vv7f+46xIqHJlSzqM1d6cVs02H3rBAC78x5n9ZzLGk9HY3uKOheH8k38VWzgDo2vYa8prukWysxk2vHYxnVqlXkvXuUS+NsS7nW41qmrr6vhra3bb+0sY2ZzscJrXyObYkvBcZRIRio2wGwPedVEDIq2B0V0O1YbEkBCK0ZiOYAzVmRL/gORSn8Fvp6zn5VDl3R08PIjH4ZGnq5XH1+EicuWPM6quiGHJ1N5EQfQkF6yI2fyvwKiwPlJKsfkyO2/hHZUt4jQJvq2ZbWC9lN58EvJCyPEDvrpBk8MJLyV59Q34QuDyztcOptRrcZJD0ZjlLTNdhZnXUDv0nItr0zsQntFVReeX5x8ljvF48mun2a0j8TfkOw/OU4x9SzftH+pI3pF2bZZ4jchpsj8RtiB4tCTHdcbQ44lLUKWKHQ+asNgyOyqFkeMltElVs6pcoPTMt4pxsUX0049aVkjdoQa7ekx/V1RVao1LuvJtejW5FlEp3Pafgoxx2Nbd8Q1jQXpGu05DvsjHWzozoqb5NdzRYXAucauxchOlx7fw+86GN0qzMgrISRzMnq9ePL05xfY1PHY6Y2GlCd1UdyfWanExVi0qtPejL5eS8m52Na2VXJ+FuMzMtM0KasmtutCnYdXuR6w/s1bs9TXcqvx2JFWQbutLV6L6+1ien0I+hlxEeyv4zYsy8Yt1Gi49P7rDqA/jr8o0J7bT9gUTqyDc1YGyqgt9N+X8jC2F7nMRNaZAcDqIQVMm1PlcwHXFhqycfDDryV49ZG6IEv2qwflci99XQfXzjQoUXsVuTKyOiDuTlUTcQhyMVYERmtoddns0N/JXY3GpXj98zJPwqF/wBR9fsB3mfzpcO0fvPsjSYu3Hb8FxxmMvH4VWLWSRWvdv8AMfMk/cyKqqMIKKJ3LYf4zBu8l4oHY8W79YPEfkPWyC4hJhA8HQWxQ+o2hEbKw8XIvS+6sGxfX3+8p29Ox7pc5x7l2nqOTTBwhLsQ8zCouv8AiglB6qo7GczK/Z+N13OMtJ+UdLG69KqnhNba9yz465QvwCv915qPY+86kcOONWlSta/M5FuVPIm5We5afINQk+XcHWgdtqqNsdD1haG2VF3KcScwGzNoW1dpsOO30Mr2ZVUHrmtr6gpx2UGLyi4/jHKxurqryyvSV7jqCjXl+cr05K+2ShvtJLQHuXNeclJuud60Fth01j63rsNfp/GXIWprk3pD70c/E2hkRYhHhEJixDHh5H7xCZ6IR6IQq/MPvGYl5Lj/ALi4f/at/pMzl/8AKj+DNLj/AOyapfX7yQlBP5wkCxi+cJgh185Gw0FEENCmMOxreUQwB4QPuFw/nWBMKPkuv+kn2lGH3mWf+qImd/h7f3ZN7EbMD4j/AMWv7g/lM91nyRryVvF/8y4//dlLp/8Ayofr2ZJ7IleJPlwv3H/8pY6n/t1fgwX5P//Z"
                            alt="">
                    </figure>
                    <div class="dividerBook"></div>
                    <div class="descriptionBook">
                        <h3>Título</h3>
                        <p>Descrição do Item</p>
                    </div>
                </div>

                <button id="showModalAddBook">Adicionar</button>
            </section>
        </div>
    </main>
    <script src="/js/jquery.js"></script>
    <script>
        document.querySelector('#showModalAddBook').addEventListener('click', function() {
            document.querySelector('body').classList.add('addBookShow')
        })

        document.querySelector('.deleteModalAddBook').addEventListener('click', function() {
            document.querySelector('body').classList.remove('addBookShow')
        })

        $('#addBookConf').click(function(e) {
            e.preventDefault();

            let title = document.querySelector('#title');
            let description = document.querySelector('#description');
            let url = document.querySelector('#url');

            if (title.value.trim() == "" && description.value.trim() == "" && url.value.trim() == "") {
                alert('Por favor, os campos não podem ficar em branco')
            } else {


                $.ajax({
                    url: "/api/add_book",
                    type: 'POST',
                    method: 'POST',
                    dataType: 'json',
                    ContentType: 'application/json',
                    data: {
                        title: title.value,
                        description: description.value,
                        url: url.value
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert('sec');
                        console.log(response)
                    },
                    erro: function(response) {
                        console.log(response);
                    }
                });
            }



        });
    </script>
</body>

</html>
