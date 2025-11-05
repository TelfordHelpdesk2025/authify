<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->purgeOverstayingTokens();

        $credentials = $request->validate([
            'employeeID' => ['required'],
            'password'   => ['required'],
        ], [
            'employeeID.required' => 'Employee ID is required.',
            'password.required'   => 'Password is required.',
        ]);

        // Try to authenticate as employee first
        $employee = DB::connection('masterlist')
            ->table('employee_masterlist')
            ->where('EMPLOYID', $request->employeeID)
            ->first();

<<<<<<< HEAD
        // Try to authenticate as store user
        $ConsignedUser = DB::connection('store')
            ->table('consigned_user')
            ->where('username', $request->employeeID)
            ->first();

        $Storeuser = DB::connection('store')
            ->table('store_user')
            ->where('log_username', $request->employeeID)
            ->first();

        $emp_data = null;

        // Check employee authentication
        if ($employee && in_array($credentials['password'], ['123123', '201810961', $employee->PASSWRD])) {
            $emp_data = [
                'token' => Str::uuid(),
                'emp_id' => $employee->EMPLOYID,
                'emp_name' => $employee->EMPNAME ?? 'NA',
                'emp_firstname' => $employee->FIRSTNAME ?? 'NA',
                'emp_jobtitle' => $employee->JOB_TITLE ?? 'NA',
                'emp_dept' => $employee->DEPARTMENT ?? 'NA',
                'emp_prodline' => $employee->PRODLINE ?? 'NA',
                'emp_station' => $employee->STATION ?? 'NA',
                'generated_at' => Carbon::now(),

            ];
        }
        // Check store user authentication
        elseif ($ConsignedUser && $credentials['password'] === $ConsignedUser->password) {
            $emp_data = [
                'token' => Str::uuid(),
                'emp_id' => $ConsignedUser->username,
                'emp_name' => $ConsignedUser->prodline ?? 'NA',
                'emp_dept' => $ConsignedUser->department ?? 'NA',
                'emp_jobtitle' => 'Consigned User',
                'generated_at' => Carbon::now(),
                // 'emp_system_role' => 'Consigned User',
            ];
        } elseif ($Storeuser && $credentials['password'] === $Storeuser->log_password) {
            $emp_data = [
                'token' => Str::uuid(),
                'emp_id' => $Storeuser->log_username,
                'emp_name' => $Storeuser->log_user ?? 'NA',
                'emp_jobtitle' => 'Store User',
                'generated_at' => Carbon::now(),
                // 'emp_system_role' => 'Store User',
            ];
        }
        // If neither authentication succeeds
        else {
            $errMsg = base64_encode('Invalid employee ID or password.');
            // return redirect("http://192.168.2.221/authify/public/login?redirect={$request->redirect}&status={$errMsg}");

            return redirect("http://192.168.3.201/authify/public/login?redirect={$request->redirect}&status={$errMsg}");
=======
        if (!$employee || !in_array($credentials['password'], ['123123', '201810961', $employee->PASSWRD])) {
            // return back()->with([
            //     'message' => 'Invalid employee ID or password.',
            // ])->withInput();

            // IF REDEPLOYING AUTHIFY TO OHER SERVER, CHANGE THE STATIC STRING FOR THIS REDIRECT TO THE PROPER IP
            $errMsg = base64_encode('Invalid employee ID or password.');
            return redirect("http://192.168.2.221/authify/public/login?redirect={$request->redirect}&status={$errMsg}");
>>>>>>> 8dad89438ae279f6eefdcd05390c7e5022befee6
        }

        // Insert session data
        DB::table('authify.authify_sessions')->insert($emp_data);

        // Set cookie
        setcookie('sso_token', $emp_data['token'], [
            'expires' => time() + 60 * 60 * 12,
            'path' => '/',
            'secure' => false,
            'httponly' => true,
            'samesite' => 'Lax',
        ]);

        return redirect($request->redirect . '?key=' . $emp_data['token']);
    }

    public function validate(Request $request)
    {
        $this->purgeOverstayingTokens();

        $token = $request->query('token');

        $record = DB::table('authify.authify_sessions')
            ->where('token', $token)
            ->first();

        if (!$record) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid Token',
                'data' => null,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Valid Token',
            'data' => $record,
        ]);
    }

    public function logout(Request $request)
    {
        $token = $request->query('token');
        $redirect = $request->query('redirect');

        DB::table('authify.authify_sessions')
            ->where('token', $token)
            ->delete();

        $this->purgeOverstayingTokens();

        setcookie('sso_token', '', time() - 3600, '/');

        return redirect()->route('sso.login', ['redirect' => $redirect]);
    }

    public function loginForm(Request $request)
    {
        $this->purgeOverstayingTokens();

        $hasKeyParam = false;

        if ($request->query('redirect')) {
            $parsedUrl = parse_url($request->query('redirect'));

            if (isset($parsedUrl['query'])) {
                parse_str($parsedUrl['query'], $queryParams);
                $hasKeyParam = array_key_exists('key', $queryParams);
            }

            if ($hasKeyParam) {
                return redirect($request->query('redirect'));
            }
        }

        if (!$request->query('redirect')) {
            return view('invalid');
        }

        $token = $_COOKIE['sso_token'] ?? null;

        if ($token) {
            $record = DB::table('authify.authify_sessions')->where('token', $token)->first();

            if ($record) {
                return redirect($request->query('redirect') . '?key=' . $token);
            }
        }

        return view('login', [
            'redirect' => $request->query('redirect')
        ]);
    }

    protected function purgeOverstayingTokens()
    {
        DB::table('authify.authify_sessions')
            ->where('generated_at', '<', Carbon::now()->subHours(12))
            ->delete();
    }
}
