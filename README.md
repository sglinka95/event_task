# Event Task

**Brief**: Utwórz model Event, który będzie zawierał następujące informacje:
- id
- Nazwa wydarzenia
- Data rozpoczęcia wydarzenia (data, godzina)
- Data zakończenia wydarzenia (data, godzina)
- Status wydarzenia
- Slug wydarzenia
- Organizator wydarzenia (User)

Utwórz endpoint API (/events), który zwróci JSON z listą wszystkich Eventów, który, będzie zawierał: id, nazwa wydarzenia, data rozpoczęcia, slug wydarzenia, nazwę Usera.
Stwórz warstwę do dodawania i edycji modelu Event dla zalogowanych Userów.

**Założenia:**
- User jest standardowym użytkownikiem frameworka Laravel
- 1 User może posiadać więcej niż 1 Event
- Slug wydarzenia będzie automatycznie generowany z nazwy wydarzenia, np. dla nazwy wydarzenia „Targi pracy” sług będzie miał wartość „targi-pracy”

## Instalacja
- Clone project
- Go to the folder application using cd command on your cmd or terminal
- Run ```composer install``` on your cmd or terminal
- Copy .env.example file to .env on the root folder. You can type ```copy .env.example .env``` if using command prompt Windows or ```cp .env.example .env``` if using terminal, Ubuntu
- Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
- Run ```php artisan key:generate```
- Run ```php artisan migrate```
- Run ```php artisan serve```
- Go to http://localhost:8000/

## Endpoints
To register user:
` \api\signup `
params:
```
{
    "name": "username",
    "email": "email@gmail.com",
    "password": "password",
    "password_confirmation": "password"
}
```
To login user:
` \api\login `
params:
```
{
    "email": "email@gmail.com",
    "password": "password",
}
```
To get list of events:
` \api\events`

To add event:
` \api\events `
params:
```
{
    "name": "Wydarzenie Testowe 2",
    "status": "started",
    "event_organizer": 1,
    "start_time": "2022-01-12 13:16:02",
    "end_time": "2022-01-13 13:16:02"
}
```

To update event:
` \api\events\{slug} `
params:
```
{
    "name": "Wydarzenie Testowe 2",
    "status": "ended",
    "event_organizer": 1,
    "start_time": "2022-01-12 13:16:02",
    "end_time": "2022-01-13 13:16:02"
}
```