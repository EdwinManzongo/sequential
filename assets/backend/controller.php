<?php
	session_start();
	include_once('class.db.php');
	// include_once('functions.php');
	// include_once('cinfig.php');
	//$act = strip_tags(addslashes($_GET['act']));
	$act = filter_var($_GET['act'], FILTER_SANITIZE_STRING);
	$source = $_SERVER['HTTP_REFERER'];
	//$hostname = gethostbyname($_SERVER['REMOTE_ADDR']);
	//session variables
	$comp = '1';

	switch ($act) {
		case 'addMachine':
			$machinename = filter_var($_POST['machinename'], FILTER_SANITIZE_STRING);
			$position = filter_var($_POST['position'], FILTER_SANITIZE_STRING);
			$delay = filter_var($_POST['delay'], FILTER_SANITIZE_STRING);
			$status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

			try{
				$query = $conn->prepare('SELECT * FROM machine WHERE position = ?');
				$res = $query->execute([$position]);
				$existtrans = $query->fetch();

				if ($existtrans) {
					//user exists
					$_SESSION['msg'] = "A machine assigned to that position already exists.";
					$_SESSION['alertcolor'] = "danger";
					$source = $_SERVER['HTTP_REFERER'];
					header('Location: ' . $source);
				}
				else {
					$query = 'INSERT INTO `machine` (`name`, `position`, `delay`, `status`) VALUES (?,?,?,?)';
					$conn->prepare($query)->execute([$machinename, $position, $delay, $status]);

					$_SESSION['msg'] = $msg = 'Machine Successfully Created';
					$_SESSION['alertcolor'] = $type = 'success';
					$source = $_SERVER['HTTP_REFERER'];
					// header('Location: ' . $source);
					header('Location: ../../machine.php');
				}
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
			
		break;

		case 'addDoctor':
			$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
			$surname = filter_var($_POST['surname'], FILTER_SANITIZE_STRING);
			$email = filter_var((filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)),FILTER_VALIDATE_EMAIL);
			$dob = filter_var($_POST['dob'], FILTER_SANITIZE_STRING);
			$gender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
			$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
			$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
			$province = filter_var($_POST['province'], FILTER_SANITIZE_STRING);
			$phonenumber = filter_var($_POST['phonenumber'], FILTER_SANITIZE_STRING);
			$status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

			try{
				$query = $conn->prepare('SELECT * FROM doctors WHERE email = ?');
				$res = $query->execute(['$email']);
				$existtrans = $query->fetch();

				if ($existtrans) {
					//user exists
					$_SESSION['msg'] = "A user account associated with the supplied email exists.";
					$_SESSION['alertcolor'] = "danger";
					$source = $_SERVER['HTTP_REFERER'];
					// header('Location: ' . $source);

					header('Location: ../../add-doctor.php');
				}
				else {
					$query = 'INSERT INTO `doctors` (`firstname`, `surname`, `email`, `dob`, `gender`, `address`, `city`, `province`, `phonenumber`, `status`) VALUES (?,?,?,?,?,?,?,?,?,?)';
					$conn->prepare($query)->execute([$firstname, $surname, $email, $dob, $gender, $address, $city, $province, $phonenumber, $status]);

					$_SESSION['msg'] = $msg = 'Patient Successfully Created';
					$_SESSION['alertcolor'] = $type = 'success';
					$source = $_SERVER['HTTP_REFERER'];
					// header('Location: ' . $source);

					header('Location: ../../doctors.php');
				}
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
			
		break;

		case 'editDoctor':
			$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
			$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
			$surname = filter_var($_POST['surname'], FILTER_SANITIZE_STRING);
			$email = filter_var((filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)),FILTER_VALIDATE_EMAIL);
			$dob = filter_var($_POST['dob'], FILTER_SANITIZE_STRING);
			$gender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
			$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
			$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
			$province = filter_var($_POST['province'], FILTER_SANITIZE_STRING);
			$phonenumber = filter_var($_POST['phonenumber'], FILTER_SANITIZE_STRING);
			$department = filter_var($_POST['department'], FILTER_SANITIZE_STRING);
			$status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

			try{
				$query = $conn->prepare('SELECT * FROM doctors WHERE id = ?');
				$res = $query->execute([$id]);
				$existtrans = $query->fetch();

				if ($existtrans) {
					$query = 'UPDATE `doctors` SET firstname = ?, surname = ?, email = ?, dob = ?, gender = ?, address = ?, city = ?, province = ?, phonenumber = ?, department = ?, status = ? WHERE id = ?';
					$conn->prepare($query)->execute([$firstname, $surname, $email, $dob, $gender, $address, $city, $province, $phonenumber, $department, $status, $id]);

					$_SESSION['msg'] = $msg = 'Doctor Successfully Updated';
					$_SESSION['alertcolor'] = $type = 'success';
					$source = $_SERVER['HTTP_REFERER'];
					// header('Location: ' . $source);

					header('Location: ../../doctors.php');
				}
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
			
		break;

		case 'addPatient':
			$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
			$surname = filter_var($_POST['surname'], FILTER_SANITIZE_STRING);
			$email = filter_var((filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)),FILTER_VALIDATE_EMAIL);
			$dob = filter_var($_POST['dob'], FILTER_SANITIZE_STRING);
			$gender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
			$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
			$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
			$province = filter_var($_POST['province'], FILTER_SANITIZE_STRING);
			$phonenumber = filter_var($_POST['phonenumber'], FILTER_SANITIZE_STRING);
			$status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

			try{
				$query = $conn->prepare('SELECT * FROM patients WHERE email = ?');
				$res = $query->execute(['$email']);
				$existtrans = $query->fetch();

				if ($existtrans) {
					//user exists
					$_SESSION['msg'] = "A user account associated with the supplied email exists.";
					$_SESSION['alertcolor'] = "danger";
					$source = $_SERVER['HTTP_REFERER'];
					// header('Location: ' . $source);

					header('Location: ../../patients.php');
				}
				else {
					$query = 'INSERT INTO `patients` (`firstname`, `surname`, `email`, `dob`, `gender`, `address`, `city`, `province`, `phonenumber`, `status`) VALUES (?,?,?,?,?,?,?,?,?,?)';
					$conn->prepare($query)->execute([$firstname, $surname, $email, $dob, $gender, $address, $city, $province, $phonenumber, $status]);

					$_SESSION['msg'] = $msg = 'Patient Successfully Created';
					$_SESSION['alertcolor'] = $type = 'success';
					$source = $_SERVER['HTTP_REFERER'];
					// header('Location: ' . $source);

					header('Location: ../../patients.php');
				}
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
			
		break;

		case 'editPatient':
			$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
			$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
			$surname = filter_var($_POST['surname'], FILTER_SANITIZE_STRING);
			$email = filter_var((filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)),FILTER_VALIDATE_EMAIL);
			$dob = filter_var($_POST['dob'], FILTER_SANITIZE_STRING);
			$gender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
			$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
			$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
			$province = filter_var($_POST['province'], FILTER_SANITIZE_STRING);
			$phonenumber = filter_var($_POST['phonenumber'], FILTER_SANITIZE_STRING);
			$status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

			try{
				$query = $conn->prepare('SELECT * FROM patients WHERE id = ?');
				$res = $query->execute([$id]);
				$existtrans = $query->fetch();

				if ($existtrans) {
					$query = 'UPDATE `patients` SET firstname = ?, surname = ?, email = ?, dob = ?, gender = ?, address = ?, city = ?, province = ?, phonenumber = ?, status = ? WHERE id = ?';
					$conn->prepare($query)->execute([$firstname, $surname, $email, $dob, $gender, $address, $city, $province, $phonenumber, $status, $id]);

					$_SESSION['msg'] = $msg = 'Patient Successfully Updated';
					$_SESSION['alertcolor'] = $type = 'success';
					$source = $_SERVER['HTTP_REFERER'];
					// header('Location: ' . $source);

					header('Location: ../../patients.php');
				}
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
			
		break;

		case 'addAppointment':
			$username = $_SESSION['username'];
			$appointmentid = filter_var($_POST['appointmentid'], FILTER_SANITIZE_STRING);
			$patient = filter_var($_POST['patient'], FILTER_SANITIZE_STRING);
			$email = filter_var((filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)),FILTER_VALIDATE_EMAIL);
			$phonenumber = filter_var($_POST['phonenumber'], FILTER_SANITIZE_STRING);
			$department = filter_var($_POST['department'], FILTER_SANITIZE_STRING);
			$doctor = filter_var($_POST['doctor'], FILTER_SANITIZE_STRING);
			$date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
			$time = filter_var($_POST['time'], FILTER_SANITIZE_STRING);
			$status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

			try{
				$query = $conn->prepare('SELECT * FROM appointments WHERE appointmentid = ?');
				$res = $query->execute(['$appointmentid']);
				$existtrans = $query->fetch();

				if ($existtrans) {
					//user exists
					$_SESSION['msg'] = "A appointment associated with the supplied appointment number exists.";
					$_SESSION['alertcolor'] = "danger";
					$source = $_SERVER['HTTP_REFERER'];
					header('Location: ' . $source);
				}
				else {

					$query = 'INSERT INTO `appointments` (`appointmentid`, `patient`, `email`, `phonenumber`, `department`, `doctor`, `date`, `time`, `status`) VALUES (?,?,?,?,?,?,?,?,?)';
					$conn->prepare($query)->execute([$appointmentid, $patient, $email, $phonenumber, $department, $doctor, $date, $time, $status]);

					$message = "Appointment successfully booked. You are number" . $number . "in the queue.";
					$data = [
						'phone' => $phonenumber, 
						'body' => $message, 
					];

					// Encode data to JSON
					$json = json_encode($data); 

					// URL for request POST /message
					$url = 'https://api.chat-api.com/instance269922/message?token=0ddqcy6swj8k42bd';

					// Make a POST request
					$options = array(
						'http' => array(
							'method'  => 'POST',
							'header'  => 'Content-type: application/json',
							'content' => $json               
						), 
						'ssl' => array(
							'verify_peer' => false,
							"verify_peer_name"=>false,
						)
					);
					
					// Send a request
					$result = file_get_contents("https://api.chat-api.com/instance269922/message?token=0ddqcy6swj8k42bd", false, stream_context_create($options));

					$query = 'INSERT INTO `queue` (`appointmentid`, `status`) VALUES (?,?)';
					$conn->prepare($query)->execute([$appointmentid, $status]);

					$_SESSION['msg'] = $msg = 'Appointment Successfully Created';
					$_SESSION['alertcolor'] = $type = 'success';
					$source = $_SERVER['HTTP_REFERER'];
					header('Location: ' . $source);
				}
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
			
		break;

		case 'editAppointment':
			// $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
			$appointmentid = filter_var($_POST['appointmentid'], FILTER_SANITIZE_STRING);
			$patient = filter_var($_POST['patient'], FILTER_SANITIZE_STRING);
			$email = filter_var((filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)),FILTER_VALIDATE_EMAIL);
			$phonenumber = filter_var($_POST['phonenumber'], FILTER_SANITIZE_STRING);
			$department = filter_var($_POST['department'], FILTER_SANITIZE_STRING);
			$doctor = filter_var($_POST['doctor'], FILTER_SANITIZE_STRING);
			$date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
			$time = filter_var($_POST['time'], FILTER_SANITIZE_STRING);
			$status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

			try{
				$query = $conn->prepare('SELECT * FROM appointments WHERE appointmentid = ?');
				$res = $query->execute([$appointmentid]);
				$existtrans = $query->fetch();

				if ($existtrans) {
					$query = 'UPDATE `appointments` SET patient = ?, email = ?, phonenumber = ?, department = ?, doctor = ?, date = ?, time = ?, status = ? WHERE appointmentid = ?';
					$conn->prepare($query)->execute([$patient, $email, $phonenumber, $department, $doctor, $date, $time, $status, $appointmentid]);

					$_SESSION['msg'] = $msg = 'Appointment Successfully Updated';
					$_SESSION['alertcolor'] = $type = 'success';
					$source = $_SERVER['HTTP_REFERER'];
					// header('Location: ' . $source);

					header('Location: ../../appointments.php');
				}
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
			
		break;

		case 'deactAppointment':
			$id = filter_var($_GET['appointmentid'], FILTER_SANITIZE_STRING);

			try{
				$query = $conn->prepare('UPDATE appointments SET status = "Inactive" WHERE id = ?');
				$res = $query->execute([$id]);

				$_SESSION['msg'] = $msg = 'Appointment Successfully Updated';
				$_SESSION['alertcolor'] = $type = 'success';
				$source = $_SERVER['HTTP_REFERER'];
				// header('Location: ' . $source);

				header('Location: ../../dashboard.php');
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
			
		break;

		case 'addSchedule':
			// $username = $_SESSION['username'];
			$doctorname = filter_var($_POST['doctorname'], FILTER_SANITIZE_STRING);
			$days = filter_var($_POST['days'], FILTER_SANITIZE_STRING);
			$starttime = filter_var($_POST['starttime'], FILTER_SANITIZE_STRING);
			$endtime = filter_var($_POST['endtime'], FILTER_SANITIZE_STRING);
			$status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

			try{
				$query = $conn->prepare('SELECT * FROM schedule WHERE doctorname = ?');
				$res = $query->execute([$doctorname]);
				$existtrans = $query->fetch();

				if ($existtrans) {
					//user exists
					$_SESSION['msg'] = "A doctor schedule associated with the supplied name  exists.";
					$_SESSION['alertcolor'] = "danger";
					$source = $_SERVER['HTTP_REFERER'];
					// header('Location: ' . $source);

					header('Location: ../../schedule.php');
				}
				else {

					$query = 'INSERT INTO `schedule` (`doctorname`, `days`, `starttime`, `endtime`, `status`) VALUES (?,?,?,?,?)';
					$conn->prepare($query)->execute([$doctorname, $days, $starttime, $endtime, $status]);

					$_SESSION['msg'] = $msg = 'Schedule Successfully Created';
					$_SESSION['alertcolor'] = $type = 'success';
					$source = $_SERVER['HTTP_REFERER'];
					// header('Location: ' . $source);

					header('Location: ../../schedule.php');
				}
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
			
		break;

		case 'logout':
			$_SESSION['logged_in'] = '0';
			session_start();
    		session_destroy();

    		$_SESSION['msg'] = $msg = "Successfully logged out";
    		$_SESSION['alertcolor'] = $type = "success";
    		$page = "../../index.php";
			header('Location: ' . $page);
		break;

		default:
			exit('Unexpected route. Please contact administrator.');
		break;
	}