Database connection set-up in .env file
DB_CONNECTION=sqlite
DB_FOREIGN_KEYS=false
DB_DATABASE=/home/prajul/projects/personal/TestTask/database/database.sqlite





i have used google app-password so .env config to send email
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=prajulkhatiwada12@gmail.com
MAIL_PASSWORD="mech htae qlrp nhxf"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=prajulkhatiwada12@gmail.com
MAIL_FROM_NAME="${APP_NAME}"



job to save in database
QUEUE_CONNECTION=database



to run basic seeder
php artisan db:seed


before running unit tests run php artisan migrate:fresh so that duplicate data issue wont occur


admin and user email and password are in seeder


Steps to run projects

step-1:composer install
step-2:php artisan key:generate
step-3:setup database and run php artisan migrate
step-4:run seeder command-php artisan db:seed
