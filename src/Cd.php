<<?php
class Cd
{
    private $artist;

    function __construct($cd_artist)
    {
        $this->artist = $cd_artist;
    }

    function getArtist()
    {
        return $this->artist;
    }

    function setArtist($newArtist)
    {
        $this->artist = $newArtist;
    }

    static function getAll()
    {
        return $_SESSION['cd_list'];
    }

    function findMatch($thisCd, $cdList) {
        
    }
}
?>
