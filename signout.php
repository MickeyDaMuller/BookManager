
<?php
session_start();
if(session_destroy())
{
header("Location: register.php");
echo '<script>
  window.location.href = "register.php";
</script>';
exit;
}
 
?>