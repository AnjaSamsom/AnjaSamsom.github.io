<?php include "top.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



function getData($field)
{
    if (!isset($_POST[$field])) {
        $data = "";
    } else {
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
    }
    return $data;
}

function verifyAlphaNum($testString)
{
    // Check for letters, numbers and dash, period, space and single quote only.
    // added & ; and # as a single quote sanitized with html entities will have 
    // this in it bob's will be come bob's
    return (preg_match("/^([[:alnum:]]|-|\.| |\'|&|;|#)+$/", $testString));
}


?>
<main class="grid">
    <h1 class="header1">Get involved!</h1>
    <section class="sec1">
        <h2 class="header2">Have a video idea?</h2>
        <section class="p1 fixed phone_small">
            <h3>Learn more...</h3>
            <p class="text">Do you have an idea for the next big UVM TV video? Or want us to film a promotional video or event for
                your club or organization? Join us at our meetings on Mondays from 7-8 pm in Sichell Hall
                on Trinity campus and pitch it to us! Or, fill out the form and we will get back to you!
            </p>
        </section>
    </section>
    <section class="sec2">
        <h2 class="header2">How we make videos</h2>
        <section class="p2 fixed phone_small">
            <h3>Learn more...</h3>
            <p class="text">All of our videos come to be from bouncing ideas around in meetings. We then assign roles to
                our members, storyboard, cast the actors, and get filming! Some videos, like the Valentine's Day Special, were made in a couple of weeks,
                while others, like the short film "The Weregator" can take months to perfect! We aim to post a variety of lengths and topics of our
                videos!
            </p>
        </section>
    </section>

    <section class="sec3">
        <h2 class="header2">Tell us about it!</h2>
        <?php
        print "<section class = 'p3 text' id = 'formP'>";
        print "<h3>What's on your mind...</h3>";



        // names
        $firstName = "";
        $lastName = "";
        // text area
        $idea = "";
        // checkboxes
        $post = 0;
        $help = 0;
        $join = 0;
        // list box
        $time = "";
        // radio buttons
        $UVM = "";
        // email
        $email = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $dataIsGood = true;

            // server side sanitation
            // names
            $firstName = getData("txtFirstName");
            $lastName = getData("txtLastName");
            // text area
            $idea = getData("txtIdea");
            // checkboxes
            $post = (int)getData("chkPost");
            $help = (int)getData("chkHelp");
            $join = (int)getData("chkJoin");
            // list box
            $time = getData("lstTime");
            // radio buttons
            $UVM = getData("radUVM");
            // email
            $email = getData("txtContact");
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);

            // 23 minutes into lab video


            // validate form
            if ($firstName == "") {
                print "<p>Please enter your first name</p>";
                $dataIsGood = false;
            } elseif (!verifyAlphaNum($firstName)) {
                print "<p>Your first name contains invalid characters. Please use letters and submit again.</p>";
                $dataIsGood = false;
            }

            if ($lastName == "") {
                print "<p>Please enter your last name</p>";
                $dataIsGood = false;
            } elseif (!verifyAlphaNum($lastName)) {
                print "<p>Your last name contains invalid characters. Please use letters and submit again.</p>";
                $dataIsGood = false;
            }

            if ($idea == "") {
                print "<p>Please enter your idea</p>";
                $dataIsGood = false;
            } elseif (!verifyAlphaNum($idea)) {
                print "<p>Your response contains invalid characters. Please use letters and submit again.</p>";
                $dataIsGood = false;
            }


            // needs

            $needsArray = array($post, $help, $join);
            foreach ($needsArray as $need) {
                if ($need != 0 and $need != 1) {
                    print "<p>Invalid checkbox data, fix and submit again.</p>";
                    $dataIsGood = false;
                }
            }

            // issues with timeline
            // timeline (list box)
            if ($time != "week" and $time != "month" and $time != "6" and $time != "no") {
                print "<p>Please chose a timeline and submit again.</p>";
                $dataIsGood = false;
            }

            // UVM affiliation
            if ($UVM != "yesS" and $UVM != "yesF" and $UVM != "no") {
                print "<p>Please chose an affiliation and submit again.</p>";
                $dataIsGood = false;
            }

            // email
            if ($email == "") {
                print "<p>Please enter your email and submit again.</p>";
                $dataIsGood = false;
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                print "<p>Your email address is formatted oddly</p>";
                $dataIsGood = false;
            }
            // 35 minutes into lab video


            if ($dataIsGood) {
                $sql = 'INSERT INTO tblFormUVMTV
                (fldFirstName, fldLastName, fldIdea, fldPost, fldHelp, fldJoin, fldTime, fldUVM, fldEmail)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
                $statement = $pdo->prepare($sql);
                $params = array($firstName, $lastName, $idea, $post, $help, $join, $time, $UVM, $email);

                if ($statement->execute($params)) {
                    print '<p>Request was successfully saved, thank you for your inquiry! We will get back to you shortly!</p>';
                    $to = $email;
                    $from = 'CS 008 Anja Samsom <asamsom@uvm.edu>';
                    $subject = 'CS 008 Final Project - UVM TV Website';

                    $mailMessage = '<p style="font-size: 2em; color: white; background-color: black;"> Thank you for reaching ';
                    $mailMessage .= 'out to UVM TV with a video request. We will get back to ';
                    $mailMessage .= 'you shortly. </p><p style="font-size: 1.6em; color: white; background-color: black;"> - Anja Samsom</p>';


                    $mailMessage .= '<p style="color: white; background-color: black;">' . 'Here is a summary of your responses:</p>';
                    $mailMessage .= '<p style="color: white; background-color: black;">' . 'First name: ' .  $firstName . '</p>';
                    $mailMessage .= '<p style="color: white; background-color: black;">' . 'Last name: ' .  $lastName . '</p>';
                    $mailMessage .= '<p style="color: white; background-color: black;">' . 'Idea: ' .  $idea . '</p>';

                    if ($post == 1) {
                        $mailMessage .= '<p style="color: white; background-color: black;">Help: Post my premade video!</p>';
                    }
                    if ($help == 1) {
                        $mailMessage .= '<p style="color: white; background-color: black;">Help: Help me make a video!!</p>';
                    }
                    if ($join == 1) {
                        $mailMessage .= '<p style="color: white; background-color: black;">Help: I want to join UVM TV and make it with you!</p>';
                    }

                    if ($time == 'week') {
                        $mailMessage .= '<p style="color: white; background-color: black;">Timeline: 1-2 weeks</p>';
                    }
                    if ($time == 'month') {
                        $mailMessage .= '<p style="color: white; background-color: black;">Timeline: 1 month</p>';
                    }
                    if ($time == '6') {
                        $mailMessage .= '<p style="color: white; background-color: black;">Timeline: 6 months+</p>';
                    }
                    if ($time == 'no') {
                        $mailMessage .= '<p style="color: white; background-color: black;">Timeline: No rush!</p>';
                    }

                    if ($UVM == 'yesS') {
                        $mailMessage .= '<p style="color: white; background-color: black;">UVM affiliation: Student</p>';
                    }
                    if ($UVM == 'yesF') {
                        $mailMessage .= '<p style="color: white; background-color: black;">UVM affiliation: Faculty, Professor, Club</p>';
                    }
                    if ($UVM == 'no') {
                        $mailMessage .= '<p style="color: white; background-color: black;">UVM affiliation: No</p>';
                    }
                    $mailMessage .= '<img src="https://asamsom.w3.uvm.edu/cs008/final/images/logo.jpg" alt="logo" style = "max-width: 50%;">';

                    $headers = "MIME-Version: 1.0\r\n";
                    $headers .= "Content-type: text/html; charset=utf-8\r\n";
                    $headers .= "From: " . $from . "\r\n";
                    $mailSent = mail($to, $subject, $mailMessage, $headers);
                    if ($mailSent) {
                        print '<p>This record has been emailed to you:</p>';
                        print $mailMessage;
                    }
                } else {
                    print '<p>Request was not successfully saved, try again or email uvmtv@uvm.edu for help.</p>';
                }
            }
        }

        ?>
        <form action=" #" id="frmVideo" method="POST">
            <fieldset class="txtFirstName">
                <p>
                    <label for="txtFirstName">First Name</label>
                    <input type="text" id="txtFirstName" name="txtFirstName" value="<?php print $firstName; ?>">
                </p>
            </fieldset>
            <fieldset class="txtLastName">
                <p>
                    <label for="txtLastName">Last Name</label>
                    <input type="text" id="txtLastName" name="txtLastName" value="<?php print $lastName; ?>">
                </p>
            </fieldset>
            <fieldset class="txtIdea" id="area">
                <p>
                    <label for="txtIdea">Video idea?</label>
                    <textarea id="txtIdea" name="txtIdea"><?php print $idea; ?></textarea>
                </p>
            </fieldset>
            <fieldset class="checkbox" id="chkNeed">
                <legend>How do you want help?</legend>

                <p>
                    <input id="chkPost" name="chkPost" tabindex="310" type="checkbox" value="1" <?php if ($post == 1) {
                                                                                                    print "checked";
                                                                                                } ?>>
                    <label for="chkPost">Post my premade video!</label>
                </p>
                <p>
                    <input id="chkHelp" name="chkHelp" tabindex="310" type="checkbox" value="1" <?php if ($help == 1) {
                                                                                                    print "checked";
                                                                                                } ?>>
                    <label for="chkHelp">Help me make a video!</label>
                </p>
                <p>
                    <input id="chkJoin" name="chkJoin" tabindex="310" type="checkbox" value="1" <?php if ($join == 1) {
                                                                                                    print "checked";
                                                                                                } ?>>
                    <label for="chkJoin">I want to join UVM TV and make it with you!</label>
                </p>

            </fieldset>

            <fieldset class="listbox" id="listTime">
                <legend>What type of timeline are you looking at?</legend>

                <p>
                    <select id="lstTime" name="lstTime" tabindex="420">
                        <option value="week" <?php if ($time == "week") {
                                                    print "selected";
                                                } ?>>1-2 weeks</option>
                        <option value="month" <?php if ($time == "month") {
                                                    print "selected";
                                                } ?>>1 month</option>
                        <option value="6" <?php if ($time == "6") {
                                                print "selected";
                                            } ?>>6 months+</option>
                        <option value="no" <?php if ($time == "no") {
                                                print "selected";
                                            } ?>>No rush!</option>
                    </select>
                </p>
            </fieldset>

            <fieldset class="radio" id="radUVM">
                <legend>Are you UVM affiliated?</legend>

                <p>
                    <input type="radio" id="radYesS" name="radUVM" value="yesS" tabindex="230" required <?php if ($UVM == "yesS") {
                                                                                                            print "checked";
                                                                                                        } ?>>
                    <label class="radio-field" for="radYesS">Yes (student)</label>
                </p>
                <p>
                    <input type="radio" id="radYesF" name="radUVM" value="yesF" tabindex="230" required <?php if ($UVM == "yesF") {
                                                                                                            print "checked";
                                                                                                        } ?>>
                    <label class="radio-field" for="radYesF">Yes (faculty, professor, club)</label>
                </p>
                <p>
                    <input type="radio" id="radNo" name="radUVM" value="no" tabindex="230" required <?php if ($UVM == "no") {
                                                                                                        print "checked";
                                                                                                    } ?>>
                    <label class="radio-field" for="radNo">No</label>
                </p>
            </fieldset>

            <fieldset id="txtContactInfo">
                <p>
                    <label for="txtContact">Email:</label>
                    <input type="text" id="txtContact" name="txtContact" value="<?php print $email; ?>">
                </p>
            </fieldset>
            <fieldset id="submit">
                <p class="center">
                    <input type="submit" value="Submit" class="rounded_button">
                </p>
            </fieldset>

        </form>
    </section>
    </section>

</main>
<?php include "footer.php"; ?>

</body>

</html>