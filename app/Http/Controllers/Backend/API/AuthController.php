<?php
namespace App\Http\Controllers\Backend\API;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengunjung;
use App\Models\ApiModel\Kamar;
use App\Models\ApiModel\Transaksi;
use Illuminate\Support\Facades\Validator;

    class AuthController extends Controller
    {
        public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nik'=>'required',
            'nama_pengunjung' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'telepon' => 'required',
        ]); 
        if($validator->fails()){
            return response()->json([
                'success'=> false,
                'massage' => 'ada kesalahan',
                'data'=> $validator -> errors()->first()
            ], 403);
        }
        $input = $request->all();
        $input['password']=bcrypt($input['password']);
        $user = pengunjung::create($input);
        $success['token']=$user->createToken('auth_token')->plainTextToken;
        $success['nama_pengunjung']=$user->nama_pengunjung;
        $success['email']=$user->email;
        $success['telepon']=$user->telepon;
    
        return response()->json([
            'success'=> true,
            'massage'=> 'sukses register',
            'data'=> $success
        ]);
    }
        public function login(Request $request)
        {
            $credentials = $request->only('email', 'password');
    
            if (Auth::guard('pengunjung')->attempt($credentials)) {
                $auth = Auth::guard('pengunjung')->user();
    
                return response()->json([
                    'success' => true,
                    'message' => 'Login berhasil',
                    'data' => $auth
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Email atau password salah',
                    'data' => null
                ]);
            }
        }
        public function kamar()
        {
            $kamar = Kamar::all();
            return response()->json($kamar);
        }
        public function pengunjung()
        {
            $pengunjung = pengunjung::all();
            return response()->json($pengunjung);
        }
        public function transaksi()
        {
            $transaksi = Transaksi::all();
            return response()->json($transaksi);
        }
        public function data_transaksi(Request $request)
        {
            // Membuat data transaksi baru

            $input = $request->only(keys:['id_transaksi','tanggal_checkin','tanggal_checkout','bukti_tf','status','harga','total','nik','id_akun','id_kamar']);
            $data_transaksi = Transaksi::create($input);

            // Kembalikan data transaksi baru dalam format JSON
            return response()->json($data_transaksi);
        }
        public function update_pengunjung(Request $request, $nik)
        {
            // Mendapatkan data baru untuk transaksi
            /**
             * angka = 1
             * angka += 2
             * angka = angka + 2
             * 'a'+'b' = ab
             * [a=>'a'] +[b=>'b'] = [a=>'a',b=>'b']
             */
            $input = $request->only(keys:['nama_pengunjung','email','telepon']);
            // untuk hash password
            $input += array('password'=>bcrypt($request->input('password')));
            $update_pengunjung = pengunjung::find($nik)->update($input);

            // Kembalikan data transaksi yang baru diubah dalam format JSON
            return response()->json($update_pengunjung);
        }
        
}
    
?>  