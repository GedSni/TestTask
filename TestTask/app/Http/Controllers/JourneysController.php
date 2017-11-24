<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use DateTime;
use App\Journey;
use App\Vehicle;
use App\User;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JourneyRequest;

class JourneysController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['except' => ['create']]);
    }

    public function search()
    {
        $users = User::all();
        return view('journeys.search')->with('users', $users);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function check()
    {
        $date_from = Request::input('date_from');
        $date_to = Request::input('date_to');
        $user = Request::input('user_id');
        $users = User::findOrFail($user);
        $data = Journey::where('user_id', $user)->whereBetween('date',[$date_from, $date_to])->get();

        return view('journeys.check')->with('data', $data)->with('users', $users);
       
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select('SELECT journeys.id as id_j, journeys.date as date, journeys.route as route,
                                   journeys.vehicle_id as vehicle_id,
                                   journeys.user_id as user_id,
                                   users.name as name,
                                   vehicles.brand as brand, vehicles.model as model, vehicles.year as year                                                                      
                            FROM 
                                journeys, users, vehicles
                            WHERE 
                                journeys.user_id = users.id AND journeys.vehicle_id = vehicles.id');


        return view('journeys.index')->with('data', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicles = Vehicle::all();
        return view('journeys.create', compact('vehicles', $vehicles));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JourneyRequest $request)
    {
    
        $input = Request::all();

        $fuel_litres = $this->fuel($request);

        $input['fuel_litres'] = $fuel_litres;

        if (Auth::check())
        {
            $user_id = Auth::user()->id;
        }

        $input['user_id'] = $user_id;

        Journey::create($input);

        return redirect('journeys');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Journey  $journey
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $journey = Journey::findOrFail($id);
        return view('journeys.show')->with('journey', $journey);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Journey  $journey
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicles = Vehicle::all();
        $journey = Journey::findOrFail($id);
        return view('journeys.edit')->with('vehicles', $vehicles)->with('journey', $journey);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Journey  $journey
     * @return \Illuminate\Http\Response
     */
    public function update(JourneyRequest $request, $id)
    {

        $fuel_litres = $this->fuel($request);

        $journey = Journey::findOrFail($id);

        $journey->update($request->all() + ['fuel_litres' => $fuel_litres]);

        return redirect('journeys');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Journey  $journey
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Journey::destroy($id);

        return redirect('journeys');
    }

    //Fuel consumption function
    public function fuel(JourneyRequest $request)
    {
        //Input data
        $input = Request::all();

        //Getting variables from input data
        $exit_terminal = Request::input('exit_terminal_time');
        $arrive_client = Request::input('arrive_client_time');
        $unloading_time_minutes = Request::input('unloading_time_minutes');
        $exit_client = Request::input('exit_client_time');
        $arrive_terminal = Request::input('arrive_terminal_time');
        $vehicle_id = Request::input('vehicle_id');
        
        //Getting vehicle fuel consumption statistics from database
        $vehicle = Vehicle::findOrFail($vehicle_id);
        $fuel_idle = $vehicle->fuel_idle; 
        $fuel_road = $vehicle->fuel_road; 
        $fuel_load = $vehicle->fuel_load; 

        //Converting input data to DateTime objects
        $exit_terminal_time = new DateTime($exit_terminal);
        $arrive_client_time = new DateTime($arrive_client);
        $exit_client_time = new DateTime($exit_client);
        $arrive_terminal_time = new DateTime($arrive_terminal);

        //Loading fuel consumption calculation
        $load_consumption = ($unloading_time_minutes * $fuel_load) / 60;

        //Calculating time spent idle. Time difference between arriving to the client and
        //leaving the client minus time loading
        $time_idle = $exit_client_time->diff($arrive_client_time);
        $minutes_idle = $time_idle->days * 24 * 60;
        $minutes_idle += $time_idle->h * 60;
        $minutes_idle += $time_idle->i;
        //Idle fuel consumption calculation
        $idle_consumption = (($minutes_idle - $unloading_time_minutes) * $fuel_idle) / 60;

        //Calculating time spent on the road. Time sum between terminal and the client both ways.
        //Time spent forward
        $time_road_forward = $exit_terminal_time->diff($arrive_client_time);
        $minutes_road_forward = $time_road_forward->days * 24 * 60;
        $minutes_road_forward += $time_road_forward->h * 60;
        $minutes_road_forward += $time_road_forward->i;
        //Time spent back
        $time_road_back = $exit_client_time->diff($arrive_terminal_time);
        $minutes_road_back = $time_road_back->days * 24 * 60;
        $minutes_road_back += $time_road_back->h * 60;
        $minutes_road_back += $time_road_back->i;
        //On the road fuel consumption calculation
        $road_consumption = (($minutes_road_forward + $minutes_road_back) * $fuel_road) / 60;

        //Overall fuel consumption calculation
        $fuel_litres = $road_consumption + $idle_consumption + $load_consumption;

        return $fuel_litres;
              
    }
}
