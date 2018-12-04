<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class MyController extends Controller
{
    //
    const API_TOKEN = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9';
    
    public function getUser(Request $request, $token, $email)
    {
        $result = array();
        if ($token != self::API_TOKEN) {
            $result['status'] = 'ERROR';
            $result['code'] = '111';
            $result['message'] = 'Token is not valid';
            return json_encode($result);
        }
        # code...
        $user = new User();
        $data = array(
            'email' => '',
            'name' => '',            
            'address' => '',
            'tel' => '',
            'sex' => '1',
            'birth' => '1990-01-01',
        );
        $query = $user->where('email', $email)->first();
        if ($query) {
            $data = $query->toArray();
            if (!empty($data)) {
                $result['status'] = 'success';
                $result['code'] = '100';
                $result['message'] = 'user is valid';
                $result['data'] = $data;
            }
        }
        else {
            $result['status'] = 'fail';
            $result['code'] = '113';
            $result['message'] = 'Email is not exist';            
        }

        return json_encode($result);
        
    }

    public function updateUser(Request $request)
    {
        # code...
        $result = array();
        $data = array();
        $allData = $request->all();
        // check valid token
        if ($allData['token'] != self::API_TOKEN) {
            $result['status'] = 'ERROR';
            $result['code'] = '111';
            $result['message'] = 'Token is not valid';
            return json_encode($result);
        }
        if (isset($allData['name'])) {
            $data['name'] = $allData['name'];
        }
        if (isset($allData['address'])) {
            $data['address'] = $allData['address'];
        }
        if (isset($allData['tel'])) {
            $data['tel'] = $allData['tel'];
        }
        if (isset($allData['sex'])) {
            $data['sex'] = $allData['sex'];
        }
        if (isset($allData['birth'])) {
            $data['birth'] = $allData['birth'];
        }
        // update data
        $updated = DB::table('users')->where('email', $allData['email'])->update($data);
        if ($updated) {
            $result['status'] = 'success';
            $result['code'] = '100';
            $result['message'] = 'updated successfully';
        }
        else {
            $result['status'] = 'fail';
            $result['code'] = '113';
            $result['message'] = 'Update is not success';
        }

        return json_encode($result);
    }
}
