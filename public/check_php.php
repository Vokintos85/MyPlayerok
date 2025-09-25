<?php
echo "<h3>PHP Upload Settings:</h3>";
echo "upload_max_filesize: " . ini_get('upload_max_filesize') . "<br>";
echo "post_max_size: " . ini_get('post_max_size') . "<br>";
echo "max_file_uploads: " . ini_get('max_file_uploads') . "<br>";
echo "upload_tmp_dir: " . ini_get('upload_tmp_dir') . "<br>";
echo "sys_get_temp_dir(): " . sys_get_temp_dir() . "<br>";
echo "Tmp dir exists: " . (is_dir(sys_get_temp_dir()) ? 'YES' : 'NO') . "<br>";
echo "Tmp dir writable: " . (is_writable(sys_get_temp_dir()) ? 'YES' : 'NO') . "<br>";
echo "Disk free space: " . round(disk_free_space(sys_get_temp_dir()) / 1024 / 1024) . " MB<br>";

echo "<h3>File Upload Test:</h3>";
if ($_FILES) {
    echo "File uploaded: " . $_FILES['file']['name'] . "<br>";
    echo "Temp path: " . $_FILES['file']['tmp_name'] . "<br>";
    echo "Temp file exists: " . (file_exists($_FILES['file']['tmp_name']) ? 'YES' : 'NO') . "<br>";
}
?>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Test Upload">
</form>
