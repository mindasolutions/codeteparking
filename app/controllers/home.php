<?php
class Home extends Controller
{

	public function index($name = '')
	{
		
		//$this->view('home/index', ['name' => $user->name]);
		$total = Parking::getTotalSpace();
		$used = Parking::getUsedSpace();
		$free = Parking::getFreeSpace();
		$percent = (100 * $used) / $total;
		$this->view('/home/index', [
			'percent' => $percent,
			'free' => $free
		]);

	}

	public function create($carType = '')
	{
		var_dump();
	}

	private function parkVehicle($carType, $parked){
		$freeSpace = Parking::getFreeSpace();

		if($freeSpace >= $parked){
			$parked = Parking::create([
				'carType' => $carType,
				'parked' => $parked
			]);

			$this->view('/home/park/success', [
				'carType' => $carType,
				'parkedId' => $parked->id
			]);
		} else {
			$this->view('/home/park/notenoughtspace');
		}
		
	}

	public function parkBus()
	{
		self::parkVehicle('Bus', 3);
	}

	public function parkMotocycle()
	{
		self::parkVehicle('Motocycle', 1);
	}

	public function parkCar()
	{
		self::parkVehicle('Car', 2);
	}

	public function departureVehicle(){
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$vehicleId = $_POST['placeVehicle'];
			try{
				$vehicle = Parking::where('id', $vehicleId)->where('parked', '!=', 0)->firstOrFail();
				$vehicle->update(['parked' => 0]);
				$this->view('/home/departure/success', [
					'carType' => $vehicle->carType,
					'parkedId' => $vehicle->id
				]);
			} catch (Exception $e) {
				$this->view('/home/departure/failed');
			}
		}
	}

	public function freeSpace(){
		echo "We have " . Parking::getFreeSpace() . " free spaces to park.";
	}
}