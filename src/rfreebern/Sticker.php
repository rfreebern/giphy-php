<?php

namespace rfreebern;

define('GIPHY_API_URL', 'http://api.giphy.com');

class Sticker {

    private static $key;

    public function __construct ($key = 'dc6zaTOxFJmzC') {
        self::$key = $key;
    }

    public function search ($query, $limit = 25, $offset = 0) {
        $endpoint = '/v1/stickers/search';
        $params = array(
            'q' => urlencode($query),
            'limit' => (int) $limit,
            'offset' => (int) $offset,
        );
        return $this->request($endpoint, $params);
    }

    public function translate ($query) {
        $endpoint = '/v1/stickers/translate';
        $params = array(
            's' => urlencode($query)
        );
        return $this->request($endpoint, $params);
    }

    public function random ($tag = null) {
        $endpoint = '/v1/stickers/random';
        $params = array(
            'tag' => urlencode($tag)
        );
        return $this->request($endpoint, $params);
    }

    public function trending ($limit = 25, $offset = 0) {
        $endpoint = '/v1/stickers/trending';
        $params = array(
            'limit' => (int) $limit,
            'offset' => (int) $offset
        );
        return $this->request($endpoint, $params);
    }

    private function request ($endpoint, array $params = array()) {
        $params['api_key'] = self::$key;
        $query = http_build_query($params);
        $url = GIPHY_API_URL . $endpoint . ($query ? "?$query" : '');
        $result = file_get_contents($url);
        return $result ? json_decode($result) : false;
    }

}
