<?php

namespace App\Http\Controllers;

use App\Models\admin as Admin;
use App\Models\school as School;
use App\Models\schoolUser as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    //Registro Admin
    public function registerAdmin(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'user_name' => 'required|string|min: 3|max:25',
                'password' => 'required|string|min: 6',
            ]);
            if ($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
            }
            $admin = Admin::create([
                'user_name' => $request->get('user_name'),
                'password' => bcrypt($request->get('password')),
            ]);
            $token = JWTAuth::fromUser($admin);
            return response()->json(compact('admin', 'token'), 201);
        }catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear usuario Administrador',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    //Registro School
    public function registerSchool(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'school_name' => 'required|string|min: 3|max:25',
                'key_school' => 'required|string|min: 10',
                'kind_school' => 'required|string',
                'password' => 'required|string|min: 6',
                'admin_id' => 'required|integer',
            ]);
            if ($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
            }
            $school = School::create([
                'school_name' => $request->get('school_name'),
                'key_school' => $request->get('key_school'),
                'kind_school' =>$request->get('kind_school'),
                'password' => bcrypt($request->get('password')),
                'admin_id' => $request->get('admin_id'),
            ]);
            $token = JWTAuth::fromUser($school);
            return response()->json(compact('school', 'token'), 201);
        }catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear usuario escuela',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    //Registro User
    public function registerUser(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'user_name' => 'required|string|min: 3|max:25',
                'password' => 'required|string|min: 6',
                'school_id' => 'required|integer',
            ]);
            if ($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
            }
            $user = User::create([
                'user_name' => $request->get('user_name'),
                'password' => bcrypt($request->get('password')),
                'school_id' => $request->get('school_id'),
            ]);
            $token = JWTAuth::fromUser($user);
            return response()->json(compact('user', 'token'), 201);
        }catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear usuario',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    //Obtener Admins
    public function getAdmins(){
        return response()->json(Admin::all(), 200);
    }

    //Obtener Schools
    public function getSchools(){
        return response()->json(School::all(), 200);
    }

    //Obtener Users
    public function getUsers(){
        return response()->json(User::all(), 200);
    }

    //Editar Admin
    public function editAdmin(Request $request, $id){
        // Buscar el admin por ID
        $admin = Admin::find($id);
        if (is_null($admin)) {
            return response()->json(['message' => 'Admin not found'], 404);
        }
        $validator = Validator::make($request->all(), [
            'user_name' => 'sometimes|required|string|min:3|max:25',
            'password' => 'sometimes|nullable|string|min:6', 
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        // Recoger solo los datos válidos (evita campos vacíos o nulos)
        $data = array_filter($request->only(['user_name', 'password']));
        // Encriptar la contraseña si está en el array de datos
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        $admin->update($data);
        return response($admin, 200);
    }
    
    //Editar School
    public function editSchool(Request $request, $id){
        $school = School::find($id);
        if(is_null($school)){
            return response()->json(['message'=>'School not found'], 404);
        }
        $validator = Validator::make($request->all(), [
            'school_name'=>'sometimes|required|string|min:3|max:25',
            'key_school'=>'sometimes|required|string',
            'kind_school'=>'sometimes|required|string',
            'password'=>'sometimes|nullable|string|min:6',
            'admin_id'=>'sometimes|required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $data = array_filter($request->only(['school_name','key_school','kind_school','password','admin_id']));
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        $school->update($data);
        return response($school, 200);
    }

    //Editar User
    public function editUser(Request $request, $id){
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(['message'=>'User not found'], 404);
        }
        $validator = Validator::make($request->all(), [
            'user_name'=>'sometimes|required|string|min:3|max:25',
            'password'=>'sometimes|nullable|string|min:6',
            'school_id'=>'sometimes|required|integer',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors()->toJson(), 404);
        }
        $data = array_filter($request->only(['user_name','password','school_id',]));
        if (isset($data['password'])){
            $data['password'] = bcrypt($data['password']);
        }
        $user->update($data);
        return response($user, 200);
    }

    //Eliminar Admin
    public function deleteAdmin(Request $request , $id){
        $admin = Admin::find($id);
        if(is_null($admin)){
            return response()->json(['message'=>'Admin not found'], 404);
        }
        $admin->delete();
        return response(['message'=>'Admin deleted'], 200);
    }

    //Eliminar School
    public function deleteSchool(Request $request, $id){
        $school = School::find($id);
        if(is_null($school)){
            return response(['message'=>'School not found'], 404);
        }
        $school->delete();
        return response(['message'=>'School deleted'], 200);
    }

    //Eliminar User
    public function deleteUser(Request $request, $id){
        $user = User::find($id);
        if(is_null($user)){
            return response(['message'=>'User not found'], 404);
        }
        $user->delete();
        return response(['message'=>'User deleted'], 200);
    }

    //Obtener Admin por Id
    public function getAdminById($id) {
        $admin = Admin::find($id);
        if (is_null($admin)) {
            return response()->json(['message' => 'Admin not found'], 404);
        }
        return response()->json([
            'user_name' => $admin->user_name,
            'password' => $admin->password,
        ], 200);
    }

    //Obtener School por Id
    public function getSchoolById($id){
        $school = School::with('admin:id,user_name')->find($id);
        if (is_null($school)){
            return response()->json(['message'=>'School not found'], 404);
        }
        return response()->json([
            'id'=> $school->id,
            'school_name'=> $school->school_name,
            'key_school'=> $school->key_school,
            'kind_school'=> $school->kind_school,
            'admin_id'=> $school->admin_id,
            'user_name'=> $school->admin ? $school->admin->user_name :null
        ], 200);
    }

    //Obtener User por Id
    public function getUserById($id){
        $user = User::with('school:id,school_name')->find($id);
        if (is_null($user)){
            return response()->json(['message'=>'user not found'], 404);
        }
        return response()->json([
            'id'=> $user->id,
            'user_name'=> $user->user_name,
            'school_id'=> $user->school_id,
            'school_name'=> $user->school ? $user->school->school_name :null
        ], 200);
    }

    //Login Admin
    public function loginAdmin(Request $request){
    $credentials = $request->only('user_name', 'password');
    if (!$token = Auth::guard('admin')->attempt($credentials)) {
        return response()->json(['error' => 'Credenciales invalidas'], 401);
    }
    $admin = Auth::guard('admin')->user();
    return response()->json([
        'token' => $token,
        'admin' => [
            'id' => $admin->id,
            'user_name' => $admin->user_name,
            'created_at' => $admin->created_at,
            'updated_at' => $admin->updated_at,
        ],
    ]);
    }

    //Login School
    public function loginSchool(Request $request){
        $credentials = $request->only('school_name', 'password');
        if(!$token = Auth::guard('school')->attempt($credentials)){
            return response()->json(['error'=>'Credenciales invalidas'], 401);
        }
        $school = Auth::guard('school')->user();
        return response()->json([
            'token' => $token,
            'school'=>[
                'id'=>$school->id,
                'school_name'=>$school->school_name,
                'key_school'=>$school->key_school,
                'kind_school'=>$school->kind_school,
                'admin_id'=>$school->admin_id,
                'created_at' => $school->created_at,
                'updated_at' => $school->updated_at,
            ],
        ]);
    }

    //Login User
    public function loginUser(Request $request){
        $credentials = $request->only('user_name', 'password');
        if(!$token = Auth::guard('schoolUser')->attempt($credentials)){
            return response()->json(['error'=>'Credenciales invalidas'], 401);
        }
        $user = Auth::guard('schoolUser')->user();
        return response()->json([
            'token' => $token,
            'user'=>[
                'id'=> $user->id,
                'user_name' => $user->user_name,
                'school_id' => $user->school_id,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ],
        ]);
    }

    //Logout Admin
    public function logoutAdmin(Request $request){
        $token = $request->bearerToken();
        if (!$token) {
            return response()->json(['message' => 'Token not provided'], 401);
        }
        try {
            $admin = auth('admin')->setToken($token)->user();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }
        auth('admin')->logout();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    //Logout School
    public function logoutSchool(Request $request){
        $token = $request->bearerToken();
        if (!$token) {
            return response()->json(['message' => 'Token not provided'], 401);
        }
        try {
            $school = auth('school')->setToken($token)->user();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }
        auth('school')->logout();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    //Logout User
    public function logoutUser(Request $request){
        $token = $request->bearerToken();
        if (!$token) {
            return response()->json(['message' => 'Token not provided'], 401);
        }
        try {
            $user = auth('schoolUser')->setToken($token)->user();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }
        auth('schoolUser')->logout();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}