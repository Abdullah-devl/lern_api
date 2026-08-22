<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\StoreProfileReques;
use App\Http\Requests\Profile\UpdatreProfileReques;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function show($id)
    {
        //
        $profile=Profile::where('user_id',$id)->first();
        return response()->json($profile,200);
    }

    public function store(StoreProfileReques $request){
        $profile = Profile::created($request->validated());
        return response()->json([
            'messag' => 'تم انشا البروفايل بنجاح',
            'profile' => $profile,
        ],200);

    }


     public function update(UpdatreProfileReques $request,$id){
        // جلب البيانات التي اجتازت التحقق فقط
        $validated = $request->validated();
         // عمل بحث لايجاد البروفيل المراد تحديثه
         $profile=Profile::findOrfail($id);
         //تحديث البينات 
         $profile->update($validated);
         // ارجاع البينات التي تم تحديتها
        return response()->json([
            'messag' => 'تم تحديث البروفايل بنجاح',
            'profile' => $profile,
        ],200);

    }
}
