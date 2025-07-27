<?php 
    function getAllAnimes(){
        $resultat = file_get_contents('http://localhost:3000/animes');
        $animes = json_decode($resultat);

        return $animes;
    }

    function getAnimeById($id){
        $resultat = @file_get_contents('http://localhost:3000/animes/' . $id);
        if($resultat !== false){
            $anime = json_decode($resultat);
            return $anime;
        }else{
            header("Location:/views/error.php");
            exit();
        }
    }

    function getAllCharacters(){
        $resultat = file_get_contents('http://localhost:3000/characters');
        $characters = json_decode($resultat);

        return $characters;
    }

    function getCharacterById($id){
        $resultat = @file_get_contents('http://localhost:3000/characters/' . $id);
        if($resultat !== false){
            $character = json_decode($resultat);
            return $character;
        }else{
            header("Location:/views/error.php");
            exit();
        }
    }

    function getAllMangas(){
        $resultat = file_get_contents('http://localhost:3000/mangas');
        $mangas = json_decode($resultat);

        return $mangas;
    }

    function getMangaById($id){
        $resultat = @file_get_contents('http://localhost:3000/mangas/' . $id);
        if($resultat !== false){
            $manga = json_decode($resultat);
            return $manga;
        }else{
            header("Location:/views/error.php");
            exit();
        }
    }

    function getAllAuthors(){
        $resultat = file_get_contents('http://localhost:3000/authors');
        $authors = json_decode($resultat);

        return $authors;
    }

    function getAuthorById($id){
        $resultat = @file_get_contents('http://localhost:3000/authors/' . $id);
        if($resultat !== false){
            $author = json_decode($resultat);
            return $author;
        }else{
            header("Location:/views/error.php");
            exit();
        }
    }

    function getAllFilms(){
        $resultat = file_get_contents('http://localhost:3000/films');
        $films = json_decode($resultat);

        return $films;
    }

    function getFilmByID($id){
        $resultat = @file_get_contents('http://localhost:3000/films/' . $id);
        if($resultat !== false){
            $film = json_decode($resultat);
            return $film;
        }else{
            header("Location:/views/error.php");
            exit();
        }
    }
?>