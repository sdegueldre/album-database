# Album database API

This project allows you to run a JSON API for an album database, you interact with a live demo of it at `http://album-database.herokuapp.com/api`.

## Setting up

After cloning the repo, you need to use `composer install` to download and install the dependencies. If you do not have composer, you can get it [here](https://getcomposer.org/).

You need a PostgreSQL database, if you already have one, you can put your credentials in the `.env` file in the `DB_...` section. If you do not have one, you can use `docker-compose up` in the root directory to run a docker container with the `docker-compose.yml` file included. More information on docker [here](https://www.docker.com/).

Serve `public/index.php` with whichever HTTP server you prefer (it must support php obviously). If you do not have any server set up, you can use `php artisan serve` from the root of the repository and the project will be served locally.

## Usage

Register via the webpage (`yourdomain/register`), you can now interact with the api at `yourdomain/api/albums`

### Album object

A dictionary containing the following keys:

    id: The identifier of the album as an integer.
    name: The name of the album.
    artist: The name of the artist.
    image: A url pointing to the album's cover.
    genre: The album's muscical genre.
    year: The album's year of production.
    label: The album's label.
    songs: A list of comma-separated songs as a string.
    rating: The album's rating as an integer, out of 5.
    
### GET `/albums[?queryString=:query][&][offset=:offset]`

Returns the first 10 characters.

Optional query parameter returns only albums where any of the strings match the query.

Optional offset parameter returns the 10 albums after the offset, useful for pagination.

### GET /albums/:id

Returns an album by id.

### POST /albums

Only takes JSON as input.

Creates a new album.

Returns the newly created album object, including its id.

### PUT /albums/:id

Only takes JSON as input.

Updates the specified album.

### DELETE /albums/:id

Deletes the specified album.

## Deployment

The project is ready to deploy on heroku, just push this repo to your herokuapp repo.
