<?php

namespace App\Http\Controllers;

use App\Models\ProsernalProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProsernalProfileController extends Controller
{
    public function AddProfile(Request $request)
    {
        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->userright = $request->userright;
        $newUser->status = '1';
        $register = $newUser->save();
        $lastId = $newUser->id;

        $URL = $request->root();

        if (!$register) {
            return response()->json(["result" => false]);
        } else {
            $newProfile = new ProsernalProfile();
            $newProfile->userid = $lastId;
            $newProfile->fullname = $request->fullname;
            $newProfile->bightday = $request->bightday;
            $newProfile->ages = $request->ages;
            $newProfile->tell = $request->tell;
            $newProfile->gender = $request->gender;
            $newProfile->status = '1';
            /** Picture */
            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                $name = $file->getClientOriginalName();
                $filesname = time() . '_' . $name;
                $path = Storage::putFileAs(
                    'images',
                    $request->file('picture'),
                    $filesname
                );
                $newProfile->picture = $URL . '/images/' . $filesname;
            } else {
                $newProfile->picture = 'na';
            }
            /** Document */
            if ($request->hasFile('documents')) {
                $file = $request->file('documents');
                $name = $file->getClientOriginalName();
                $filesname_documents = time() . '_' . $name;
                $path_documents = Storage::putFileAs(
                    'documents',
                    $request->file('documents'),
                    $filesname_documents
                );
                $newProfile->documents = $URL . '/documents/' . $filesname_documents;
            } else {
                $newProfile->documents = 'na';
            }

            $result = $newProfile->save();
            if (!$result) {
                return response()->json(["result" => false]);
            } else {

                return response()->json(["result" => true, "datas" => ProsernalProfileController::Profile()]);
            }
        }
    }

    public function ShowProfile()
    {
        return response()->json(["result" => true, "datas" => ProsernalProfileController::Profile()]);
    }

    public function Profile()
    {
        $showProfile = ProsernalProfile::where('prosernal_profiles.status', '1')
            ->leftjoin('users', 'users.id', '=', 'prosernal_profiles.userid')
            ->select('users.name', 'users.email', 'users.userright', 'prosernal_profiles.*')
            ->get();
        return $showProfile;
    }

    public function EditProfile(Request $request)
    {
        $edit = ProsernalProfile::where('userid', $request->userid)
            ->leftjoin('users', 'users.id', '=', 'prosernal_profiles.userid')
            ->select('users.name', 'users.email', 'users.userright', 'prosernal_profiles.*')
            ->first();
        return response()->json(["result" => true, "datas" =>  $edit]);
    }

    public function UpdateProfile(Request $request)
    {
        $update = User::find($request->userid);
        $update->name = $request->name_edit;
        $update->email = $request->email_edit;
        if ($request->password_edit != "") $update->password = Hash::make($request->password_edit);
        $update->userright = $request->userright_edit;
        $register_update = $update->update();
        if (!$register_update) {
            return response()->json(["result" => false]);
        } else {
            $URL = $request->root();


            $update_profile = ProsernalProfile::where('userid', $request->userid)->first();
            $update_profile->fullname = $request->fullname_edit;
            $update_profile->bightday = $request->bightday_edit;
            $update_profile->ages = $request->ages_edit;
            $update_profile->tell = $request->tell_edit;
            $update_profile->gender = $request->gender_edit;



            /** Picture */
            if ($request->hasFile('picture_edit')) {
                $file = $request->file('picture_edit');
                $name = $file->getClientOriginalName();
                $filesname = time() . '_' . $name;
                $path = Storage::putFileAs(
                    'images',
                    $request->file('picture'),
                    $filesname
                );
                $update_profile->picture = $URL . '/images/' . $filesname;
            }
            /** Document */
            if ($request->hasFile('documents_edit')) {
                $file = $request->file('documents_edit');
                $name = $file->getClientOriginalName();
                $filesname_documents = time() . '_' . $name;
                $path_documents = Storage::putFileAs(
                    'documents',
                    $request->file('documents'),
                    $filesname_documents
                );
                $update_profile->documents = $URL . '/documents/' . $filesname_documents;
            }

            $result = $update_profile->update();
            if (!$result) {
                return response()->json(["result" => false]);
            } else {

                return response()->json(["result" => true, "datas" => ProsernalProfileController::Profile()]);
            }
        }
    }
    public function DeleteProfile(Request $request)
    {
        $delete = User::find($request->userid);
        $delete->status = '0';
        $register_delete = $delete->update();

        if (!$register_delete) {
            return response()->json(["result" => false]);
        } else {
            $delete_profile = ProsernalProfile::where('userid', $request->userid)->first();
            $delete_profile->status = '0';
            $result_delete = $delete_profile->update();
            if (!$result_delete) {
                return response()->json(["result" => false]);
            } else {
                return response()->json(["result" => true, "datas" => ProsernalProfileController::Profile()]);
            }
        }
    }
} // end class
