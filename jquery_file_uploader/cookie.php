<html>
<body>

<?php
if (isset($_COOKIE["ebUploadPageImages"]))
  echo "Welcome " . $_COOKIE["ebUploadPageImages"] . "!<br />";
else
  echo "Welcome guest!<br />";
?>

</body>
</html> 