<?php
session_start();
unset($_SESSION['username']);
    include '../include/header.php';
?>
<script type="text/javascript">
	window.location.replace('../index.php');
</script>
</body>
</html>