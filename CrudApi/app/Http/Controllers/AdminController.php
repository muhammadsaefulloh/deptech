<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
// use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function create(Request $request){
        Admin::create([
            'nama_depan' => $request->nama_d,
            'nama_belakang' => $request->nama_b,
            'email' => $request->email,
            'tanggal_lahir' => $request->tgl,
            'jenis_kelamin' => $request->jk,
            'password' => $request->password,
        ]);
        return response()->json([
            'message' => 'sukses create data'
            
        ]);
    }
    public function update(Request $request, $id){
        Admin::findOrFail($id)->update([
            'nama_depan' => $request->nama_d,
            'nama_belakang' => $request->nama_b,
            'email' => $request->email,
            'tanggal_lahir' => $request->tgl,
            'jenis_kelamin' => $request->jk,
            'password' => $request->password,
        ]);
        return response()->json([
            'message' => 'sukses update data' 
        ]);
        
    }
    public function get(){
        $admin = Admin::all();
        return response()->json([
            'data_admin' => $admin
        ]);
    }
    public function delete($id){
        Admin::destroy($id);
        return response()->json([
            'message' => 'suskses delete kategori'
        ]);
    }
    public function login(Request $request){
        Admin::where([
            'email' => $request->email,
            'password'=>$request->password
        ]);
        return response()->json([
            'message' => 'login sukses'
        ]);
    }
    public function signin(Request $request) {
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            $respon = [
                'status' => 'error',
                'msg' => 'Validator error',
                'errors' => $validate->errors(),
                'content' => null,
            ];
            return response()->json($respon, 200);
        } else {
            $credentials = request(['email', 'password']);
            // $credentials = Arr::add($credentials, 'status', 'aktif');
            if (!Admin::attempt($credentials)) {
                $respon = [
                    'status' => 'error',
                    'msg' => 'Unathorized',
                    'errors' => null,
                    'content' => null,
                ];
                return response()->json($respon, 401);
            }

            $user = Admin::where('email', $request->email)->first();
            if (! Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Error in Login');
            }

            $tokenResult = $user->createToken('token-auth')->plainTextToken;
            $respon = [
                'status' => 'success',
                'msg' => 'Login successfully',
                'errors' => null,
                'content' => [
                    'status_code' => 200,
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
                ]
            ];
            return response()->json($respon, 200);
        }
    }
}
