<?php
 function upload_file($file_name){
            $upload_path1 = "uploads/hotel/";
            $config1['upload_path'] = $upload_path1;
            $config1['allowed_types'] = "gif|jpg|png|jpeg";
            $config1['max_size'] = "20480000";
            $img_name1 = strtolower($_FILES[$file_name]['name']);
            $img_name1 = preg_replace('/[^a-zA-Z0-9\.]/', "_", $img_name1);
            $config1['file_name'] = date("YmdHis") . rand(0, 9999999) . "_" . $img_name1;
            $this->load->library('upload', $config1);
            $this->upload->initialize($config1);
            $this->upload->do_upload($file_name);
            $fileDetailArray1 = $this->upload->data();
            return $fileDetailArray1['file_name'];

    }


?>