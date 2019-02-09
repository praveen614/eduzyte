<?php 
$edit_data      =   $this->db->get_where('tutor_teaching' , array('tutor_id' => $param2) )->row();

	$medium = $this->db->get_where('medium' , array('id' => $edit_data->medium_id) )->row()->medium;
?>

<h2>Tutor teaching details</h2>
<hr></hr>
<div class="row">
    <div class="col-md-12">
<table width="500" border="0" align="center" cellpadding="5">
            <tr>
                <td colspan="2"><h3>Basic Info</h3><hr/></td>
            </tr>           
            <tr>
                <td width="50%" align="left"><b>Teaching Expertise:</b></td>
                <td><?= $edit_data->teaching_expertise;?></td>
            </tr>
            <tr>
                <td align="left"><b>Medium : </b></td>
                <td><?= $medium?></td>
            </tr>
            <tr>
                <td align="left"><b>Total Experience:</b></td>
                <td><?= $edit_data->total_experience?></td>
            </tr>
            <tr>
                <td align="left" valign="top"><b>Online Experience:</b></td>
                 <td><?= $edit_data->online_experience?></td>
                
            </tr>            
            <tr>
                <td align="left"><b>Digital Pen:</b></td>
                <td><?= $edit_data->digital_pen_status?></td>
            </tr>
            <tr>
                <td align="left"><b>Digital Slate:</b></td>
                <td><?= $edit_data->digital_slate_status?></td>
            </tr>
            <tr>
                <td align="left"><b>Presant Working as Teacher:</b></td>
                <td><?= $edit_data->full_time_teacher?></td>
            </tr>
            <tr>
                <td align="left"><b>Working Time:</b></td>
                <td><?= $edit_data->opportunities?></td>
            </tr>
            <tr>
                <td align="left"><b>Expecting hourly Pricing:</b></td>
                <td><?= '$ '.$edit_data->hourly_price;?></td>
            </tr>
            <tr>
                <td align="left"><b>Teaching Approach:</b></td>
                <td><?= $edit_data->teaching_approach?></td>
            </tr>
            
            <tr>
            </tr>
        </table>
        </div>
        </div>