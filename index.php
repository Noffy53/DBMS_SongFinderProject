<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify Search</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h3>Spotify Search</h3>
        <div class="topnav">
            <div class="search-container">
                <form method="post" action="index.php?mode=search">
                    <input type="text" placeholder="Search.." name="input">
                    <select class="form-dropdown" name="type">
                        <option class="form-dropdown" value="song">Song</option>
                        <option class="form-dropdown" value="artist">Artist</option>
                        <option class="form-dropdown" value="album">Album</option>
                    </select>
                    <button type="submit"><i class="fa fa-search"></i></button>
                    <div class="saved-container">
                        <a class="saved-button" id="saved" href="savedsongs.php">Saved Songs</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="sidebar">
                <form method="post" action="index.php?mode=filter">
                    <section class="filter-group">
                        <header class="section-header">
                            Sort By
                        </header>
                        <div class="filter-content">
                            <select class="form-dropdown" name="sort">
                                <option class="form-dropdown" value="most">Most Popular</option>
                                <option class="form-dropdown" value="least">Least Popular</option>
                                <option class="form-dropdown" value="A">A-Z</option>
                                <option class="form-dropdown" value="Z">Z-A</option>
                            </select>
                        </div>
                    </section>
                    <section class="filter-group">
                        <header class="section-header">
                            Genre
                        </header>
                        <div class="filter-content">
                            <select class="form-dropdown" name="genre">
                                <option class="form-dropdown" value="0">-None-</option>
                                <option class="form-dropdown" value="acoustic">acoustic</option>
                                <option class="form-dropdown" value="afrobeat">afrobeat</option>
                                <option class="form-dropdown" value="alt-rock">alt-rock</option>
                                <option class="form-dropdown" value="alternative">alternative</option>
                                <option class="form-dropdown" value="ambient">ambient</option>
                                <option class="form-dropdown" value="anime">anime</option>
                                <option class="form-dropdown" value="black-metal">black-metal</option>
                                <option class="form-dropdown" value="bluegrass">bluegrass</option>
                                <option class="form-dropdown" value="blues">blues</option>
                                <option class="form-dropdown" value="brazil">brazil</option>
                                <option class="form-dropdown" value="breakbeat">breakbeat</option>
                                <option class="form-dropdown" value="british">british</option>
                                <option class="form-dropdown" value="cantopop">cantopop</option>
                                <option class="form-dropdown" value="chicago-house">chicago-house</option>
                                <option class="form-dropdown" value="children">children</option>
                                <option class="form-dropdown" value="chill">chill</option>
                                <option class="form-dropdown" value="classical">classical</option>
                                <option class="form-dropdown" value="club">club</option>
                                <option class="form-dropdown" value="comedy">comedy</option>
                                <option class="form-dropdown" value="country">country</option>
                                <option class="form-dropdown" value="dance">dance</option>
                                <option class="form-dropdown" value="dancehall">dancehall</option>
                                <option class="form-dropdown" value="death-metal">death-metal</option>
                                <option class="form-dropdown" value="deep-house">deep-house</option>
                                <option class="form-dropdown" value="detroit-techno">detroit-techno</option>
                                <option class="form-dropdown" value="disco">disco</option>
                                <option class="form-dropdown" value="disney">disney</option>
                                <option class="form-dropdown" value="drum-and-bass">drum-and-bass</option>
                                <option class="form-dropdown" value="dub">dub</option>
                                <option class="form-dropdown" value="dubstep">dubstep</option>
                                <option class="form-dropdown" value="edm">edm</option>
                                <option class="form-dropdown" value="electro">electro</option>
                                <option class="form-dropdown" value="electronic">electronic</option>
                                <option class="form-dropdown" value="emo">emo</option>
                                <option class="form-dropdown" value="folk">folk</option>
                                <option class="form-dropdown" value="forro">forro</option>
                                <option class="form-dropdown" value="french">french</option>
                                <option class="form-dropdown" value="funk">funk</option>
                                <option class="form-dropdown" value="garage">garage</option>
                                <option class="form-dropdown" value="german">german</option>
                                <option class="form-dropdown" value="gospel">gospel</option>
                                <option class="form-dropdown" value="goth">goth</option>
                                <option class="form-dropdown" value="grindcore">grindcore</option>
                                <option class="form-dropdown" value="groove">groove</option>
                                <option class="form-dropdown" value="grunge">grunge</option>
                                <option class="form-dropdown" value="guitar">guitar</option>
                                <option class="form-dropdown" value="happy">happy</option>
                                <option class="form-dropdown" value="hard-rock">hard-rock</option>
                                <option class="form-dropdown" value="hardcore">hardcore</option>
                                <option class="form-dropdown" value="hardstyle">hardstyle</option>
                                <option class="form-dropdown" value="heavy-metal">heavy-metal</option>
                                <option class="form-dropdown" value="hip-hop">hip-hop</option>
                                <option class="form-dropdown" value="honky-tonk">honky-tonk</option>
                                <option class="form-dropdown" value="house">house</option>
                                <option class="form-dropdown" value="idm">idm</option>
                                <option class="form-dropdown" value="indian">indian</option>
                                <option class="form-dropdown" value="indie-pop">indie-pop</option>
                                <option class="form-dropdown" value="indie">indie</option>
                                <option class="form-dropdown" value="industrial">industrial</option>
                                <option class="form-dropdown" value="iranian">iranian</option>
                                <option class="form-dropdown" value="j-dance">j-dance</option>
                                <option class="form-dropdown" value="j-idol">j-idol</option>
                                <option class="form-dropdown" value="j-pop">j-pop</option>
                                <option class="form-dropdown" value="j-rock">j-rock</option>
                                <option class="form-dropdown" value="jazz">jazz</option>
                                <option class="form-dropdown" value="k-pop">k-pop</option>
                                <option class="form-dropdown" value="kids">kids</option>
                                <option class="form-dropdown" value="latin">latin</option>
                                <option class="form-dropdown" value="latino">latino</option>
                                <option class="form-dropdown" value="malay">malay</option>
                                <option class="form-dropdown" value="mandopop">mandopop</option>
                                <option class="form-dropdown" value="metal">metal</option>
                                <option class="form-dropdown" value="metalcore">metalcore</option>
                                <option class="form-dropdown" value="minimal-techno">minimal-techno</option>
                                <option class="form-dropdown" value="mpb">mpb</option>
                                <option class="form-dropdown" value="new-age">new-age</option>
                                <option class="form-dropdown" value="opera">opera</option>
                                <option class="form-dropdown" value="pagode">pagode</option>
                                <option class="form-dropdown" value="party">party</option>
                                <option class="form-dropdown" value="piano">piano</option>
                                <option class="form-dropdown" value="pop-film">pop-film</option>
                                <option class="form-dropdown" value="pop">pop</option>
                                <option class="form-dropdown" value="power-pop">power-pop</option>
                                <option class="form-dropdown" value="progressive-house">progressive-house</option>
                                <option class="form-dropdown" value="psych-rock">psych-rock</option>
                                <option class="form-dropdown" value="punk-rock">punk-rock</option>
                                <option class="form-dropdown" value="punk">punk</option>
                                <option class="form-dropdown" value="r-n-b">r-n-b</option>
                                <option class="form-dropdown" value="reggae">reggae</option>
                                <option class="form-dropdown" value="reggaeton">reggaeton</option>
                                <option class="form-dropdown" value="rock-n-roll">rock-n-roll</option>
                                <option class="form-dropdown" value="rock">rock</option>
                                <option class="form-dropdown" value="rockabilly">rockabilly</option>
                                <option class="form-dropdown" value="romance">romance</option>
                                <option class="form-dropdown" value="sad">sad</option>
                                <option class="form-dropdown" value="salsa">salsa</option>
                                <option class="form-dropdown" value="samba">samba</option>
                                <option class="form-dropdown" value="sertanejo">sertanejo</option>
                                <option class="form-dropdown" value="show-tunes">show-tunes</option>
                                <option class="form-dropdown" value="singer-songwriter">singer-songwriter</option>
                                <option class="form-dropdown" value="ska">ska</option>
                                <option class="form-dropdown" value="sleep">sleep</option>
                                <option class="form-dropdown" value="songwriter">songwriter</option>
                                <option class="form-dropdown" value="soul">soul</option>
                                <option class="form-dropdown" value="spanish">spanish</option>
                                <option class="form-dropdown" value="study">study</option>
                                <option class="form-dropdown" value="swedish">swedish</option>
                                <option class="form-dropdown" value="synth-pop">synth-pop</option>
                                <option class="form-dropdown" value="tango">tango</option>
                                <option class="form-dropdown" value="techno">techno</option>
                                <option class="form-dropdown" value="trance">trance</option>
                                <option class="form-dropdown" value="trip-hop">trip-hop</option>
                                <option class="form-dropdown" value="turkish">turkish</option>
                                <option class="form-dropdown" value="world-music">world-music</option>   
                            </select>
                        </div>
                    </section>
                    <section class="filter-group">
                        <header class="filter-header">
                            Explicit
                        </header>
                        <div class="filter-content">
                            <label>
                                <input class="form-radio" type="radio" name="explicit" value="TRUE">
                                True
                            </label>
                            <label>
                                <input class="form-radio" type="radio" name="explicit" value="FALSE">
                                False
                            </label>
                        </div>
                    </section>
                    <section class="filter-group">
                        <header class="section-header">
                            Duration
                        </header>
                        <div class="filter-content">
                            <select class="form-dropdown" name="duration">
                                <option class="form-dropdown" value="any">Any</option>
                                <option class="form-dropdown" value="0-1">0-1 mins</option>
                                <option class="form-dropdown" value="1-2">1-2 mins</option>
                                <option class="form-dropdown" value="2-3">2-3 mins</option>
                                <option class="form-dropdown" value="3-4">3-4 mins</option>
                                <option class="form-dropdown" value="4+">4 mins+</option>
                            </select>
                        </div>
                    </section>
                    <div class="filter-button-div">
                        <button class="filter-button" type="reset">Clear</button>
                        <button class="filter-button" type="submit" name="filter">Apply</button>
                    </div>
                </form>
            </div>
            <div class="return-container">
                <table class="return-table">
                    <thead>
                        <tr>
                            <th>Save</th><th>Track Name</th><th>Artist</th><th>Ablum</th><th>Genre</th><th>Explicit</th><th>Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include ('function.php');
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>