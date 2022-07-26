<nav>

    <a class ="navText <?php
    if($pathParts['filename'] == "index")
    {
        print 'activePage';
    }
    ?>" href="index.php">Home</a>


    <a class ="navText <?php
    if($pathParts['filename'] == "videos")
    {
        print 'activePage';
    }
    ?>" href="videos.php">Videos</a>
    
    <a class ="navText <?php
    if($pathParts['filename'] == "livestream")
    {
        print 'activePage';
    }
    ?>" href="livestream.php">Livestream</a>

    <a class ="navText <?php
    if($pathParts['filename'] == "contact")
    {
        print 'activePage';
    }
    ?>" href="contact.php">Contact</a>


    <a class ="navText <?php
    if($pathParts['filename'] == "form")
    {
        print 'activePage';
    }
    ?>" href="form.php">Video&nbsp;Request</a>


</nav>

