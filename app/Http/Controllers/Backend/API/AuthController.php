<?php
namespace App\Http\Controllers\Backend\API;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengunjung;
use App\Models\ApiModel\Kamar;
use App\Models\ApiModel\Transaksi;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;
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
                $auth['token']=$auth->createToken('auth_token')->plainTextToken;

                return response()->json([
                    'success' => true,
                    'message' => 'Login berhasil' ,
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
            $kamar = Kamar::where('status_kamar','=','Tersedia')->get();
            return response()->json($kamar);
        }
        public function pengunjung()
        {
            $pengunjung = pengunjung::all();
            return response()->json($pengunjung);
        }
        public function transaksi()
        {
            $transaksi = Transaksi::join('kamar', 'transaksi.id_kamar', '=', 'kamar.id_kamar')
                        ->join('pengunjung', 'transaksi.nik', '=', 'pengunjung.nik')
                        ->select('transaksi.id_transaksi', 'transaksi.tanggal_checkin', 'transaksi.tanggal_checkout','transaksi.total', 'kamar.jenis_kamar', 'pengunjung.nik')
                        ->get();
                        return response()->json($transaksi);
        }

        public function transaksi_id(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'nik' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Ada kesalahan',
                    'data' => $validator->errors()->first()
                ], 400);
            }

            $nik = $request->input('nik');

            $transaksi = Transaksi::join('kamar', 'transaksi.id_kamar', '=', 'kamar.id_kamar')
                ->join('pengunjung', 'transaksi.nik', '=', 'pengunjung.nik')
                ->where('pengunjung.nik', $nik)
                ->select('transaksi.id_transaksi', 'transaksi.tanggal_checkin', 'transaksi.tanggal_checkout', 'transaksi.status','transaksi.total', 'kamar.jenis_kamar', 'pengunjung.nik', 'kamar.gambar_kamar')
                ->get();

            if ($transaksi->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak ada data transaksi untuk nik tersebut',
                    'data' => []
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Sukses mendapatkan data transaksi',
                'data' => $transaksi
            ]);
        }

        // public function data_transaksi(Request $request)
        // {
        //     // Membuat data transaksi baru

        //     $input = $request->only(keys:['id_transaksi','tanggal_checkin','tanggal_checkout','status','total','nik','id_kamar']);
        //     $input += array('status'=>'Proses');
        //     $data_transaksi = Transaksi::create($input);

        //     // Kembalikan data transaksi baru dalam format JSON
        //     return response()->json($data_transaksi);
        // }
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

        public function filter_tersedia(Request $request)
        {
            $input = $request->only(['tanggal_checkin','tanggal_checkout']);
            $arr_bindings = array(
                $input['tanggal_checkin'],
                $input['tanggal_checkout']);
            $data = DB::select("SELECT * FROM kamar JOIN transaksi ON kamar.id_kamar = transaksi.id_kamar WHERE kamar.status_kamar = 'Tersedia' AND transaksi.tanggal_checkin BETWEEN ? AND ?",$arr_bindings);
            return response()->json($data);

        }

        public function checkout($id_kamar, Request $request)
        {
            $validator = Validator::make($request->all(), [
                'tanggal_checkin' => 'required|date',
                'tanggal_checkout' => 'required|date|after_or_equal:tanggal_checkin',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $input = $validator->validated();
            $checkin = Carbon::parse($input['tanggal_checkin']);
            $checkout = Carbon::parse($input['tanggal_checkout']);

            $count = $checkin->diffInDays($checkout) == 0 ? 1 : $checkin->diffInDays($checkout);
            $kamar = Kamar::find($id_kamar);

            $array = array(
                'total' => $kamar->harga * $count
            );

            return response()->json($array);
        }

        // public function checkout($id_kamar, Request $request)
        // {
        //     $input = $request->only(['tanggal_checkout','tanggal_checkin']);
        //     $checkin =  Carbon::parse($input['tanggal_checkin']);
        //     $checkout =  Carbon::parse($input['tanggal_checkout']);
        //     /**
        //      * Ternary
        //      * Cek apakah tanggal checkin == tanggal checkout dan jika iya tampilkan 1...
        //      * jika tidak tampilkan jumlah harinya..
        //      */
        //     $count = $checkin->diffInDays($checkout) == 0 ? 1 : $checkin->diffInDays($checkout);
        //     $kamar = Kamar::find($id_kamar);
        //     $array = array(
        //         'total'=>$kamar->harga * $count
        //     );
        //     return response()->json($array);
        // }

        // public function updateProfile(Request $request)
        //     {
        //         $validator = Validator::make($request->all(), [
        //             'nama_pengunjung' => 'required',
        //             'email' => 'required',
        //             'telepon' => 'required',
        //         ]);

        //         if ($validator->fails()) {
        //             return response()->json([
        //                 'success' => false,
        //                 'message' => $validator->errors()->first(),
        //                 'data' => $validator->errors()->first(),
        //             ], 404);
        //         }

        //         $input = $request->all();
        //         Pengunjung::where('nik', $input['nik'])->update($input);

        //         return response()->json([
        //             'success' => true,
        //             'message' => 'Sukses update pengguna',
        //             'data' => $input,
        //         ]);
        //     }


        public function updateProfile(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'nama_pengunjung' => 'required',
                'email' => 'required',
                'telepon' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first(),
                    'data' => $validator->errors()->first(),
                ], 404);
            }

            $input = $request->all();
            Pengunjung::where('nik', $input['nik'])->update($input);

            return response()->json([
                'success' => true,
                'message' => 'Sukses update pengguna',
                'data' => $input,
            ]);
        }

        public function data_transaksi(Request $request)
        {
            // Validasi input
            $validator = Validator::make($request->all(), [
                'tanggal_checkin' => 'required',
                'tanggal_checkout' => 'required',
                'total' => 'required',
                'nik' => 'required',
                'id_kamar' => 'required'
            ]);

            if ($validator->fails()) {
                // Jika validasi gagal, kembalikan pesan kesalahan
                $response = [
                    'success' => false,
                    'message' => 'Gagal menyimpan data transaksi.',
                    'errors' => $validator->errors()
                ];
                $status_code = 400; // Bad Request
            } else {
                // Jika validasi berhasil, buat data transaksi baru
                $input = $request->only(['tanggal_checkin', 'tanggal_checkout', 'total', 'nik', 'id_kamar']);
                $input += ['status' => 'Proses'];
                $data_transaksi = Transaksi::create($input);

                if ($data_transaksi) {
                    // Transaksi berhasil dibuat
                    $response = [
                        'success' => true,
                        'message' => 'Data transaksi berhasil disimpan.',
                        'data' => $data_transaksi
                    ];
                    $status_code = 200; // Created
                } else {
                    // Transaksi gagal dibuat
                    $response = [
                        'success' => false,
                        'message' => 'Gagal menyimpan data transaksi.',
                        'data' => null
                    ];
                    $status_code = 500; // Internal Server Error
                }
            }

            return response()->json($response, $status_code);
        }

        }

?>
