<!DOCTYPE html>
<?php
    $xss ="";
    if(isset($_GET['xss'])){
        $xss = $_GET['xss'];
    }
?>

<html>
    <head>
        <script>
            function x(a, b) {
                console.log(`1. ${a}`);
                console.log(`2. ${b}`);
            }
            x("a", "<?= $xss ?>");
        </script>
    </head>
    <body>
        <h1> XSS TEST </h1>
        <form action="/">
            <input type="text" name="xss" placeholder="xss">
            <input type="submit" value="Submit">
        </form>
    </body>
</html>

<!-- 
    Starting of the server command: php -S 0.0.0.0:8888 

    IP in Browser: http://localhost:8888 or http://127.0.0.1:8888 
-->