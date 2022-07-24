# **Dev Test Task**

### Установка:
1) `git pull https://github.com/VenSnow/devTask.git`
2) `composer install`
3) `php artisan:key generate`
4) `php artisan migrate --seed`

## **API**
1) #### Фильмы
   `api/movies` - Вывод всех фильмов с жанрами и пагинацией
   
   `api/movies/{id}` - Вывод фильма по `id` с жанрами
2) #### Жанры
   `api/genres` - Вывод всех жанров
   
   `api/genres/{id}` - Вывод фильма по жанру с `id` с пагинацией
