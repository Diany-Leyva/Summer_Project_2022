<?php











fclose($myfile);



// - List the LACRM employees in alphabetical order
//     - Make an array of LACRM employees that isn’t sorted alphabetically by default (you don’t have to include everyone if you don’t want)
//     - Use PHP to sort the list alphabetically (you’ll have to look up how to do this)
//     - Loop through the array and echo each person’s name (use line breaks and css to make it pleasant to look at)
//     - Make a version that does it in reverse alphabetical order



<?php
// Get a file into an array.  In this example we'll go through HTTP to get
// the HTML source of a URL.
$lines = file('http://www.example.com/');

// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($lines as $line_num => $line) {
    echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
}

// Using the optional flags parameter
$trimmed = file('somefile.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
?>




$myfile = fopen("employees.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("employees.txt"));
$employees = array($myfile);
echo count($employees);