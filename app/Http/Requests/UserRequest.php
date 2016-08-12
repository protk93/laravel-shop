<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'txtUser'   => 'required|unique:users,username',
            'txtPass'   => 'required|max:8',
            'txtRePass' => 'required|same:txtPass',
            'txtEmail'  => 'required|email',
            'groupId'  => 'required',
        ];
    }

    public function messages() {
        return [
            'txtUser.required'   => 'Vui Lòng Nhập username',
            'txtUser.unique'     => 'username đã tồn tại',
            'txtPass.required'   => 'Vui Lòng Nhập password',
            'txtPass.max'        => 'password không vượt quá 8 ký tự',
            'txtRePass.required' => 'Vui Lòng Nhập repassword',
            'txtRePass.same'     => 'password không giống nhau',
            'txtEmail.required'  => 'Vui Lòng nhập email',
            'txtEmail.email'     => 'email không đúng định dạng',
            'groupId.required'  => 'Vui Lòng chọn nhóm user',
            ];
    }
}
