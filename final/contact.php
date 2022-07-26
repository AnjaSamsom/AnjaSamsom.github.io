<?php include "top.php"; ?>
<main>
    <h1 class="header1">Contact Us</h1>
    <section class="grid">
        <h2 class="header2">Email</h2>
        <section class="p1">
        <h3>Learn more...</h3>
            <p class="text">The best way to contact us about urgent needs or inquiries is email! Send us a message at uvmtv@uvmtv.org
                and address it to Anja Samsom (social media). We will get back to you in 3 to 5 business days! Additionally feel free to shoot us some fun emails!
                We love hearing from our fans as well as prospective members. If you have a longer idea that doesn't fit into the form, you can also send us an inquiry
                making sure to copy any people who you would like to be included in the project.
            </p>
            <p class="text">
                "Emails are the window to the soul" - Fiona Duckworth

            </p>
        </section>
        <img src="images/anjafiona.png" alt="News segment image" class="img_small">
    </section>

    <section class="grid">
        <h2 class="header2">Instagram</h2>
        <section class="p2 shorter tablet_small">
        <h3>Learn more...</h3>
            <p class="text">You can also shoot us a direct message on our Instagram. Give us a follow while you're there to get
                the most up to date information about our videos! Some of our shows, like "Misguided Connections" are exclusively posted on
                Instagram, so make sure to check those out on our account!
            </p>
            <p class="text">
                We also share exclusive behind the scenes footage of the making
                and editing of our videos so you can feel like you're a part of the UVM TV process, because you are! Our viewers make what
                we do possible and we wouldn't be able to continue if it wasn't for you!
                <a href="https://www.instagram.com/uvm_tv/" target="_blank">@uvm_tv</a>
            </p>
        </section>
        <img src="images/instagram.jpg" alt="Instagram image" class="img_small smaller">
    </section>

    <section class="grid">
        <h2 class="header2">Youtube</h2>
        <section class="p3 shorter tablet_small">
        <h3>Learn more...</h3>
            <p class="text">Engage with us on our YouTube page! Comment under videos telling us what you enjoy and we should
                make more of! You can see a variety of content on our YouTube channel. From interviews to tv series to livestreams, UVM TV has it all!
                Some of our newest videos include a partnership with <a href="http://wruv.org/" target="_blank">WRUV</a> exposure which highlights
                local artists. </p>

            <p class="text">We also did our first pilot of a live stream with "UVMtv: Live from the Davis Center!" in April 2022. The two hour livestream
                included topical news comedy in the style of late night shows, answering funny questions from the public, audience participation contests,
                fake animal experts and tarot card readers, and even a funny contest called "evil sandwiches." What is "evil sandwiches," you might ask? Navigate
                to our <a href="https://www.youtube.com/c/UVMtv" target="_blank">YouTube channel</a> to find out!
            </p>
        </section>
        <img src="images/youtube.jpg" alt="Youtube image" class="img_small smaller">
    </section>

    <section>
        <h2 class="header2">Get in contact with the 2022-2023 executive board!</h2>
        <table>
            <?php
            $sql = 'SELECT fldName, fldPosition, fldEmail, fldGradYear FROM tblContact';
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $execs = $statement->fetchAll();

            print '<tr>' . PHP_EOL;
            print '<th>Name</th>' . PHP_EOL;
            print '<th>Position</th>' . PHP_EOL;
            print '<th>Email</th>' . PHP_EOL;
            print '<th>Graduation Year</th>' . PHP_EOL;
            print '</tr>' . PHP_EOL;
            foreach ($execs as $exec) {
                print '<tr>';
                print PHP_EOL;
                print '<td>' . $exec['fldName'] . '</td>';
                print '<td>' . $exec['fldPosition'] . '</td>';
                print '<td>' . $exec['fldEmail'] . '</td>';
                print '<td>' . $exec['fldGradYear'] . '</td>';
                print PHP_EOL;
                print '</tr>' . PHP_EOL;
            }

            print '<tr><td colspan="4">Source: <cite>Anja Samsom</cite></td></tr>';

            ?>
        </table>
    </section>


</main>
<?php include "footer.php"; ?>

</body>

</html>