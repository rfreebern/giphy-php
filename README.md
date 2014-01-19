# PHP interface to the Giphy API

A library providing a PHP interface to the [Giphy API](https://github.com/giphy/GiphyAPI).

## Installation

    composer require rfreebern/giphy-php

## Example

There is a file named ```giphy``` in the ```bin``` directory. Use it like this:

    $ ./bin/giphy whiskey

## Usage

    $giphy = new \rfreebern\Giphy();
    $result = $giphy->random('whiskey');
    print $result->data->image_original_url;

By default, the constructor uses the shared beta API key, but if you have a key
of your own you can pass it as an argument:

    $giphy = new \rfreebern\Giphy($my_giphy_api_key);

In general, the methods in the ```Giphy``` class reflect the endpoints of the
Giphy API, and take the same arguments.

### search($query, $limit = 25, $offset = 0)

Searches for gifs matching ```$query```.

### getByID($id)

Fetches a specific GIF by its Giphy ID.

### getByIDs(array $ids)

Fetches one or more specific GIFs by their Giphy IDs.

### translate($query)

Translates a query to a matching GIF. See [the docs](https://github.com/giphy/GiphyAPI#translate-endpoint)
for more information.

### random($tag = null)

Fetches a random GIF, optionally matching the given tag.

### trending($limit = 25)

Fetches a list of trending GIFs.

## Credits

* This library was created by Ryan Freebern / [@rfreebern](http://twitter.com/rfreebern).
