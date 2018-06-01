<?php 
class Img{    
    function uploadImg($file, $upload_dir, $tumb_dir){
        $name = $file['name'];
        $tmp = $file['tmp_name'];
        $type = $file['type'];
        $size = $file['size'];
        $error = $file['error'];

        if($error==1){
            return 0;
        }
        if($size>6000000){
            unlink($tmp);
            return 0;
        }
        if(!preg_match("/\.(gif|jpg|png)$/i",$name)){
            return 0;
        }
        if(move_uploaded_file($tmp,$upload_dir.$name)){
            $this->resize($tumb_dir,$upload_dir,$name,200,$type);
            return 1;
        }else{
            return 0;
        }
    }
    
    function uploadImgSize($file, $upload_dir, $tumb_dir, $size){
        $name = $file['name'];
        $tmp = $file['tmp_name'];
        $type = $file['type'];
        $size = $file['size'];
        $error = $file['error'];

        if($error==1){
            return 0;
        }
        if($size>6000000){
            unlink($tmp);
            return 0;
        }
        if(!preg_match("/\.(gif|jpg|png|JPEG|JPG)$/i",$name)){
            return 0;
        }
        if(move_uploaded_file($tmp,$upload_dir.$name)){
            $this->resize($tumb_dir,$upload_dir,$name,200,$type);
            return 1;
        }else{
            return 0;
        }
    }
    
    function resize($tumb_dir, $upload_dir, $target,$tum,$type){
        list($rw,$rh) = getimagesize($upload_dir.$target);
        $w = (40*$rw)/100;
        $h = (40*$rh)/100;
        $tci = imagecreatetruecolor($w,$h);
      
        if($type=="image/png"){
            $w = (10*$rw)/100;
            $h = (10*$rh)/100;
            $tci = imagecreatetruecolor($w,$h);
            $img = imagecreatefrompng($upload_dir.$target);
            imagecopyresampled($tci,$img,0,0,0,0,$w,$h,$rw,$rh);
            imagepng($tci,$tumb_dir.$target,0);
        }else if($type=="image/gif"){
            $img = imagecreatefromgif($upload_dir.$target);
            imagecopyresampled($tci,$img,0,0,0,0,$w,$h,$rw,$rh);
            imagegif($tci,$tumb_dir.$target,80);
        }else{
            $img = imagecreatefromjpeg($upload_dir.$target);
            imagecopyresampled($tci,$img,0,0,0,0,$w,$h,$rw,$rh);
            imagejpeg($tci,$tumb_dir.$target,80);
            echo $tumb_dir.$target." ";
        }
        
        
        
    }
    
    function deleteFile($path){
        if(!unlink($path)){
            return 0;
        }else{
            return 1;
        }
    }
    
    function simpleUpload($file, $upload_dir,$size){
        $name = $file['name'];
        $tmp = $file['tmp_name'];
        $type = $file['type'];
        $size = $file['size'];
        $error = $file['error'];

        if($error==1){
            return $error;
        }
        if($size>$size){
            unlink($tmp);
            return "size";
        }
     /*   if(!preg_match("/\.(gif|jpg|png)$/i",$name)){
            return 0;
        }*/
        if(move_uploaded_file($tmp,$upload_dir.$name)){
            return 1;
        }else{
            return 0;
        }
    }
}
?>