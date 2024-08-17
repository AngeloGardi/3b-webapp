<?php
class Flickr {
    public function search($query) {
        $query = urlencode($query);
        $url = "https://api.flickr.com/services/feeds/photos_public.gne?tagmode=all&format=json&tags=$query";
        $response = file_get_contents($url);
        $response = str_replace("jsonFlickrFeed(", "", $response);
        $response = substr($response, 0, strlen($response) - 1);
        $response = json_decode($response);
        return $response;
    }
}