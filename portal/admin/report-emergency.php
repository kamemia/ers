<?php include 'includes/head.php'; ?>

<body>
    <div class="main-wrapper">
        <?php include 'includes/navigation.php'; ?>
        <?php include 'includes/sidebar.php'; ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Report Emergency</h4>
                    </div>
                </div>
                <?php if(get("success")):?>
                    <div>
                      <?=App::message("success", "Your request has been successfully submitted help is on the way")?>
                    </div>
                    <?php endif;?>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="save_emergency.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Emergency ID</label>
                                        <input class="form-control" type="text" name="emergency_id" value="<?php echo rand(1000,9999); ?>" readonly="">
                                    </div>
                                </div>
                                

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Agency Name</label>
                                       
                                        <select class="select"  name="agency_id">
                                           
                                            <option>Select</option>
                                             <?php
                                                $result = $db->prepare("SELECT * FROM agency ");
                                                $result->execute();
                                                for($i=0; $row = $result->fetch(); $i++){   
                                            ?> 
                                            <option value="<?php echo $row['agency_id']; ?>"><?php echo $row['agency_name']; ?></option>
                                            <hr>
                                            <?php } ?>
                                        </select>
                                        
                                    </div>

                                </div>
                            
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label>Case Severity</label>
                                        <select class="select" name="case_severity">
                                            <option>Select</option>
                                            
                                            <option value="Normal">Normal</option>
                                            <option value="Critical">Critical</option>
                                            <option value="Danger">Danger</option>
                                            
                                        </select>
                                    </div>
                                
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Emergency Category </label>
                                        <select class="select" name="emergency_category">
                                            <option>Select</option>
                                            <?php
                                                $result = $db->prepare("SELECT * FROM emergency_type ");
                                                $result->execute();
                                                for($i=0; $row = $result->fetch(); $i++){   
                                            ?> 
                                            <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input class="form-control" name="state" type="text" value="<?php
                                                    $query = @unserialize (file_get_contents('http://ip-api.com/php/'));
                                                    {
                                                        echo ''. $query['city'] ;
                                                    }
                                                    
                                                ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Region</label>
                                        <input class="form-control" name="region" type="text" value="<?php
                                                    $query = @unserialize (file_get_contents('http://ip-api.com/php/'));
                                                    {
                                                        echo ''. $query['regionName'] ;
                                                    }
                                                    
                                                ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input class="form-control" type="text" name="latitude" id="latitude" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Longitude</label>
                                        <input class="form-control" type="text" name="longitude" id="longitude" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input class="form-control" name="phone_number" value="<?php echo $_SESSION['SESS_PHONE_NUMBER'];?>" type="text" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" name="name" value="<?php echo $_SESSION['SESS_FIRST_NAME'];?>" readonly type="text">
                                    </div>
                                </div>
                                <div class="col-md-6" >
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input class="form-control" name="dates" value="<?php echo date('d-m-Y') ;?>" readonly type="text">
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" hidden>
                                        <label>ID</label>
                                        <input class="form-control" name="victim_id" value="<?php echo $_SESSION['SESS_USERS_ID'];?>" readonly type="text">
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" name="email" value="<?php echo $_SESSION['SESS_EMAIL'];?>" readonly type="text">
                                    </div>
                                </div>
                                <div class="col-md-6" >
                                    <div class="form-group">
                                        <label>Upload image of emergency</label>
                                        <div class="profile-upload">
                                            <div class="upload-img">
                                                <img alt="" src="assets/img/user.jpg">
                                            </div>
                                            <div class="upload-input">
                                                <input type="file" name="photo" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea cols="30" rows="4" name="description" class="form-control"></textarea>
                            </div>



                             
                            <div class="col-md-6" hidden>    
                                <div class="form-group">
                                    <label>Officer</label>
                                    <textarea cols="30" rows="4" name="officer" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6" hidden>    
                                <div class="form-group">
                                <label>Google Maps Link: <input type="text" name="mapLink" id="mapLinkText" readonly></label>
                                </div>
                            </div>
                             <div class="col-md-6" hidden>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input class="form-control" name="status" value="Pending" readonly type="text">
                                    </div>
                                </div>
                                <div class="col-md-6" hidden>    
                                <div class="form-group">
                                    <label>Action</label>
                                    <textarea cols="30" rows="4" name="action" class="form-control"></textarea>
                                </div>
                            </div>
                            
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" >Send Request</button>
                            </div>
                          

                        </form>
                    </div>
                </div>
            </div>
			<?php include 'includes/message.php'; ?>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
	<script>
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'

                });
            });
     </script>
     <script>
        // JavaScript to get user's geolocation
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                document.getElementById("latitude").value = "Geolocation is not supported by this browser.";
                document.getElementById("longitude").value = "Geolocation is not supported by this browser.";
                document.getElementById("mapLink").style.display = "none";
            }
        }

        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            document.getElementById("latitude").value = latitude;
            document.getElementById("longitude").value = longitude;

            // Generate the Google Maps link
            var mapLink = "https://maps.google.com/maps?q=" + latitude + "," + longitude;
            document.getElementById("mapLinkText").value = mapLink;
            document.getElementById("mapLink").href = mapLink;
            document.getElementById("mapLink").style.display = "block";

            // Show the "Open in Google Maps" button and link it to the generated link
            var openInGoogleMapsButton = document.getElementById("openInGoogleMapsButton");
            openInGoogleMapsButton.style.display = "block";
            openInGoogleMapsButton.parentNode.href = mapLink;
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    document.getElementById("latitude").value = "User denied the request for Geolocation.";
                    document.getElementById("longitude").value = "User denied the request for Geolocation.";
                    document.getElementById("mapLink").style.display = "none";
                    break;
                case error.POSITION_UNAVAILABLE:
                    document.getElementById("latitude").value = "Location information is unavailable.";
                    document.getElementById("longitude").value = "Location information is unavailable.";
                    document.getElementById("mapLink").style.display = "none";
                    break;
                case error.TIMEOUT:
                    document.getElementById("latitude").value = "The request to get user location timed out.";
                    document.getElementById("longitude").value = "The request to get user location timed out.";
                    document.getElementById("mapLink").style.display = "none";
                    break;
                case error.UNKNOWN_ERROR:
                    document.getElementById("latitude").value = "An unknown error occurred.";
                    document.getElementById("longitude").value = "An unknown error occurred.";
                    document.getElementById("mapLink").style.display = "none";
                    break;
            }
        }

        // Call the function to get the location when the page loads
        getLocation();
    </script>
</body>


<!-- add-appointment24:07-->
</html>
