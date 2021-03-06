    <script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../assets/js/popper.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="../assets/js/progress.js"></script>

    <!-- DataTables Bootstrap 4 Plugin -->
    <script type="text/javascript" src="../assets/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../assets/js/dataTables.bootstrap4.js"></script>
    <script type="text/javascript" src="../assets/js/dataTables.select.js"></script>

    <!-- Validator -->
    <script type="text/javascript" src="../assets/js/validator.js"></script>
    
    <!-- Switches -->
    <script src="../assets/js/bootstrap-switch.min.js"></script>

    <!--  Plugins for Slider -->
    <script src="../assets/js/nouislider.js"></script>

    <!-- jQuery Custom Scroller CDN -->
    <!-- <script type="text/javascript" src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script> -->

    <!-- jQuery TouchSwipe -->
    <script type="text/javascript" src="../assets/js/jquery.touchSwipe.min.js"></script>

    <!--  Plugins for DateTimePicker -->
    <script src="../assets/js/moment.min.js"></script>
    <script src="../assets/js/gijgo.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            
            document.getElementById('btn_existing_sy').disabled = true;

            <?php if (isset($sy_message)) { // If School Year is not set, disable buttons ?>
                var student_section = document.getElementById('btn_save_stsc');
                if (student_section) student_section.disabled = true;

                var subj = document.getElementById('btn_save_subject');
                if (subj) subj.disabled = true;

                var student_subj = document.getElementById('btn_save_sts');
                if (student_subj) student_subj.disabled = true;

                var instructor_subj = document.getElementById('btn_save_inss');
                if (instructor_subj) instructor_subj.disabled = true;

                var new_student = document.getElementById('save_new_info');
                if (new_student) new_student.disabled = true;

                var existing_student = document.getElementById('save_existing_info');
                if (existing_student) existing_student.disabled = true;


            <?php } ?>

            $('.overlay').on('click', function() {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });

            $(window).scroll(function (){
                if ($(this).scrollTop() > 50) {
                    $('#back-to-top').fadeIn();
                } else {
                    $('#back-to-top').fadeOut();
                }
            });


            $('#edit').tooltip();

            function isNativeApp() {
                return /AppName\/[0-9\.]+$/.test(navigator.userAgent);
            }

            if (isNativeApp()) {
                swipeSideBar();

                $('.modal-dialog').addClass('modal-dialog-centered');

                var mon = document.getElementById('monday');
                if (mon) mon.innerHTML = 'Monday';

                var tue = document.getElementById('tuesday');
                if (tue) tue.innerHTML = 'Tuesday';

                var wed = document.getElementById('wednesday');
                if (wed) wed.innerHTML = 'Wednesday';

                var thu = document.getElementById('thursday');
                if (thu) thu.innerHTML = 'Thursday';

                var fri = document.getElementById('friday');
                if (fri) fri.innerHTML = 'Friday';
                
                var sat = document.getElementById('saturday');
                if (sat) sat.innerHTML = 'Saturday';
            }

            if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
                || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
                
                swipeSideBar();

                $('.modal-dialog').addClass('modal-dialog-centered');
                
                document.getElementById('monday').innerHTML = 'Monday';
                document.getElementById('tuesday').innerHTML = 'Tuesday';
                document.getElementById('wednesday').innerHTML = 'Wednesday';
                document.getElementById('thursday').innerHTML = 'Thursday';
                document.getElementById('friday').innerHTML = 'Friday';
                document.getElementById('saturday').innerHTML = 'Saturday'; 
            }

            function swipeSideBar() {
                $('.swipe-area').swipe({
                    swipeStatus: function(event, phase, direction, duration, fingers) {
                        if (phase == 'move' && direction == 'right') {
                            $('#sidebar').addClass('active');
                            $('.overlay').addClass('active');
                            $('.collapse.in').toggleClass('in');
                            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                            return false;
                        }   
                    }
                });
                $('.overlay').swipe({
                    swipeStatus: function(event, phase, direction, duration, fingers) {
                        if (phase == 'move' && direction == 'left') {
                            $('#sidebar').removeClass('active');
                            $('.overlay').removeClass('active');
                            return false;
                        }
                    }
                });
            }
            
        });

        function checkSY(sy, sem) {
            if (sy == "" || sem == "") {
                document.getElementById('btn_existing_sy').disabled = true;
                document.getElementById('result').innerHTML = '';
                return;
            } else {
                document.getElementById('btn_existing_sy').disabled = false;
            }

            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // IE6 IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    var result = this.responseText;
                    if (result == true) {
                        document.getElementById('btn_existing_sy').disabled = false;
                        document.getElementById('result').innerHTML = '<i class="fas fa-check text-success"></i>';
                    } else {
                        document.getElementById('btn_existing_sy').disabled = true;
                        document.getElementById('result').innerHTML = '<i class="fas fa-exclamation-circle text-warning"></i>';
                    }

                }
            }

            xmlhttp.open("GET", "checkSY.php?sy=" + sy + "&sem=" + sem + "");
            xmlhttp.send();
        }
    </script>
