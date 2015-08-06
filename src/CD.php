<?php
class CD {
    private $artist

    function __construct($artist) {
        $this->artist = $artist;
    }

    function setArtist ($artistName) {
        $this->artist = $artistName;
    }

    function getArtist() {
        return $this->artist;
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
