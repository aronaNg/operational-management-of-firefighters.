# operational-management-of-firefighters.

Link: https://github.com/aronaNg/operational-management-of-firefighters

git clone https://github.com/aronaNg/operational-management-of-firefighters..git

For Windows, make sure to change the directory name (because of .. in the git repo)

composer install

npm install

Config database in .env file

Migration: php artisan migrate

Factory and seeding (fill the database with fakers): 
php artisan db:seed --class=TypeEquipementSeeder

📝 In the users table, if is_admin=1, the user has all privileges(admin dashboard) else he is redirected to simple user page

You can replace 'TypeEquipementSeeder' by your own seeder class (/database/seeders/)

In two different terminals, run
🔨 php artisan serve 

🔨 npm run dev

🚨 Small error, the user who registers for the first time with the value is_admin=0, must be directed to the login page for the first time. But he is directed to the admin page, on the other hand if he logs out and reconnects it will be in the users page. I belatedly saw the route name while trying to customize the laravel middleware.
