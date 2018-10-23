<?php

class Api extends Controller
{
	public function index(){
		echo "API";
	}

	public function listOfVehicles(){
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$vehicles = Parking::where('parked', '!=', 0)->get();
			$arrayVehicles['status'] = 200;
			$arrayVehicles['freeSpace'] = Parking::getFreeSpace();
			$arrayVehicles['totalSpace'] = Parking::getTotalSpace();
			foreach ($vehicles as $vehicle) {
			    $arrayVehicles['vehicles'][] = [
			    	'id' => $vehicle->id,
			    	'carType' => $vehicle->carType,
			    	'parkedDate' => $vehicle->created_at->format('d-m-Y H:i')
			    ];
			}

			echo json_encode($arrayVehicles);

		} else {
			$array = [
				'status' => 400,
				'message' => 'Only POST request method is avalivle.'
			];
			echo json_encode($array);
			http_response_code (400);
		}

	}

	private function parkVehicle($carType, $parked){
		$freeSpace = Parking::getFreeSpace();

		if($freeSpace >= $parked){
			$parked = Parking::create([
				'carType' => $carType,
				'parked' => $parked
			]);

			$array = [
				'status' => 200,
				'message' => 'You parked the ' . $carType . ' successfully on ' . $parked->id . ' side.'
			];

			echo json_encode($array);
		} else {

			$array = [
				'status' => 400,
				'message' => 'We are very sorry, but at the moment we do not have free parking spaces. Please try again later.'
			];

			echo json_encode($array);
			http_response_code (400);
		}
		
	}

	public function parkBus()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			self::parkVehicle('Bus', 3);
		} else {
			$array = [
				'status' => 400,
				'message' => 'Only POST request method is avalivle.'
			];
			echo json_encode($array);
			http_response_code (400);
		}
	}

	public function parkMotocycle()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			self::parkVehicle('Motocycle', 1);
		} else {
			$array = [
				'status' => 400,
				'message' => 'Only POST request method is avalivle.'
			];
			echo json_encode($array);
			http_response_code (400);
		}
	}

	public function parkCar()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			self::parkVehicle('Car', 2);
		} else {
			$array = [
				'status' => 400,
				'message' => 'Only POST request method is avalivle.'
			];
			echo json_encode($array);
			http_response_code (400);
		}
	}

	public function departureVehicle(){
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$vehicleId = $_POST['placeVehicle'];
			try{
				$vehicle = Parking::where('id', $vehicleId)->where('parked', '!=', 0)->firstOrFail();
				$vehicle->update(['parked' => 0]);
				
				$array = [
					'status' => 200,
					'message' => 'Your ' . $carType . ' has been succesfuly departure from ' . $vehicle->id . ' side.'
				];

				echo json_encode($array);

			} catch (Exception $e) {

				$array = [
					'status' => 400,
					'message' => 'We cannot found your car. Are you sure is it been there?'
				];
				
				echo json_encode($array);
				http_response_code (400);
			}
		}
	}
	
}