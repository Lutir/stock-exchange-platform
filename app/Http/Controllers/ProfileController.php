<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use View;
use App\UserAccounts;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $accounts = UserAccounts::where('userId', auth()->user()->id)
                                ->get();
        return View::make('profile.edit')->with('accounts', $accounts);
    }

    public function changeAccountStatus(Request $request){
        $exists = UserAccounts::where('accountNumber', $request->get('accountNumber'))
                                ->get();
        if($exists){
            if(count($exists) == 1){
                //making all inactive
                UserAccounts::where('userId', auth()->user()->id)
                                ->update(['status' => 0]);
                
                UserAccounts::where('accountNumber', $request->get('accountNumber'))
                                ->update(['status' => 1]);
                return redirect('profile');
            }
        }
    }

    public function addAccount(Request $request){

        //checking if account already exists
        $exists = UserAccounts::where('accountNumber', $request->get('account'))
                                ->get();
        if($exists){
            if(count($exists) > 0){
                // account already exists
                $error = "The bank account you are linking already exists!";
                return View::make('pages.error')->with('error', $error);
            }
        }
        

        $userAccount = new UserAccounts();
        $userAccount->userId = auth()->user()->id;
        $userAccount->accountNumber = $request->get('account');
        $userAccount->routingNumber = $request->get('routing');
        $userAccount->balance = rand(25000, 50000);
        $userAccount->status = 0;

        $userAccount->save();
        
        return redirect('profile');
        // return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    public function getProfile(){

        $accounts = UserAccounts::where('userId', auth()->user()->id)
                                ->all();
        dd($accounts);

        return View::make('pages.profile');
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withStatusPassword(__('Password successfully updated.'));
    }

    public function createProfile(){
        return view('pages.profile');
    }
}
