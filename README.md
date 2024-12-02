# Гостевой микросервис

Этот проект представляет собой микросервис для работы с гостями. Он реализует API для выполнения операций CRUD (создание, чтение, обновление, удаление) с гостями, хранящимися в базе данных.
## Требования
Перед установкой сервиса убедитесь, что у вас установлен Docker, если не установлен перейдите по ссылке https://docs.docker.com/get-started/get-docker/ и установите его на свой ПК.
## Установка

1. Клонируйте репозиторий:
    ```bash
    https://github.com/NodeLie/guest_service.git
    cd guest_service
    ```
2. Запустите приложение:
    ```bash
    docker-compose up -d
    ```
3. Зайдите в bash контейнера сервиса:
     ```bash
    docker-compose exec -it app bash
    ```
4. Установите зависимости:
    ```bash
    composer install
    ```
5. Запустите миграции для создания таблиц в базе данных:
    ```bash
    php artisan migrate
    ```

Теперь апи должно быть доступно по адресу http://localhost:8080/api

## API(Также можно ознакомиться с апи в Postman, [Import file Postman](postman/))
### Получить информацию о всех гостях
**GET /api/guests**
### Получить инфомацию об одном госте
**GET /api/guests**
### Создание гостя

**POST /api/guests**

Тело запроса:
```json
{
  "first_name": "Ivan",
  "last_name": "Ivanov",
  "email": "ivanov@example.com",
  "phone": "+79513332333"
}
```
### Изменение данных гостя
**PUT /api/guests/{id}**
Тело запроса:
```json
{
  "first_name": "test_new",
  "last_name": "test",
  "email": "test@gmail.com",
  "phone": "+77272234749"
}
```
### Удаление гостя
**DELETE /api/guests/{id}**

