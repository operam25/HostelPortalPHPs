<?php

// error_reporting(0);
 
// $db_name = "localhost";
// $mysql_user = "root";
// $mysql_pass = "" ;
// $server_name = "localhost";

// $con = mysqli_connect($server_name, $mysql_user, $mysql_pass, $db_name);
 
// if(!$con){
//     echo '{"status":"Unable to connect to the database."}';
// }else{


//     $search = $_POST['search'];
//     $words   = preg_split('/\s+/', $search);
//     $search = "";
//     $i = 1;
//     foreach($words as $key => $value) {
//         if($i == 1){
//             $search = "words.words LIKE '" + strtolower($value) + "'";
//         }else{
//             $search += " OR words.words LIKE '" + strtolower($value) + "'";
//         }
//         $i++;
//     }


//     $qury = "SELECT distinct pages.url,ranks.ranks FROM links JOIN pages JOIN words JOIN ranks ON links.word_id = words.id AND links.url_id = pages.id AND links.url_id = ranks.url WHERE" + $search +  " ORDER BY rank DESC";

//     $result = mysqli_query($con,$qury);

// }
 
?>

<html>
    <head>
        <meta charset="utf-8">
<title>Admin Panel</title>
<style type="text/css">
body {
    background: #fafafa;
    color: #444;
    font: 100%/30px 'Helvetica Neue', helvetica, arial, sans-serif;
    text-shadow: 0 1px 0 #fff;
}

strong {
    font-weight: bold; 
}

em {
    font-style: italic; 
}

table {
    background: #f5f5f5;
    border-collapse: separate;
    box-shadow: inset 0 1px 0 #fff;
    font-size: 12px;
    line-height: 24px;
    margin: 30px auto;
    text-align: left;
}   

th {
    background:  linear-gradient(#777, #444);
    border-left: 1px solid #555;
    border-right: 1px solid #777;
    border-top: 1px solid #555;
    border-bottom: 1px solid #333;
    box-shadow: inset 0 1px 0 #999;
    color: #fff;
  font-weight: bold;
    padding: 10px 15px;
    position: relative;
    text-shadow: 0 1px 0 #000;  
}

th:after {
    background: linear-gradient(rgba(255,255,255,0), rgba(255,255,255,.08));
    content: '';
    display: block;
    height: 25%;
    left: 0;
    margin: 1px 0 0 0;
    position: absolute;
    top: 25%;
    width: 10%;
}

th:first-child {
    border-left: 1px solid #777;    
    box-shadow: inset 1px 1px 0 #999;
}

th:last-child {
    box-shadow: inset -1px 1px 0 #999;
}

td {
    border-right: 1px solid #fff;
    border-left: 1px solid #e8e8e8;
    border-top: 1px solid #fff;
    border-bottom: 1px solid #e8e8e8;
    padding: 10px 15px;
    position: relative;
    transition: all 300ms;
}

td:first-child {
    box-shadow: inset 1px 0 0 #fff;
}   

td:last-child {
    border-right: 1px solid #e8e8e8;
    box-shadow: inset -1px 0 0 #fff;
}   

tr {
      
}

tr:nth-child(odd) td {
    background: #f1f1f1 ;  
}

tr:last-of-type td {
    box-shadow: inset 0 -1px 0 #fff; 
}

tr:last-of-type td:first-child {
    box-shadow: inset 1px -1px 0 #fff;
}   

tr:last-of-type td:last-child {
    box-shadow: inset -1px -1px 0 #fff;
}   

tbody:hover td {
    color: transparent;
    text-shadow: 0 0 3px #aaa;
}

tbody:hover tr:hover td {
    color: #444;
    text-shadow: 0 1px 0 #fff;
}

button {
background-color: #008dde;
border: none;
border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
color: #f4f4f4;
cursor: pointer;
font-family: 'Open Sans', Arial, Helvetica, sans-serif;
height: 30px;
text-transform: uppercase;
width: 80px;
-webkit-appearance:none;
}

</style>
    </head>
    <body>
        <form>
        <table>
        <thead>
            <tr>
                <td>Url</td>
                <td>Rank</td>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td onclick="location.href='https://www.google.com'">go to yourpage</td>
                    <td>hi</td>
                </tr>

            </tbody>
            </table>
        </form>
    </body>
</html> 