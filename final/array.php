<?php include "top.php";
$years = array(
    array('Year', 'First', 'Second', 'Third', 'Total Spotify listeners (millions)'),
    array(2018, 'Drake', 'Post Malone', 'XXXTenttacion', 180),
    array(2019, 'Post Malone', 'Billie Eilish', 'Ariana Grande', 232),
    array(2020, 'Bad Bunny', 'Drake', 'J Balvin', 299),
    array(2021, 'Bad Bunny', 'Taylor Swift', 'BTS', 365),
);
?>
<main>
    <h1>Streaming</h1>

    <section id="sec1">
        <h2>Music Changes</h2>
        <section id="grid-item-a">
            <h3>Digital Music</h3>
            <p>
                With the advent of streaming and music downloads, it has become easier and easier for people to listen to music.
                Since 2010, the music industry has gone through a boom of new artists, albums, and big hits, making it easier for people to find specific music that they enjoy.
                Even in 2010, digital music accounted for more than half of music revenue.
                Social media apps like Instagram and Tik Tok make it even easier to for artists to connect with their fans than it was in the past.
                It's easy to see that the digitalization of music has made it more accessible to everyone!
                <a href="https://themusicnetwork.com/music-consumption-decade/" target="_blank">(Murphy, 2019)</a>
            </p>
            <h3>Covid 19 and Music</h3>
            <p>
                As we know, music is comforting and can reduce stress, anxiety, and improve people's lives!
                But how has the Covid 19 pandemic changed the way we listen to music?
                In the early times of the pandemic, people were stuck at home and had much more time on their hands, time to fill with music!
                But the pandemic actually decreased music consumption from March 2020 to May 2020, which hardly ever happens. So, artists had to get creative.
                Many artists started streaming live music and concerts from their homes on platforms like Twitch.
                This worked and music consumption rose again as people adapted to the new normal

                <a href="https://www.forbes.com/sites/kristinwestcottgrant/2020/05/16/the-future-of-music-streaming-how-covid-19-has-amplified-emerging-forms-of-music-consumption/?sh=30341500444a" target="_blank">(Grant, 2020)</a>.
            </p>
        </section>
    </section>
    <section id="sec2">
        <h2>Are more people listening to music every year?</h2>
        <?php
        print '<p>Changes in music streaming in the last ' . count($years) . ' years. </p>';
        ?>
        <table>
            <?php
            foreach ($years as $year) {
                print '<tr>';
                print '<td>' . $year[0] . '</td>';
                print '<td>' . $year[1] . '</td>';
                print '<td>' . $year[2] . '</td>';
                print '<td>' . $year[3] . '</td>';
                print '<td>' . $year[4] . '</td>';
                print '</tr>' . PHP_EOL;
            }
            ?>
        </table>
        <a href="https://en.wikipedia.org/wiki/List_of_most-streamed_artists_on_Spotify#2022" target="_blank">(Wikipedia, 2021)</a>
        <a href="https://www.businessofapps.com/data/spotify-statistics/" target="_blank">(Iqbal, 2022)</a>

    </section>
    <section id="sec3">
        <h2>Streaming options</h2>
        <figure>
            <a href="https://www.channelnews.com.au/music-streaming-battle-looms-apple-to-buy-shazam-as-you-tube-takes-on-itunes/" target="_blank">
                <img alt="An image of different streaming logos" src="images/stream.jpg">
            </a>
            <figcaption>So many streaming options! [image: David Richards]
            </figcaption>

        </figure>
        <ol>
            <li>Apple Music</li>
            <li>Napster</li>
            <li>Spotify</li>
            <li>Amazon Music</li>
            <li>Google Music</li>
            <li>Tidal</li>
        </ol>
    </section>
</main>
<?php include "footer.php"; ?>

</body>

</html>