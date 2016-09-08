<?php
class Cd
{
    private $artist;
    private $album;

    function __construct($cd_artist, $cd_album)
    {
        $this->artist = $cd_artist;
        $this->album = $cd_album;
    }

    function getArtist()
    {
        return $this->artist;
    }

    function getAlbum()
    {
        return $this->album;
    }

    static function getAll()
    {
        return $_SESSION['cd_list'];
    }

    function findMatch($search)
    {
        if(strstr($this->artist, $search)) {
            return true;
        }
    }
}
?>
