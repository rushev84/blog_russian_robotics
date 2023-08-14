## Блог

### Подготовка и запуск проекта
#### Перейдите в терминал вышей операционной системы и склонируйте проект на локальный компьютер:
```console
git clone git@github.com:rushev84/blog_russian_robotics.git
```
#### Перейдите в папку с проектом и поднимите докер-контейнер:
```console
docker-compose up -d
```
#### Зайдите в контейнер:
```console
docker exec -it blog_russian_robotics_app bash
```
#### Установите Composer:
```console
composer install
```
#### Откройте доступ к папке storage:
```console
chmod 777 -R storage
```
#### Создайте символическую ссылку на storage:
```console
php artisan storage:link
```
#### Накатите миграции:
```console
php artisan migrate
```
#### Создайте пользователя:
```console
php artisan orchid:admin admin admin@admin.com admin@admin.com
```
### Доступ к проекту
Сайт доступен по адресу: http://localhost:8876/

### Административная панель
Вы можете войти в административную панель по адресу: 
http://localhost:8876/admin

<b>Логин:</b> admin@admin.com<br>
<b>Пароль:</b> admin@admin.com

### Загрузка данных
В разделе "Upload Data" загрузите файл data.xml из папки data в корне проекта.

### Готово!
Теперь ваш проект готов к просмотру!

#### Для опускания контейнера используйте команду:
```console
docker-compose down
```

<b>Примечание:</b> отправка почты осуществляется в тестовом режиме через http://mailtrap.io.
