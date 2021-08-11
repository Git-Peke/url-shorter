<?php 

if (isset($datos['url'])) {
	echo '<script>
window.location.href = "http://';
	echo $datos['url'];
	echo '";
</script>
';
}
