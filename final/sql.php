<?php include "top.php"; ?>

<main>
    <p>Create Table SQL</p>

    <pre class = "white_text">
    CREATE TABLE tblFormUVMTV(
            pmkSurveyID INT AUTO_INCREMENT PRIMARY KEY,
            fldFirstName VARCHAR(25),
            fldLastName VARCHAR(60),
            fldIdea VARCHAR(200),
            fldPost tinyint(1),
            fldHelp tinyint(1),
            fldJoin tinyint(1),
            fldTime VARCHAR(5),
            fldUVM VARCHAR(4),
            fldEmail VARCHAR(60)
        )

        INSERT INTO tblFormUVMTV
        (fldFirstName, fldLastName, fldIdea, fldPost, fldHelp, fldJoin, fldTime, fldUVM, fldEmail)
        VALUES('Anja', 'Samsom', 'Fun video', 0, 1, 0, 'no', 'yesS', 'anjavt14@gmail.com')
    
    
    </pre>
    <pre>
    INSERT INTO tblContact
       		(fldFirstName, fldLastName, fldPosition, fldEmail, fldGradYear)
    VALUES('Adalia', 'Williams', 'Station Manager', 'Adalia.Williams@uvm.edu', 2023),
               ('Mac', 'Weaver', 'Program Director', '	mmweaver@uvm.edu', 2023),
               ('Simon', 'Page', 'Treasurer', 'Simon.Page@uvm.edu', 2023),
               ('Max', 'Bierdan', 'Technical Director', 'Maxwell.Bierden@uvm.edu', 2025),
               ('Annika', 'Safford', 'Public Relations Officer', 'Annika.Safford@uvm.edu', 2024),
               ('Anja', 'Samsom', 'Social Media Manager', 'Anja.Samsom@uvm.edu', 2024)
    </pre>

</main>

<?php include "footer.php"; ?>


</body>

</html>