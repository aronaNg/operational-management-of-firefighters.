# operational-management-of-firefighters.

Link: https://github.com/aronaNg/operational-management-of-firefighters

git clone https://github.com/aronaNg/operational-management-of-firefighters.git

composer install
npm install

Config database in .env file

Migration: php artisan migrate

Factory and seeding (fill the database with fakers): 
php artisan db:seed --class=TypeEquipementSeeder

You can replace 'TypeEquipementSeeder' by your own seeder class (/database/seeders/)

In two different terminals, run
🔨 php artisan serve 

🔨 npm run dev

