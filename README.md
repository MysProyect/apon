## Steps to install and run on your local system
1. $ git clone https://github.com/vicky9586/Curs-Olin-first.git
2. $ cd directory
3. $ composer install
4. $ npm install
5. cp .env.example .env Add your database configuration in .env file (you can check my articles on how to achieve it https://devcode.la/tutoriales/laravel-5-base-de-datos-y-environment/)
6. $ php artisan migrate 
7. $ php artisan db:seed ('optional')
8. $ php artisan key:generate  generar APP_KEY 
9. $ php artisan storage:link -> create symbolic link of folder'storage'  
10. $ php artisan serve (if the server opens, http://127.0.0.1:8000, we are ready to start)
