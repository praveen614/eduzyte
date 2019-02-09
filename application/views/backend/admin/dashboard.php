 


<hr />
<div class="row">
    

    <div class="col-md-4">
        <div class="row">
         
            <div class="col-md-12">

                <div class="tile-stats tile-green">
                    <div class="icon"><i class="entypo-users"></i></div>
                    <div class="num" data-start="0" data-end="3"
                            data-postfix="" data-duration="800" data-delay="0">0</div>

                    <h3><?php echo 'Tutorpreneurs';?></h3>
                   
                </div>

            </div>
          
        </div>
    </div>
     <div class="col-md-4">
        <div class="row">
         
            <div class="col-md-12">

                <div class="tile-stats tile-yellow">
                    <div class="icon"><i class="fa fa-money"></i></div>
                    <div class="num" data-start="0" data-end="4"
                            data-postfix="" data-duration="800" data-delay="0">0</div>

                    <h3><?php echo 'Digital Content Users';?></h3>
                   
                </div>

            </div>
          
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
         
            <div class="col-md-12">

                <div class="tile-stats tile-blue">
                    <div class="icon"><i class="fa fa-rupee"></i></div>
                    <div class="num" data-start="0" data-end="5"
                            data-postfix="" data-duration="800" data-delay="0">0</div>

                    <h3><?php echo 'Hours of Tutoring';?></h3>
                   
                </div>

            </div>
          
        </div>
    </div>

</div>



  <script>
  $(document).ready(function() {

      var calendar = $('#notice_calendar');

                $('#notice_calendar').fullCalendar({
                    header: {
                        left: 'title',
                        right: 'today prev,next'
                    },

                    //defaultView: 'basicWeek',

                    editable: false,
                    firstDay: 1,
                    height: 530,
                    droppable: false,

                    /*events: [
                        <?php
                        $notices    =   $this->db->get('noticeboard')->result_array();
                        foreach($notices as $row):
                        ?>
                        {
                            title: "<?php echo $row['notice_title'];?>",
                            start: new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>),
                            end:    new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>)
                        },
                        <?php
                        endforeach
                        ?>

                    ]*/
                });
    });
  </script>