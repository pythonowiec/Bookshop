## O projekcie

Projekt api księgarni.

### Endpointy

Lista wszystkich autorów:
```console
http://127.0.0.1:8000/api/authors
```
Lista wszystkich zasobów:
```console
http://127.0.0.1:8000/api/items
```
Opis wybranego produktu:
```console
http://127.0.0.1:8000/api/items/{ID}/description
```
Dodawanie produktu:
```console
http://127.0.0.1:8000/api/items
```

Dostępne pola:

- title -> tytuł
- price -> cena
- author_id - id autora
- **type** -> id typu produktu:
  - 1 -> Book:
    - genre -> gatunek
  - 2 -> Comic:
    - series -> seria
  - 3 -> ShortStoryColection:
    - theme ->motyw

**Uwaga!** Aby dodać wpis należy podać typ produktu. 

## Uruchomienie aplikacji

1. Należy stworzyć nową bazę MySQL o nazwie `bookshop`

2. Następnie klonujemy projekt:

```console
git clone https://github.com/pythonowiec/Bookshop.git
```

3. Należy w głównym katalogu projektu stworzyć plik `.env` i **skopiować** do niego zawartość z `.env.example`

4. Teraz trzeba zainstalować paczki:

```console
composer install
```

5. Po instalacji wykonujemy migracje:
```console
php artisan migrate
```
6. (**Opcjonalnie**) Uzupełnienie bazy danych testowymi danymi:
```console
php artisan db:seed
```
7. Następnie uruchamiamy serwer:
```console
php artisan serve
```
## Testy

Aby uruchomić testy automatyczne należy:
```console
./vendor/bin/pest --filter ItemTest
```
**Uwaga!** Uruchomienie testów czyści bazę danych, ale nie usuwa jej.
