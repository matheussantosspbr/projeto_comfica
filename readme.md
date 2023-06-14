<h1>Como iniciar o projeto:</h1>

git clone https://github.com/matheussantosspbr/projeto_comfica

cd projeto_comfica

docker-compose up -d

cd app

composer install

<!-- Casso a opção 1 não funcione, use a opção 2  -->
    Opção 1:
        php artisan migrate
    Opção 2:
        cd ..
        docker exec -it projeto_comfica_defaut /bin/bash
        php artisan migrate

Acessar http://localhost/
    