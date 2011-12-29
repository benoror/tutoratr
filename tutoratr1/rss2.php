<?
/**********************************************************************************
 * rss.php
 * Version: 1.00
 * Author: Rogers Cadenhead
 * Date: 05/21/2004
 * http://www.cadenhead.org/workbench/
 *
 **********************************************************************************
 This program is distributed in the hope that it will be useful, but WITHOUT ANY
 WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 PARTICULAR PURPOSE.

 This work is hereby released into the Public Domain. To view a copy of the public
 domain dedication, visit http://creativecommons.org/licenses/publicdomain/ or
 send a letter to Creative Commons, 559 Nathan Abbott Way, Stanford, California
 94305, USA.
 **********************************************************************************/

// prepare HTML text for use as UTF-8 character data in XML
function cleanText($intext) {
    return utf8_encode(
        htmlspecialchars(
            stripslashes($intext)));
}

// set the file's content type and character set
// this must be called before any output
header("Content-Type: text/xml;charset=utf-8");

// retrieve database records
include('db.php');
$query1 = "select * from `itesm-mty` order by id desc limit 10";
$result1 = mysql_query($query1);
$phpversion = phpversion();

// display RSS 2.0 channel information

ECHO <<<END
<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0">
   <channel>
      <title>Tutoratr - itesm-mty</title>
      <link>http://tutoratr.awardspace.com</link>
      <description>Las 10 calificaciones mas recientes.</description>
      <language>en-us</language>
      <docs>http://backend.userland.com/rss</docs>
      <generator>PHP/$phpversion</generator>
END;

// loop through the array pulling database fields for each item
for ($i = 0; $i < mysql_num_rows($result1); $i++) {
   @$row = mysql_fetch_array($result1);
   $title = "[".cleanText($row["rating"])."] ".cleanText($row["tutor"])."";
   $link = "http://tutoratr.awardspace.com/browse.php?id=".$row["id"];
   $description = cleanText($row["comment"]);
   $guid = "tag:tutoratr.com,".$row["date"].":tutoratr.".$row["id"];
   $pubDate = date("r", strtotime($row["date"]));

// display an item
ECHO <<<END

      <item>
         <title>$title</title>
         <link>$link</link>
         <description>$description</description>
         <pubDate>$pubDate</pubDate>
         <guid isPermaLink="false">$guid</guid>
      </item>
END;

}

ECHO <<<END

   </channel>
</rss>
END;

?>
