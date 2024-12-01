# Гостевой микросервис

Этот проект представляет собой микросервис для работы с гостями. Он реализует API для выполнения операций CRUD (создание, чтение, обновление, удаление) с гостями, хранящимися в базе данных.

## Установка

1. Клонируйте репозиторий:
    ```bash
    git clone https://github.com/your-username/guest-microservice.git
    cd guest-microservice
    ```

2. Установите зависимости:
    ```bash
    composer install
    ```

3. Запустите миграции для создания таблиц в базе данных:
    ```bash
    php artisan migrate
    ```

4. Для запуска проекта используйте Docker Compose:
    ```bash
    docker-compose up --build
    ```

Теперь апи должно быть доступно по адресу http://localhost:8080/api

## API(Также можно ознакомиться с апи в Postman, файл находится в папке postman)
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

