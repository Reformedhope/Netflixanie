<?php
class Season{

    Private$seasonNumber, $videos;

    public function __construct($seasonNumber, $videos){
        $this->seasonNumber = $seasonNumber;
        $this->videos = $videos;

    }

    public function getSeasonNumber(){
        return $this->seasonNumber;
    }
    public function getVideo(){
        return $this->videos;
    }

}



?>