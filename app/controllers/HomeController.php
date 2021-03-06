<?php

class HomeController extends BaseController {

        public function __construct(){
                parent::__construct();
                View::share('title', 'Profesionalna orijentacija');
                if(!Session::get('id') && Input::get('id')){
                        Session::put('id', Input::get('id'));
                }
        }

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex(){

                $ch = curl_init(); 
                curl_setopt($ch, CURLOPT_URL, "http://shielded-mesa-6901.herokuapp.com/api/municipalities"); 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                $output = curl_exec($ch); 
                curl_close($ch);      
                View::share('municipalities', json_decode($output));

                $ch = curl_init(); 
                curl_setopt($ch, CURLOPT_URL, "http://shielded-mesa-6901.herokuapp.com/api/schools"); 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                $output = curl_exec($ch); 
                curl_close($ch);      
                View::share('schools', json_decode($output));

                View::share('action', 'HomeController@postBasicInfo');
                View::share('heading', 'Osnovne informacije o korisniku');
		$this->layout           = View::make('master');
                $this->layout->head     = View::make('head');
                $this->layout->left     = View::make('left');
                $this->layout->basic    = View::make('basic');
	}

        public function postBasicInfo(){
                
        }

	public function getPersonalityQuestions()
	{
                if(!Session::get('id')){
                        return Redirect::to(URL::action('HomeController@getIndex'));
                }
		$ch = curl_init(); 

                // set url 
                curl_setopt($ch, CURLOPT_URL, "http://shielded-mesa-6901.herokuapp.com/api/personality"); 

                //return the transfer as a string 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

                // $output contains the output string 
                $output = curl_exec($ch); 

                // close curl resource to free up system resources 
                curl_close($ch);      

                View::share('json', json_decode($output));
                View::share('question_type', 'u vezi sa osobinama ličnosti');
                View::share('action', 'HomeController@postCalculatePersonality');
                View::share('heading', 'Pitanja vezana za osobine ličnosti');
		$this->layout 		= View::make('master');
		$this->layout->head 	= View::make('head');
                $this->layout->left     = View::make('left');
                $this->layout->main     = View::make('questions');
	}

	public function postCalculatePersonality(){
		$realistic = 0;
		$explorer = 0;
		$artistic = 0;
		$social = 0;
		$entrepreneur = 0;
		$conventional = 0;

		$realistic_sum = 0;
		$explorer_sum = 0;
		$artistic_sum = 0;
		$social_sum = 0;
		$entrepreneur_sum = 0;
		$conventional_sum = 0;

		$ch = curl_init(); 

                // set url 
                curl_setopt($ch, CURLOPT_URL, "http://shielded-mesa-6901.herokuapp.com/api/personality"); 

                //return the transfer as a string 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

                // $output contains the output string 
                $output = curl_exec($ch); 
        	       
        	    $json = json_decode($output);

                // close curl resource to free up system resources 
                curl_close($ch);      

                foreach($json as $q){
                	if($q->personality_type_id == 1){
                		$realistic ++;
                		$realistic_sum += Input::get($q->id);
                	}
                	if($q->personality_type_id == 2){
                		$explorer ++;
                		$explorer_sum += Input::get($q->id);
                	}
                	if($q->personality_type_id == 3){
                		$artistic ++;
                		$artistic_sum += Input::get($q->id);
                	}
                	if($q->personality_type_id == 4){
                		$social ++;
                		$social_sum += Input::get($q->id);
                	}
                	if($q->personality_type_id == 5){
                		$entrepreneur ++;
                		$entrepreneur_sum += Input::get($q->id);
                	}
                	if($q->personality_type_id == 6){
                		$conventional ++;
                		$conventional_sum += Input::get($q->id);
                	}
                        Session::put($q->id, Input::get($q->id));
                }

                $realistic_calc = $realistic_sum/$realistic;
                $explorer_calc = $explorer_sum/$explorer;
                $artistic_calc = $artistic_sum/$artistic;
                $social_calc = $social_sum/$social;
                $entrepreneur_calc = $entrepreneur_sum/$entrepreneur;
                $conventional_calc = $conventional_sum/$conventional;
                Session::put('realistic', $realistic_calc);
                Session::put('explorer', $explorer_calc);
                Session::put('artistic', $artistic_calc);
                Session::put('social', $social_calc);
                Session::put('entrepreneur', $entrepreneur_calc);
                Session::put('conventional', $conventional_calc);

                return Redirect::to(URL::action('HomeController@getAreaQuestions'));
	}

	public function getAreaQuestions(){
                if(!isset($_SERVER['HTTP_REFERER'])){
                        return Redirect::to(URL::action('HomeController@getPersonalityQuestions'));
                }
                else{
                        if(FALSE !== strpos($_SERVER['HTTP_REFERER'], 'personality-questions') && !Session::get('realistic')){
                                return Redirect::to(URL::action('HomeController@getPersonalityQuestions'));
                        }
                        $ch = curl_init(); 

                        // set url 
                        curl_setopt($ch, CURLOPT_URL, "http://shielded-mesa-6901.herokuapp.com/api/areas"); 

                        //return the transfer as a string 
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

                        // $output contains the output string 
                        $output = curl_exec($ch); 

                        // close curl resource to free up system resources 
                        curl_close($ch);      

                        View::share('json', json_decode($output));
                        View::share('question_type', 'u vezi sa oblastima interesovanja');
                        View::share('action', 'HomeController@postCalculateAreas');
                        View::share('heading', 'Pitanja vezana za oblasti interesovanja');

                        $this->layout           = View::make('master');
                        $this->layout->head     = View::make('head');
                        $this->layout->left     = View::make('left');
                        $this->layout->main     = View::make('questions');
                }
	}

        public function postCalculateAreas(){
                $administration = 0;
                $security = 0;
                $technology = 0;
                $creativity = 0;
                $culture = 0;
                $literature = 0;
                $science = 0;
                $helping = 0;
                $agriculture = 0;
                $craftsmenship = 0;
                $sports = 0;
                $services = 0;
                $management = 0;

                $administration_sum = 0;
                $security_sum = 0;
                $technology_sum = 0;
                $creativity_sum = 0;
                $culture_sum = 0;
                $literature_sum = 0;
                $science_sum = 0;
                $helping_sum = 0;
                $agriculture_sum = 0;
                $craftsmenship_sum = 0;
                $sports_sum = 0;
                $services_sum = 0;
                $management_sum = 0;

                $ch = curl_init(); 

                // set url 
                curl_setopt($ch, CURLOPT_URL, "http://shielded-mesa-6901.herokuapp.com/api/areas"); 

                //return the transfer as a string 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

                // $output contains the output string 
                $output = curl_exec($ch); 
                       
                $json = json_decode($output);

                // close curl resource to free up system resources 
                curl_close($ch);      

                foreach($json as $q){
                        if($q->question_type_id == 1){
                                $administration ++;
                                $administration_sum += Input::get($q->id);
                        }
                        if($q->question_type_id == 2){
                                $security ++;
                                $security_sum += Input::get($q->id);
                        }
                        if($q->question_type_id == 3){
                                $technology ++;
                                $technology_sum += Input::get($q->id);
                        }
                        if($q->question_type_id == 4){
                                $creativity ++;
                                $creativity_sum += Input::get($q->id);
                        }
                        if($q->question_type_id == 5){
                                $culture ++;
                                $culture_sum += Input::get($q->id);
                        }
                        if($q->question_type_id == 6){
                                $literature ++;
                                $literature_sum += Input::get($q->id);
                        }
                        if($q->question_type_id == 7){
                                $science ++;
                                $science_sum += Input::get($q->id);
                        }
                        if($q->question_type_id == 8){
                                $helping ++;
                                $helping_sum += Input::get($q->id);
                        }
                        if($q->question_type_id == 9){
                                $agriculture ++;
                                $agriculture_sum += Input::get($q->id);
                        }
                        if($q->question_type_id == 10){
                                $craftsmenship ++;
                                $craftsmenship_sum += Input::get($q->id);
                        }
                        if($q->question_type_id == 11){
                                $sports ++;
                                $sports_sum += Input::get($q->id);
                        }
                        if($q->question_type_id == 12){
                                $services ++;
                                $services_sum += Input::get($q->id);
                        }
                        if($q->question_type_id == 13){
                                $management ++;
                                $management_sum += Input::get($q->id);
                        }
                        Session::put($q->id, Input::get($q->id));
                }

                $administration_calc = $administration_sum/$administration;
                $security_calc = $security_sum/$security;
                $technology_calc = $technology_sum/$technology;
                $creativity_calc = $creativity_sum/$creativity;
                $culture_calc = $culture_sum/$culture;
                $literature_calc = $literature_sum/$literature;
                $science_calc = $science_sum/$science;
                $helping_calc = $helping_sum/$helping;
                $agriculture_calc = $agriculture_sum/$agriculture;
                $craftsmenship_calc = $craftsmenship_sum/$craftsmenship;
                $sports_calc = $sports_sum/$sports;
                $services_calc = $services_sum/$services;
                $management_calc = $management_sum/$management;
                
                Session::put('administration', $administration_calc);
                Session::put('security', $security_calc);
                Session::put('technology', $technology_calc);
                Session::put('creativity', $creativity_calc);
                Session::put('culture', $culture_calc);
                Session::put('literature', $literature_calc);
                Session::put('science', $science_calc);
                Session::put('helping', $helping_calc);
                Session::put('agriculture', $agriculture_calc);
                Session::put('craftsmenship', $craftsmenship_calc);
                Session::put('sports', $sports_calc);
                Session::put('services', $services_calc);
                Session::put('management', $management_calc);

                return Redirect::to(URL::action('HomeController@getCalculate'));
        }

        public function getCalculate(){
                if(!isset($_SERVER['HTTP_REFERER'])){
                        return Redirect::to(URL::action('HomeController@getAreaQuestions'));
                }
                View::share('heading', 'Nastavite na rezultate');
                $this->layout           = View::make('master');
                $this->layout->head     = View::make('head');
                $this->layout->left     = View::make('left');
                $this->layout->main     = View::make('calculate');
        }

        public function getFinish(){
                $fields = Input::all();
                arsort($fields);
                $labels = array();
                foreach($fields as $key => $value){
                        switch ($key) {
                                case 'pol':
                                        $labels[$key] = "Poljoprivreda";
                                        break;
                                case 'hid':
                                        $labels[$key] = "Hidrometeorologija";
                                        break;
                                case 'hem':
                                        $labels[$key] = "Hemija";
                                        break;
                                case 'tek':
                                        $labels[$key] = "Tekstil";
                                        break;
                                case 'sum':
                                        $labels[$key] = "Šumarstvo";
                                        break;
                                case 'geo':
                                        $labels[$key] = "Geodezija";
                                        break;
                                case 'mas':
                                        $labels[$key] = "Mašinstvo";
                                        break;
                                case 'eth':
                                        $labels[$key] = "Elektrotehnika";
                                        break;
                                case 'kul':
                                        $labels[$key] = "Kultura";
                                        break;
                                case 'sao':
                                        $labels[$key] = "Saobraćaj";
                                        break;
                                case 'usl':
                                        $labels[$key] = "Lične usluge";
                                        break;
                                case 'zdr':
                                        $labels[$key] = "Zdravstvo";
                                        break;
                                case 'tru':
                                        $labels[$key] = "Trgovina i ugostiteljstvo";
                                        break;
                                case 'ekp':
                                        $labels[$key] = "Ekonomija i pravo";
                                        break;
                                
                                default:
                                        # code...
                                        break;
                        }
                }
                $title = "Rezultati vašeg testiranja";

                View::share('labels', $labels);
                View::share('fields', $fields);
                View::share('title', $title);
                View::share('heading', 'Rezultati testiranja');
                $this->layout           = View::make('master');
                $this->layout->head     = View::make('head');
                $this->layout->left     = View::make('left');
                $this->layout->main     = View::make('finish');
                
                
        }

        public function getPickCollege(){

                if(!Session::get('id')){
                        return Redirect::to(Request::root());
                }
                $ch = curl_init(); 

                // set url 
                curl_setopt($ch, CURLOPT_URL, "http://shielded-mesa-6901.herokuapp.com/api/colleges?id=".Session::get('id')); 

                //return the transfer as a string 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

                // $output contains the output string 
                $output = curl_exec($ch); 

                // set url 
                curl_setopt($ch, CURLOPT_URL, "http://shielded-mesa-6901.herokuapp.com/api/recommendation?id=".Session::get('id')); 

                //return the transfer as a string 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

                // $output contains the output string 
                $output2 = curl_exec($ch); 
                       
                $expertRecommendations = json_decode($output);
                $collaborativeRecommendations = json_decode($output2);

                foreach($collaborativeRecommendations as $key => $college){
                        $collaborativeRecommendations[$key]->college = College::find($college->id);
                }
                // close curl resource to free up system resources 
                curl_close($ch);  
                View::share('colleges', $expertRecommendations);
                View::share('colleges2', $collaborativeRecommendations);
                View::share('heading', 'Ocenite preporuke');
                View::share('title', 'Ocenite preporuke');
                $this->layout           = View::make('master');
                $this->layout->head     = View::make('head');
                $this->layout->left     = View::make('left');
                $this->layout->main     = View::make('pickCollege');
        }

        public function getThankYou(){
                $user = User::where('id', '=', Session::get('id'))->first();
                $user = $user->toArray();

                Mail::send('emails.results', $user, function($message) use($user)
                {
                    $message->from('me@vukstankovic.com', 'Profesionalna orijentacija');

                    $message->to($user['email'])->bcc('vuks89@gmail.com')->subject('Testiranje');;
                });
                Session::flush();
                $msg = "Hvala što ste učestvovali u testiranju. <br/>
                Ukoliko smatrate da rezultati testiranja ne odgovaraju realnom stanju, molimo Vas da nas kontaktirate kako bismo probali da usavršimo sistem.<br/>
                Rezultati testiranja su vam poslati na Vašu mejl adresu.<br/>
                <a href='http://puskice.org'>Vratite se na Puškice</a>";
                View::share('msg', $msg);
                View::share('title', 'Testiranje završeno');
                View::share('heading', 'Testiranje završeno - hvala na učešću');
                $this->layout           = View::make('master');
                $this->layout->head     = View::make('head');
                $this->layout->left     = View::make('left');
                $this->layout->main     = View::make('endmsg');
        }

        public function getComeBack($hash){
                try {
                        $user = User::where('hash', '=', $hash)->firstOrFail();
                        Session::set('id', $user->id);
                        if($user->poljoprivreda != "" || $user->poljoprivreda != NULL){
                                return Redirect::to(Request::root()."/pick-college");
                        }
                        else{
                                return Redirect::to(Request::root()."/personality-questions?id=".$user->id);
                        }
                        
                } catch (Exception $e) {
                        //var_dump($e->getMessage());
                        return Redirect::to(Request::root());
                }

        }

        public function getSendComeBack(){
                $users = User::where('poljoprivreda', '=', NULL)->get();
                /*foreach ($users as $key => $user) {
                        if($key >= 120 && $key < 160){
                                try{
                                        Mail::later(60, 'emails.comeback', $user->toArray(), function($message) use($user)
                                        {
                                            $message->from('me@vukstankovic.com', 'Vuk Stanković');
                                            $message->to($user->email, $user->first_name." ".$user->last_name)->subject('Test profesionalne orijentacije');
                                        });
                                        var_dump($key, $user->email);        
                                }
                                catch(Exception $e){
                                        var_dump("error");
                                        continue;
                                }
                        }
                }*/

        }

}
