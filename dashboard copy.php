<!DOCTYPE html>
<html lang="en">
<!-- attendance23:24-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Sequential</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="index.php" class="logo">
					<img src="assets/img/logo.png" width="35" height="35" alt=""> <span>Machino</span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="Admin">
							<span class="status online"></span></span>
                        <span>Admin</span>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="settings.php">Settings</a>
						<a class="dropdown-item" href="login.php">Logout</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="login.php">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
						<li>
                            <a href="machine.php"><i class="fa fa-user-md"></i> <span>Machines</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <!-- <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Machine Status</h4>
                    </div>
                </div>
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">
                    </div>
                    <div class="col-sm-6 col-md-3">
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <label class="focus-label">Machine Name</label>
                            <input type="text" class="form-control floating">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <input type="submit" class="btn btn-success btn-block" value="Search"> 
                </div> -->
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-body">
								<div class="chart-title">
									<h4>Machine Graph</h4>
								</div>	
								<canvas id="linegraph"></canvas>
							</div>
						</div>
					</div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="table-responsive">
                            <table class="table table-striped custom-table mb-0" id="tblMachines">
                                <thead>
                                    <tr>
                                        <th col-3>Machine</th>
                                        <th col-4>Status</th>
                                        <th col-2></th>
                                        <th col-2>Current</th>
                                        <th col-2>Speed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <thead>
                                        <tr>
                                            <th col-3></th>
                                            <th col-2>ON</th>
                                            <th col-2>OFF</th>
                                            <th col-2>AMP</th>
                                            <th col-2>RPM</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td>CO2 Plant</td>
                                        <td id="m1StatusOn"></i></td>
                                        <td id="m1StatusOff"><i class='fa fa-close text-danger'></i></td>
                                        <td>Current</td>
                                        <td>Speed</td>
                                    </tr>
                                    <tr>
                                        <td>Boiler</td>
                                        <td id="m2StatusOn"></td>
                                        <td id="m2StatusOff"><i class='fa fa-close text-danger'></td>
                                        <td>Current</td>
                                        <td>Speed</td>
                                    </tr>
                                    <tr>
                                        <td>Filler</td>
                                        <td id="m3StatusOn"></td>
                                        <td id="m3StatusOff"><i class='fa fa-close text-danger'></td>
                                        <td>Current</td>
                                        <td>Speed</td>
                                    </tr>
                                    <tr>
                                        <td>B. Washer</td>
                                        <td id="m4StatusOn"></td>
                                        <td id="m4StatusOff"><i class='fa fa-close text-danger'></td>
                                        <td>Current</td>
                                        <td>Speed</td>
                                    </tr>
                                    <tr>
                                        <td>Havac</td>
                                        <td id="m5StatusOn"></td>
                                        <td id="m5StatusOff"><i class='fa fa-close text-danger'></td>
                                        <td>Current</td>
                                        <td>Speed</td>
                                    </tr>
                                    <td id="status"><i class='fa fa-close text-danger'></i></td>
                                </tbody>
                            </table>
						</div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <h1>Mode</h1>
                        <!-- <form method="POST"> -->
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="mode" id="running" value="running" checked>
                                <label class="form-check-label" for="running">
                                Running
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="mode" id="not_running" value="not_running">
                                <label class="form-check-label" for="not_running">
                                Not Running
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="mode" id="maintenance" value="maintenance">
                                <label class="form-check-label" for="maintenance">
                                Maintenance
                                </label>
                            </div>
                        </div>
                        <div class="form-check-inline">
                            <button class="btn btn-success" onclick="myFunction()">Start Plant</button>
                            <!-- <input type="submit" class="btn btn-success" name="startPlant" value="Start Plant"> -->
                            &nbsp;&nbsp;&nbsp;
                            <!-- <input type="submit" class="btn btn-danger" name="stopPlant" value="Stop Plant"> -->
                            <button class="btn btn-danger" onclick="myFunction()">Stop Plant</button>
                        </div>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
            <!-- <div class="notification-box">
                <div class="msg-sidebar notifications msg-noti">
                    <div class="topnav-dropdown-header">
                        <span>Messages</span>
                    </div>
                    <div class="drop-scroll msg-list-scroll" id="msg_list">
                        <ul class="list-box">
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">R</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Richard Miles </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item new-message">
                                        <div class="list-left">
                                            <span class="avatar">J</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">John Doe</span>
                                            <span class="message-time">1 Aug</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">T</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Tarah Shropshire </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">M</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Mike Litorus</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">C</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Catherine Manseau </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">D</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Domenic Houston </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">B</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Buster Wigton </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">R</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Rolland Webber </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">C</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Claire Mapes </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">M</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Melita Faucher</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">J</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Jeffery Lalor</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">L</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Loren Gatlin</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">T</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Tarah Shropshire</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="chat.php">See all messages</a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script>
        function myFunction() {
            var tblMachines = document.getElementById("tblMachines")
            var status = document.getElementById("status").innerHTML
            var delay = 3
            const delayMilliSeconds = ((delay*60)*1000);
            // alert(status)

            // 1 min in milliseconds = 60000    
            // 3 mins in milliseconds = 180000
            // const generateRandomNumber = (min, max) =>  {
            // return Math.floor(Math.random() * (max - min) + min);
            // };
            
            // console.log(generateRandomNumber(100, 200))
            // console.log(generateRandomNumber(100, 200))
            // console.log(generateRandomNumber(100, 200))
            
            if(Status = "<i class='fa fa-close text-danger'></i>"){
            status = document.getElementById("status").innerHTML = "<i class='fa fa-check text-success'></i>";
            document.getElementById("m1StatusOn").innerHTML = "<i class='fa fa-check text-success'></i>";
            document.getElementById("m1StatusOff").innerHTML = "";
            setTimeout(function(){
                document.getElementById("m2StatusOn").innerHTML = "<i class='fa fa-check text-success'></i>";
                document.getElementById("m2StatusOff").innerHTML = "";
            },1000);
            setTimeout(function(){
                document.getElementById("m3StatusOn").innerHTML = "<i class='fa fa-check text-success'></i>";
                document.getElementById("m3StatusOff").innerHTML = "";
            },2000);
            setTimeout(function(){
                document.getElementById("m4StatusOn").innerHTML = "<i class='fa fa-check text-success'></i>";
                document.getElementById("m4StatusOff").innerHTML = "";
            },3000);
            setTimeout(function(){
                document.getElementById("m5StatusOn").innerHTML = "<i class='fa fa-check text-success'></i>";
                document.getElementById("m5StatusOff").innerHTML = "";
            },4000);
            }
        }
    </script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- attendance23:24-->
</html>