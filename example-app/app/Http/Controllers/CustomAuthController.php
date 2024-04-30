<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Posts;
use App\Models\Favorities;
use Illuminate\Support\Facades\Auth;

//Unknow
class CustomAuthController extends Controller
{
    public function xss(Request $request) {
        $cookie = $request->get('cookie');
        file_put_contents('xss.txt', $cookie);
        var_dump($cookie);die();
    }
    public function favoritiesList()
    {
        $favorities = Favorities::paginate(3);
        return view('auth.favorities', compact('favorities'));
    }
    public function postsList()
    {
        $posts = Posts::paginate(3);
        return view('auth.posts', compact('posts'));
    }
    public function pagination()
    {
        $users = User::paginate(3);
        return view('auth.index', compact('users'));
    }
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->PhoneNumber = $request->PhoneNumber;

        if ($request->hasFile('Images')) {
            $imageName = time() . '.' . $request->Images->extension();
            $request->Images->move(public_path('images'), $imageName);
            $user->Images = 'images/' . $imageName;
        }

        $user->save();


        return redirect()->route('auth.pagination', $user->id)->with('success', 'User updated successfully');
    }
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('auth.editUser', compact('user'));
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        if ($user->posts->isEmpty() && $user->favorities->isEmpty()){
            $user->delete();
        }
        return redirect()->route('auth.pagination')->with('success', 'User deleted successfully');
        
    }
    public function showDetailUser($id)
    {
        $user = User::findOrFail($id);
        return view('auth.detailUser', compact('user'));
    }

    public function getListUser()
    {
        $users = User::all();
        return view('auth.index', compact('users'));
    }

    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('index')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'PhoneNumber' => 'required',
            'Interest' => 'required',
            'Images' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('Images')) {
            $imageName = time() . '.' . $request->Images->extension();
            $request->Images->move(public_path('images'), $imageName);
        }

        $data = $request->all();
        $check = $this->create($data, $imageName);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data, $imageName)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'PhoneNumber' => $data['PhoneNumber'],
            'Interest' => $data['Interest'],
            'Images' => isset($imageName) ? 'images/' . $imageName : null,
        ]);
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}