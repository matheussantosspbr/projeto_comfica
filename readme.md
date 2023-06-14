<h1>Como iniciar o projeto:</h1>

git clone https://github.com/matheussantosspbr/projeto_comfica

cd projeto_comfica/app

Renomeei (.env.example) para (.env):
    <!--  -->
        Linux:
            mv .env.example .env
        Windowns:
            ren .env.example .env

composer install

cd ..

docker-compose up -d

cd app

Casso a opção 1 não funcione, use a opção 2:
<!-- Casso a opção 1 não funcione, use a opção 2  -->
    Opção 1:
        php artisan migrate
    Opção 2:
        cd ..
        docker exec -it projeto_comfica_php_1  /bin/bash
        php artisan migrate

        (obs: se o comando "docker exec -it projeto_comfica_php_1  /bin/bash" não funcionar, escreva " docker exec -it p" e depois aperte tab )

Acessar http://localhost/
    
Para sair da maquina virtual (docker) aperte exit.