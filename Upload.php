<?php
function ImageUpload($fileInputName = "user_image") {
    $targetDir = "images/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] === 0) {
        $file_Name = basename($_FILES[$fileInputName]["name"]);
        $target_File = $targetDir . $file_Name;
        $image_File_Type = strtolower(pathinfo($target_File, PATHINFO_EXTENSION));
        $check_size = getimagesize($_FILES[$fileInputName]["tmp_name"]);


        if ($check_size === false) return "";
        if ($_FILES[$fileInputName]["size"] > 5 * 1024 * 1024) return "";
        $allowed_Types = ["jpeg","jpg","png","gif"];
        if (!in_array($image_File_Type, $allowed_Types)) return "";
        if (move_uploaded_file($_FILES[$fileInputName]["tmp_name"], $target_File)) {
            return $file_Name;
        }
    }

    return "";
}
?>
