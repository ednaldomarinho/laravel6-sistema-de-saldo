<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function Profile()
    {
        return view('site.profile.profile');
    }

    public function profileUpdate(Request $request)
    {
        $user = auth()->user();
        
        $data = $request->all();

        if($data['password']!=null):
            $data['password'] = bcrypt($data['password']);
        else:
            unset($data['password']);
        endif; 

        $data['image'] = $user->image;

        if($request->hasFile('image') && $request->file('image')->isValid()):

            if($user->image):
                $name = $user->image;
            else:
                $name = $user->id.'-'.Str::kebab($user->name);
            endif;

            $extension = $request->image->extension();
            $nameFile = "{$name}.{$extension}";
            $data['image'] = $nameFile;
            $upload = $request->image->storeAs('users', $nameFile);
            
            if(!$upload):
                return redirect()->back()
                                 ->with('error', 'Falha ao fazer o upload da imagem');
            endif;

        endif;

        $update = auth()->user()->update($data);

        if($update):
            return redirect()->route('profile')
                             ->with('success', 'Atualização feita com sucesso!');
        endif;
        return redirect()->back()
                         ->with('error', 'Falha ao atualizar perfil...');
    }
}