## Блог

### Подготовка и запуск проекта
#### Склонируйте проект на локальный компьютер:
```console
git clone git@github.com:rushev84/blog_russian_robotics.git
```
#### Поднимите контейнер:
docker-compose up -d
Зайдите в контейнер:
docker exec -it blog_russian_robotics_app bash
Установите Composer:
composer install
Откройте доступ к папке storage:
chmod 777 -R storage
Создайте символическую ссылку на storage:
php artisan storage:link
Примените миграции:
php artisan migrate
Создайте пользователя:
php artisan orchid:admin admin admin@admin.com admin@admin.com
Доступ к проекту
Сайт доступен по адресу: http://localhost:8876/

### Административная панель
Вы можете войти в административную панель по адресу: 
http://localhost:8876/admin

<b>Логин:</b> admin@admin.com<br>
<b>Пароль:</b> admin@admin.com

### Загрузка данных
В разделе "Upload Data" загрузите файл data.xml из корня проекта.
### Готово!
Теперь ваш проект готов к просмотру!

<b>Примечание:</b> отправка почты осуществляется в тестовом режиме через http://mailtrap.io.
