<?php
    function file_upload($picture, $src = "user") {
        $result = new stdClass();
        if($src == "cars"){
        $result->fileName = "car1.jpg";

        }
        $result->fileName = "avatar.png";
        $result->error = true;

        $fileName = $picture['name'];
        $fileTmpName = $picture['tmp_name'];
        $fileError = $picture['error'];
        $fileSize = $picture['size'];
        $fileExtention = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $filesAllowed = ['png', 'jpg', 'jpeg'];

        if ($fileError == 4) {
            $result->ErrorMessage = "No picture was chosen. It can always be updated later.";
            return $result;
        } else {
            if (in_array($fileExtention, $filesAllowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 500000) {
                        $fileNewName = uniqid('') . "." . $fileExtention;
                        $destination = "pictures/$fileNewName";
                        if($src == "cars"){
                            $destination = "../img/$fileNewName";
                    
                        }
                        if (move_uploaded_file($fileTmpName, $destination)) {
                            $result->error = 0;
                            $result->fileName = $fileNewName;
                            return $result;
                        } else {
                            $result->ErrorMessage = "There was an error uploading this file.";
                            return $result;
                        }
                    } else {
                        $result->ErrorMessage = "This picture is bigger than the allowed 500Kb. <br> Please choose a smaller one and Update your profile.";
                        return $result;
                    }
                } else {
                    $result->ErrorMessage = "There was an error uploading - $fileError code. Check php documentation.";
                    return $result;
                }
            } else {
                $result->ErrorMessage = "This file type cant be uploaded.";
                return $result;
            }
        }
    }