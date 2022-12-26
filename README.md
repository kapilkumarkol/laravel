<h1>instruction to run laravel code in clone folder</h1>
<h3> git clone https://github.com/kapilkumarkol/laravel</h3>
<p>run this command in xampp/htdocs</p>
<h3> cd laravel</h3>
<p>now go to folder name using cd</p>
<h3>cp .env.example .env</h3>
<p>you have to change data base name from .env file and import the table in the data base which you have downloaded</p>
<h3>composer install</h3>
<h3>php artisan key:generate</h3>
<h3>php artisan migrate:fresh --seed</h3>
<h3>php artisan serve</h3>
