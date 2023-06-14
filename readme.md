<h1>Como iniciar o projeto:</h1>

git clone https://github.com/matheussantosspbr/projeto_comfica

cd projeto_comfica

cd app

Renomeei (.env.example) para (.env)

cd ..

docker-compose up -d

cd app

composer install

<!-- Casso a opção 1 não funcione, use a opção 2  -->
    Opção 1:
        php artisan migrate
    Opção 2:
        cd ..
        docker exec -it projeto_comfica_php_1  /bin/bash
        php artisan migrate

        (obs: se o comando "docker exec -it projeto_comfica_php_1  /bin/bash" não funcionar, escreva " docker exec -it p" e depois aperte tab )

Acessar http://localhost/
    
