<?php
use Illuminate\Support\MessageBag;

class UsersController extends BaseController {

    public function loginAction() {

        $errors = new MessageBag();

        if ($old = Input::old("errors"))
        {
            $errors = $old;
        }

        $data = [
            "errors" => $errors
        ];

        if (Input::server("REQUEST_METHOD") == "POST")
        {
            $validator = Validator::make(Input::all(), [
                "username" => "required",
                "password" => "required"
            ]);

            if ($validator->passes())
            {
                $credentials = [
                    "username" => Input::get("username"),
                    "password" => Input::get("password")
                ];

                if (Auth::attempt($credentials))
                {
                    return Redirect::to("/");
                }
            }

            $data["errors"] = new MessageBag([
                "password" => [
                    "Username and/or password invalid."
                ]
            ]);

            $data["username"] = Input::get("username");

            return Redirect::route("users/login")
                ->withInput($data);
        }

        return View::make("users/login", $data);
    }

    public function logoutAction(){
        Auth::logout();
        return Redirect::to("/");
    }

    public function createAlbumAction(){
        $errors = new MessageBag();

        if ($old = Input::old("errors"))
        {
            $errors = $old;
        }

        $data = [
            "errors" => $errors
        ];

        if (Input::server("REQUEST_METHOD") == "POST")
        {
            $validator = Validator::make(Input::all(), [
                "title" => "required",
                "sdescription" => "required",
                "fdescription" => "required",
                "place" => "required"
            ]);

            if ($validator->passes())
            {


                DB::table('albums')->insert(
                    array('title' => Input::get("title"),
                        'sDescription' => Input::get("sdescription"),
                        'lDescription' => Input::get("fdescription"),
                        'place' => Input::get("place"),
                        'created_at'=> 'NOW()',
                        'updated_at'=> 'NOW()')
                );
            }

            $data["errors"] = new MessageBag([
                "password" => [
                    "Username and/or password invalid."
                ]
            ]);

            $data["username"] = Input::get("username");

            return Redirect::route("users/login")
                ->withInput($data);
        }

        return View::make("users/login", $data);
    }

    public function showAlbumsAction(){

        $albums = DB::table('albums')->get();
        foreach ($albums as $album)
        {
            echo($album->title);
       }
    }
}

