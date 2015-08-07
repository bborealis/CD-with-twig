<?php
class CD {
    private $artist;
    private $album;

    function __construct($artist, $album) {
        $this->artist = $artist;
        $this->album = $album;
    }

    function setArtist ($artistName) {
        $this->artist = $artistName;
    }

    function getArtist() {
        return $this->artist;
    }

    function setAlbum($albumName) {
        $this->album = $albumName;
    }

    function getAlbum() {
        return $this->album;
    }

    function save() {
        array_push($_SESSION['cd_list'], $this);
    }

    static function getAll() {
        return $_SESSION['cd_list'];
    }

    static function deleteAll() {
        $_SESSION['cd_list'] = array();
    }
}
?>
