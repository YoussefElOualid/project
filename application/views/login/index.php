<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ExtraNet Fincards</title>

    <link href="<?=base_url();?>assets/common/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="<?=base_url();?>assets/common/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="<?=base_url();?>assets/common/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="<?=base_url();?>assets/common/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="<?=base_url();?>assets/common/img/favicon.png" rel="icon" type="image/png">
    <link href="favicon.ico" rel="shortcut icon">

    <!-- HTML5 shim and Respond.js for < IE9 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Vendors Styles -->
    <!-- v1.0.0 -->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendors/jscrollpane/style/jquery.jscrollpane.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendors/ladda/dist/ladda-themeless.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendors/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendors/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendors/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendors/cleanhtmlaudioplayer/src/player.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendors/cleanhtmlvideoplayer/src/player.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendors/bootstrap-sweetalert/dist/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendors/summernote/dist/summernote.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendors/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendors/ionrangeslider/css/ion.rangeSlider.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendors/datatables/media/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendors/c3/c3.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendors/chartist/dist/chartist.min.css">

    <!-- Clean UI Styles -->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/common/css/source/main.css">

    <!-- Vendors Scripts -->
    <!-- v1.0.0 -->
    <script src="<?=base_url();?>assets/vendors/jquery/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/tether/dist/js/tether.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/jquery-mousewheel/jquery.mousewheel.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/jscrollpane/script/jquery.jscrollpane.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/spin.js/spin.js"></script>
    <script src="<?=base_url();?>assets/vendors/ladda/dist/ladda.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/html5-form-validation/dist/jquery.validation.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/jquery-typeahead/dist/jquery.typeahead.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/autosize/dist/autosize.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/bootstrap-show-password/bootstrap-show-password.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/cleanhtmlaudioplayer/src/jquery.cleanaudioplayer.js"></script>
    <script src="<?=base_url();?>assets/vendors/cleanhtmlvideoplayer/src/jquery.cleanvideoplayer.js"></script>
    <script src="<?=base_url();?>assets/vendors/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/summernote/dist/summernote.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/ionrangeslider/js/ion.rangeSlider.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/nestable/jquery.nestable.js"></script>
    <script src="<?=base_url();?>assets/vendors/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/datatables/media/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/datatables-fixedcolumns/js/dataTables.fixedColumns.js"></script>
    <script src="<?=base_url();?>assets/vendors/datatables-responsive/js/dataTables.responsive.js"></script>
    <script src="<?=base_url();?>assets/vendors/editable-table/mindmup-editabletable.js"></script>
    <script src="<?=base_url();?>assets/vendors/d3/d3.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/c3/c3.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/chartist/dist/chartist.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/peity/jquery.peity.min.js"></script>
    <!-- v1.0.1 -->
    <script src="<?=base_url();?>assets/vendors/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- v1.1.1 -->
    <script src="<?=base_url();?>assets/vendors/gsap/src/minified/TweenMax.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/hackertyper/hackertyper.js"></script>
    <script src="<?=base_url();?>assets/vendors/jquery-countTo/jquery.countTo.js"></script>

    <!-- Clean UI Scripts -->
    <script src="<?=base_url();?>assets/common/js/common.js"></script>
    <script src="<?=base_url();?>assets/common/js/demo.temp.js"></script>
</head>
<body class="theme-default">

<section class="page-content">
<div class="page-content-inner" style="background-image: url(<?=base_url();?>assets/common/img/temp/login/4.jpg)">

    <!-- Login Page -->
    <div class="single-page-block-header">
        <div class="row">
            <div class="col-lg-4">
                <div class="logo">
                    <a href="javascript: history.back();">
                        <img src="<?=base_url();?>assets/common/img/18t.png" alt="Clean UI Admin Template" />
                    </a>
                </div>
            </div>
          
    </div>
    <div class="single-page-block">
        <div class="single-page-block-inner effect-3d-element">
            <div class="blur-placeholder"><!-- --></div>
            <div class="single-page-block-form">
            <p>Login : salahsbai05@gmail.com</p>
             <p>pass : 069501402</p>
                <h3 class="text-center">
                    <i class="icmn-enter margin-right-10"></i>
                    Se Connecter.
                </h3>
                <br />
                <form onsubmit="return false;" action="<?=base_url()?>login/ajax_login" id="form-validation" name="form-validation" method="POST">
                    <div class="form-group">
                        <input id="validation-email"
                               class="form-control"
                               placeholder="Email or Username"
                               name="resu_xxx"
                               type="text"
                               data-validation="[EMAIL]">
                    </div>
                    <div class="form-group">
                        <input id="validation-password"
                               class="form-control password"
                               name="ssap_xxx"
                               type="password" data-validation="[L>=6]"
                               data-validation-message="$ must be at least 6 characters"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                       
                       
                      
                            <?php 
                              if($this->uri->segment(3) == "error")          
                                  echo '<div class="alert alert-danger">Connexion refusée. Nom de compte ou mot de passe incorrect... </div>';      
                            ?>
                       
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary width-150">Connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="single-page-block-footer text-center">
        <ul class="list-unstyled list-inline">
            <li><a href="javascript: void(0);">Terms of Use</a></li>
            <li class="active"><a href="javascript: void(0);">Compliance</a></li>
            <li><a href="javascript: void(0);">Confidential Information</a></li>
            <li><a href="javascript: void(0);">Support</a></li>
            <li><a href="javascript: void(0);">Contacts</a></li>
        </ul>
    </div>
    <!-- End Login Page -->

</div>

<!-- Page Scripts -->
<script>
    $(function() {

        // Form Validation
        $('#form-validation').validate({
            submit: {
                settings: {
                    inputContainer: '.form-group',
                    errorListClass: 'form-control-error',
                    errorClass: 'has-danger'
                }
            }
        });

        // Show/Hide Password
        $('.password').password({
            eyeClass: '',
            eyeOpenClass: 'icmn-eye',
            eyeCloseClass: 'icmn-eye-blocked'
        });

        // Add class to body for change layout settings
        $('body').addClass('single-page single-page-inverse');

        // Set Background Image for Form Block
        function setImage() {
            var imgUrl = $('.page-content-inner').css('background-image');

            $('.blur-placeholder').css('background-image', imgUrl);
        };

        function changeImgPositon() {
            var width = $(window).width(),
                    height = $(window).height(),
                    left = - (width - $('.single-page-block-inner').outerWidth()) / 2,
                    top = - (height - $('.single-page-block-inner').outerHeight()) / 2;


            $('.blur-placeholder').css({
                width: width,
                height: height,
                left: left,
                top: top
            });
        };

        setImage();
        changeImgPositon();

        $(window).on('resize', function(){
            changeImgPositon();
        });

        // Mouse Move 3d Effect
        var rotation = function(e){
            var perX = (e.clientX/$(window).width())-0.5;
            var perY = (e.clientY/$(window).height())-0.5;
            TweenMax.to(".effect-3d-element", 0.4, { rotationY:15*perX, rotationX:15*perY,  ease:Linear.easeNone, transformPerspective:1000, transformOrigin:"center" })
        };

        if (!cleanUI.hasTouch) {
            $('body').mousemove(rotation);
        }

    });

    $(document).submit(function(){
    	$.ajax({
    		url:$(this).attr('action'),
    		type:$(this).attr('method') ,
               		data:$(this).serialize(),
    		success:function(e){
    			e = JSON.parser(e);
    			console.log(e)
    		}
    	})
    })
</script>
<!-- End Page Scripts -->
</section>
<div class="main-backdrop"><!-- --></div>

</body>
</html>