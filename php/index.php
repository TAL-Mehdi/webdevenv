<?php
include('api_test.php');
session_start();
if ( ($_SESSION["connect"] != true) || ($_SESSION['email']  == "" || ($_SESSION['password']  == ""))){
      $_SESSION = array();
      session_destroy();
      session_unset();
      header("location: authentification.php");
}
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>
            Synchronization Portal
        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script>
            function openWindow() {
                var help = window.open("popup", "_blank", "toolbar=no,scrollbars=no,resizable=no,top=300px,left=200px,width=350px,height=300px");
                help.document.write("<h3 style='color:olivedrab;'>Help Contacts</h3>");
                help.document.write("<h3 style='color:black;'>Developer : mehdi.khamlia@outlook.com - 98603013<br><br>");
            }
        </script>
        <style>
            body{
                margin : 0px;
            }
            * {
                box-sizing: border-box;
            }
            
            a {
                color: black;
                margin-bottom: 10px;
            }
            
            body {
                font-family: Arial, Helvetica, sans-serif;
            }
            /* Style the header */
            
            header {
                background-color: rgb(155, 186, 201);
                padding: 30px;
                text-align: center;
                font-size: 35px;
                color: white;
            }
            /* Create two columns/boxes that floats next to each other */
            
            nav {
                float: left;
                width: 30%;
                height: 300px;
                /* only for demonstration, should be removed */
                background: rgb(243, 243, 243);
                padding: 20px;
            }
            /* Style the list inside the menu */
            
            nav ul {
                list-style-type: none;
                padding: 0;
            }
            
            article {
                float: left;
                padding: 20px;
                width: 70%;
                background-color: #f1f1f1;
                height: 300px;
                /* only for demonstration, should be removed */
            }
            /* Clear floats after the columns */
            
            section::after {
                content: "";
                display: table;
                clear: both;
            }
            /* Style the footer */
            
            footer {
                background-color: rgb(155, 186, 201);
                padding: 10px;
                text-align: center;
                color: white;
            }
            
            li {
                margin-top: 13px;
            }
            
            input[type=text] {
                border-radius: 4px;
                height: 12px;
                width: 350px;
                border: 1px solid rgb(63, 63, 34);
                margin-top: 20px;
                padding: 9px;
                background-color: whitesmoke;
            }
            
            textarea:hover {
                border: 1px solid rgb(155, 186, 201);
            }
            
            textarea:focus {
                background-color: rgb(155, 186, 201);
                color: white;
            }
            
            input[type=text]:hover {
                border: 1px solid rgb(155, 186, 201);
            }
            
            input[type=text]:focus {
                background-color: rgb(155, 186, 201);
                color: white;
            }
            
            input[type=submit] {
                border-radius: 4px;
                height: 40px;
                width: 300px;
                font-size: 17px;
                background-color: rgb(155, 186, 201);
                color: white;
                border: 1px solid (63, 63, 34);
                margin-right: 10%;
            }
            
            input[type=submit]:hover {
                border: 1px solid rgb(155, 186, 201);
            }
            
            input[type=submit]:focus {
                background-color: rgb(155, 186, 201);
                color: white;
            }
            
            input[type=button]:hover {
                border: 1px solid rgb(155, 186, 201);
            }
            
            input[type=button]:focus {
                background-color: rgb(155, 186, 201);
                color: white;
            }
            
            @media (max-width: 600px) {
                nav,
                article {
                    width: 100%;
                    height: auto;
                }
            }
        </style>
    </head>

    <body>
        <header>
            <h2>&#9851;&nbsp; Synchronization Portal </h2>
            <a href="logout.php" style='position:absolute;margin-left:45%;margin-top:-10px;color:white;font-size:20px;' onmouseout="this.style.color='white'" onmouseover="this.style.color='orange'">logout</a>
        </header>
        <section>
            <nav>
                <span style="color:rgb(155, 186, 201);font-size:30px;font-weight:bold;">&#9783;</span>
                <ul>
                    <li><a onmouseout="this.style.color='black'" onmouseover="this.style.color='rgb(155, 186, 201)'" href="db_tables.php?value=orders" target='_blank'>Show Orders DB</a></li>
                    <li><a onmouseout="this.style.color='black'" onmouseover="this.style.color='rgb(155, 186, 201)'"   href="db_tables.php?value=contacts" target='_blank'>Show Contacts DB</a></li>
                    <li><a onmouseout="this.style.color='black'" onmouseover="this.style.color='rgb(155, 186, 201)'" href="db_tables.php?value=db" target='_blank'>Joined DB</a></li>
                    <li><a onmouseout="this.style.color='black'" onmouseover="this.style.color='rgb(155, 186, 201)'" target='_blank' style='cursor:pointer;' onclick="openWindow();">Help</a></li>
                </ul>
            </nav>
            <article>
                <h1>REST API </h1>
                <form method="get" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>>
                    <input type="submit" name="all" value="DB Synchronization & CSV Export" title="Synchronize, Update DB and export to CSV"> <br> <br> <br><span style='color:white;background-color:olivedrab;border-radius:8px;padding:8px;font-size:14px;float:left;opacity:0.6;'><?php echo $j." Inserted Records"; ?></span><br><br><br><span style='font-size:14px;color:white;background-color:orangered;border-radius:8px;padding:8px;opacity:0.6;'><?php echo $f." Non Inserted Records"; ?></span>
                </form>
            </article>
        </section>

        <footer>
            <p>REST API Application - Mehdi Khamlia <sup> &copy;</sup> <br> Proud to be Old School IT Developer</p>
        </footer>
    </body>

    </html>