<?php 
$edit_data      =   $this->db->get_where('tutor_personal_profile' , array('tutor_id' => $param2) )->row();
//echo "<pre>";print_r($edit_data);
$country = $this->db->get_where('country',array('id' =>$edit_data->country_id))->row()->country;

?>
<h2>Tutor personal information</h2>
<hr></hr>
<div class="row">
    <div class="col-md-12">
<table width="500" border="0" align="center" cellpadding="5">
            <tr>
                <td colspan="2"><h3>Basic Info</h3><hr/></td>
            </tr>			
            <tr>
                <td width="50%" align="left"><b>Full Name:</b></td>
                <td><?= $edit_data->title.'.'.ucfirst($edit_data->first_name).' '.ucfirst($edit_data->last_name);?></td>
            </tr>
            <tr>
                <td align="left"><b>Gender : </b></td>
                <td><?= $edit_data->gender?></td>
            </tr>
            <tr>
                <td align="left"><b>Date of Birth:</b></td>
                <td><?= $edit_data->dob?></td>
            </tr>
			<tr>
                <td align="left"><b>Profile:</b></td>
                 <td><?php if($edit_data->profile_image !=''){?>
				 <img src="<?php echo base_url('uploads/tutor_profile/').$edit_data->profile_image;?>" height="80px" width="80px"><?php }?></td>
            </tr>
            
            <tr>
                <td colspan="2"><h3>Address Details</h3><hr/></td>
            </tr>
            <tr>
                <td align="left" valign="top"><b>Address 1:</b></td>
                 <td><?= $edit_data->address_1?></td>
                
            </tr>            
            <tr>
                <td align="left"><b>Landmark:</b></td>
                <td><?= $edit_data->landmark?></td>
            </tr>
            <tr>
                <td align="left"><b>City:</b></td>
                <td><?= $edit_data->city?></td>
            </tr>
            <tr>
                <td align="left"><b>Home town:</b></td>
                <td><?= $edit_data->home_town?></td>
            </tr>
            <tr>
                <td align="left"><b>State:</b></td>
                <td><?= $edit_data->state?></td>
            </tr>
            <tr>
                <td align="left"><b>Country:</b></td>
                <td><?= $country;?></td>
            </tr>
            <tr>
                <td align="left"><b>Zip Code:</b></td>
                <td><?= $edit_data->zip_code?></td>
            </tr>
            <tr>
                <td colspan="2"><h3>Contact Details<h3><hr/></td>
            </tr>
            <tr>
                <td align="left"><b>Mobile:</b></td>
                <td><?= $edit_data->mobile?></td>
            </tr><tr>
                <td align="left"><b>Mobile 2:</b></td>
                <td><?= $edit_data->mobile_2?></td>
            </tr><tr>
                <td align="left"><b>whatsup no:</b></td>
                <td><?= $edit_data->whatsup_no?></td>
            </tr><tr>
                <td align="left"><b>Skype ID:</b></td>
                <td><?= $edit_data->skype_id?></td>
            </tr><tr>
                <td align="left"><b>Email:</b></td>
                <td><?= $edit_data->email?></td>
            </tr><tr>
                <td align="left"><b>Alternative Email:</b></td>
                <td><?= $edit_data->alternative_email?></td>
            </tr>
            <tr>
                <td colspan="2"><h3>Social Links</h3><hr/></td>
            </tr>
            <tr>
                <td align="left"><b>Facebook:</b></td>
                <td><?= $edit_data->facebook_link?></td>
            </tr><tr>
                <td align="left"><b>Twitter:</b></td>
                <td><?= $edit_data->twitter_link?></td>
            </tr><tr>
                <td align="left"><b>linkedin:</b></td>
                <td><?= $edit_data->linkedin_link?></td>
            </tr><tr>
                <td align="left"><b>youtube :</b></td>
                <td><?= $edit_data->youtube_link?></td>
            </tr>
            <tr>
                <td colspan="2"><h3>Document Details</h3><hr/></td>
            </tr>
            <tr>
                <tr>
                <td align="left"><b>Government Id proof:</b></td>
                <td><?php if($edit_data->govt_id_prof_file !=''){?>
                  <img src="<?php echo base_url('uploads/tutor_documents/').$edit_data->govt_id_prof_file;?>" height="80px" width="80px">
                    <a href="<?php echo base_url().'uploads/tutor_documents/'.$edit_data->govt_id_prof_file; ?>" class="btn btn-blue btn-xs btn-icon icon-left" download>
                        <i class="entypo-download"></i>
                        <?php echo 'Download';?>
                    </a>
                    <?php }?></td>
            </tr><tr>
                <td align="left"><b>Address Id proof:</b></td>
                <td><?php if($edit_data->address_prof_file !=''){?>
                  <img src="<?php echo base_url('uploads/tutor_documents/').$edit_data->address_prof_file;?>" height="80px" width="80px">
                    <a href="<?php echo base_url().'uploads/tutor_documents/'.$edit_data->address_prof_file; ?>" class="btn btn-blue btn-xs btn-icon icon-left" download>
                        <i class="entypo-download"></i>
                        <?php echo 'Download';?>
                    </a>
                    <?php }?></td>
            </tr><tr>
            </tr>
        </table>
        </div>
        </div>